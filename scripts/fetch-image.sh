#!/usr/bin/env bash
# scripts/fetch-image.sh QUERY [count] [dest_dir]
#
# Downloads photographs matching QUERY from Wikimedia Commons (no API key).
# Prints saved file paths, one per line. Skips silently on individual
# failures so a missing query doesn't abort the build.
#
# Examples:
#   bash scripts/fetch-image.sh "florist shop interior" 3 uploads/
#   bash scripts/fetch-image.sh "rose bouquet white" 4 uploads/heroes/

set -uo pipefail
QUERY="${1:?usage: fetch-image.sh QUERY [count] [dest_dir]}"
COUNT="${2:-3}"
DEST="${3:-uploads}"
mkdir -p "$DEST"

# macOS-shipped Python can't see Homebrew's openssl trust store, which
# makes urllib fail with CERTIFICATE_VERIFY_FAILED against Wikimedia's
# CDN. If `certifi` is installed (user or system site-packages), point
# OpenSSL at its bundle so HTTPS just works.
if [ -z "${SSL_CERT_FILE:-}" ]; then
  CERTIFI_BUNDLE="$(python3 -c 'import certifi; print(certifi.where())' 2>/dev/null || true)"
  if [ -n "${CERTIFI_BUNDLE}" ] && [ -f "${CERTIFI_BUNDLE}" ]; then
    export SSL_CERT_FILE="${CERTIFI_BUNDLE}"
  fi
fi

python3 - "$QUERY" "$COUNT" "$DEST" <<'PY'
import json, os, sys, time, urllib.parse, urllib.request, urllib.error

QUERY = sys.argv[1]
COUNT = int(sys.argv[2])
DEST  = sys.argv[3]

UA = {"User-Agent": "Bismuth/0.1 image-fetch"}
api = "https://commons.wikimedia.org/w/api.php"

def http_get(url, *, timeout=15, max_retries=3):
    """GET with exponential backoff on 429/5xx. Returns response bytes or raises."""
    for attempt in range(max_retries):
        try:
            req = urllib.request.Request(url, headers=UA)
            return urllib.request.urlopen(req, timeout=timeout).read()
        except urllib.error.HTTPError as e:
            if e.code in (429, 500, 502, 503, 504) and attempt < max_retries - 1:
                # Honour Retry-After when present, else exponential backoff.
                wait = e.headers.get("Retry-After")
                try:
                    wait = float(wait) if wait else None
                except ValueError:
                    wait = None
                if wait is None:
                    wait = 2 ** attempt
                time.sleep(min(wait, 30))
                continue
            raise
        except (urllib.error.URLError, TimeoutError):
            if attempt < max_retries - 1:
                time.sleep(2 ** attempt)
                continue
            raise

search_q = f"{QUERY} filetype:bitmap"
search = urllib.parse.urlencode({
    "action": "query", "list": "search",
    "srsearch": search_q, "srnamespace": 6,
    "srlimit": str(COUNT * 4), "format": "json",
})

try:
    res = json.loads(http_get(f"{api}?{search}"))
except Exception as e:
    print(f"# search failed: {e}", file=sys.stderr)
    sys.exit(0)

hits = res.get("query", {}).get("search", [])
if not hits:
    print(f"# no results for: {QUERY}", file=sys.stderr)
    sys.exit(0)

saved = 0
for hit in hits:
    if saved >= COUNT:
        break
    title = hit["title"]
    info_q = urllib.parse.urlencode({
        "action": "query", "titles": title,
        "prop": "imageinfo", "iiprop": "url|size",
        "iiurlwidth": "1920", "format": "json",
    })
    try:
        info = json.loads(http_get(f"{api}?{info_q}"))
    except Exception:
        continue

    for page in info.get("query", {}).get("pages", {}).values():
        ii = page.get("imageinfo", [])
        if not ii:
            continue
        url = ii[0].get("thumburl") or ii[0].get("url")
        if not url:
            continue
        lower = url.lower().split("?")[0]
        ext = next((e for e in (".jpg", ".jpeg", ".png", ".webp") if lower.endswith(e)), None)
        if not ext:
            continue
        slug = "".join(c.lower() if c.isalnum() else "_" for c in title.replace("File:", "")).strip("_")[:60]
        out = os.path.join(DEST, f"{slug}{ext}")
        try:
            data = http_get(url, timeout=20)
            if len(data) < 4096 or len(data) > 8 * 1024 * 1024:
                continue
            with open(out, "wb") as f:
                f.write(data)
            print(out)
            saved += 1
        except Exception:
            continue
PY
