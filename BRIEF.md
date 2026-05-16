# BRIEF

## 1 · Analysis

### What this business actually is
CECAM — the Centre Européen de Calcul Atomique et Moléculaire — is a pan-European research organization headquartered at EPFL in Lausanne that promotes fundamental research in computational science, with traditional roots in atomistic and molecular simulation and a modern reach into materials, biology, and medicinal chemistry. Its core "product" is a curated annual program of flagship workshops, schools, conferences, lectures, prizes, and online series that bring the simulation community together. It does not sell anything; it is funded by member nations and partner institutions, and its job online is to attract high-quality proposals, fill its events, and signal scientific authority. The website's primary commercial mechanism is the open Flagship Call that solicits the next year's program from researchers worldwide.

### Who the audience really is
- **Primary**: working computational scientists — PhD students, postdocs, group leaders, and professors in physics, chemistry, materials, and biology — landing on the site to (a) submit a Flagship proposal, (b) register for or check dates of an upcoming workshop/school/conference, or (c) find a specific lecture series.
- **Secondary**: prospective hires checking the Careers page; journalists and funding bodies validating institutional legitimacy; partner centres (Psi-k, MARVEL, Lorentz) linking to joint activities; the simulation-curious "young in years or at heart" audience for Mixed-Gen and Mansigh series.

### What they're trying to convey
- "Serious, peer-recognized scientific institution, not a conference vendor."
- "European, multi-national, multi-decade legacy — but actively running cutting-edge programs right now."
- "Open to the community — proposals welcome, calls are real, the door is not closed."

### What's broken about the current presentation
- The hero buries the lede in 80 words of French institutional naming and a vague mission statement; first-time visitors don't see *what's actually on this site* (events, calls, the program).
- Navigation is a flat dump of nine top-level items including ambiguous labels ("How to", "Other activities", "Documents") with no visual hierarchy.
- The most commercially important item — the open Flagship Call with a deadline — is treated as one card among many instead of a prominent, time-pressured CTA.
- Event teasers are inconsistent and tease-only: "NEXT: Picking flowers: Hands-on Fleu" is truncated and unintelligible.
- Visual identity is dated and template-feeling; the only on-page imagery (a cartoon of vintage computers) actively undercuts the "frontier science" message.
- No proof or scale signals — no member-nation list, no event count, no notable alumni or lecturers visible on the home page.

### What the rebuild should optimize for
**Primary**: drive qualified researchers to the *open Flagship Call* and to the *upcoming event registrations* — the two actions that keep the program alive.
**Secondary (a)**: communicate scientific legitimacy and the breadth of the program at a glance.
**Secondary (b)**: make every event, lecture series, and document one or two clicks from the home page.

### Hard facts to preserve
- Name: **Centre Européen de Calcul Atomique et Moléculaire (CECAM)**
- HQ: **EPFL CECAM, Avenue de Forel 3, BCH 3103, 1015 Lausanne, Switzerland**
- Email: **helpdesk@cecam.org**
- Mailing-list signup: `https://www.cecam.org/register-our-mailing-list`
- Phone: listed as "contact" on source — `[verify]` actual number
- Flagship Call open until **17 July 2026**
- Upcoming highlighted workshop: **"Fracture of Amorphous Materials Across the Scales"**, CECAM-HQ Lausanne, **12–16 April 2027** (Ries, Pfaller, Giuntoli) — a CECAM-Lorentz joint workshop
- Program categories: **Workshops, Schools, Conferences, Events**
- Other activities: **Mixed-Gen, Webinars, CECAM Lectures, CECAM-MARVEL Classics, Mary Ann Mansigh Conversation Series, Berni J. Alder CECAM Prize**
- Static legal pages: **Disclaimer, Privacy Policy**

## 2 · Brand

### Verdict
**Partial rebrand.** The name, the multilingual institutional identity, and the program structure are load-bearing and stay. What changes is the visual register — moving from a generic CMS-template look to a dense, dark, editorial-data aesthetic that mirrors how the audience actually consumes scientific information (decks, posters, preprints) and matches the reference screenshot the user provided.

### Palette
- `#0A1628` — Abyssal Navy — primary (page background, hero)
- `#1B3A6B` — Lorentz Blue — accent (interactive, links, chart fills)
- `#F5F1E8` — Bone — surface (light sections, cards)
- `#E8E4D9` — Paper — ink (body text on dark, secondary surface on light)
- `#C9A961` — Brass — muted accent (deadlines, dates, highlights)

### Typography
`Heading: Fraunces` + `Body: Inter`. Fraunces gives the editorial, slightly serious, *scientific-journal-cover* register that signals a European research institute; Inter handles dense event metadata, dates, and forms with the neutrality the program calendar needs.

### Voice
**Precise, institutional, quietly confident.** Writes like a senior researcher introducing a colloquium: declarative sentences, no marketing softeners ("solutions", "empowering"), uses the actual technical names of things (Flagship, Lorentz, MARVEL, Psi-k) and trusts the reader to know what they mean.

### Sample copy
- **Hero headline**: Computational science, convened in Lausanne since 1969.
- **Hero subhead**: CECAM runs the European program of flagship workshops, schools, and conferences in atomistic and molecular simulation. The 2027–2028 call is open.
- **Primary CTA**: Submit a proposal

## 3 · Plan

### Site map
- **Home** (`/`) — orient any researcher in under five seconds — click into program, call, or news
- **Program** (`/program`) — the full calendar of workshops, schools, and conferences — find or register for an event
- **Flagship Call** (`/flagship-call`) — explain and solicit the next program cycle — submit a proposal
- **Activities** (`/activities`) — index of recurring series (Mixed-Gen, Lectures, MARVEL Classics, Mansigh, Alder Prize, Webinars) — find the right series
- **About** (`/about`) — institutional identity, HQ, history, governance — establish legitimacy / answer "what is this?"
- **News** (`/news`) — announcements and event recaps — surface fresh activity

### Navigation
- **Header nav**: Program · Flagship Call · Activities · About · News
- **Footer**: HQ address block (EPFL CECAM, Avenue de Forel 3, 1015 Lausanne) · contact email (helpdesk@cecam.org) · mailing-list link · phone `[verify]` · Careers · Documents · Disclaimer · Privacy Policy · copyright line

### Page content briefs

**Home** — Single job: get the researcher to either the Flagship Call or the next event in under one screen.
Sections in order: hero (institutional naming + open-call statement) · open-call band (deadline + CTA) · upcoming events grid (next 3–4 across workshops/schools/conferences) · featured news item (the Lorentz workshop selection) · activities strip (six series tiles) · about teaser (one paragraph + read-more) · footer.
CTAs: "Submit a proposal" in hero and call band; "See the full program" in events grid; "Subscribe" in footer.
Imagery: one strong hero photograph (conference auditorium or HQ exterior) + small thumbnail per activity tile.

**Program** — Single job: let a researcher find the event they care about and click through.
Sections: page title + intro paragraph · filter row (type, month, location — visual only, links to anchors) · grouped lists (Workshops, Schools, Conferences, Events) · each item: title, dates, location, organizers, one-line summary.
No form on this page. Imagery: optional small badge per event type; no hero photo.

**Flagship Call** — Single job: convince a researcher to submit, and tell them exactly how.
Sections: hero with deadline (17 July 2026) prominent · what the call funds (workshops, schools — short prose) · eligibility and format · timeline · submission link / button.
CTA: "Submit your proposal" (external link to current submission system, `[verify]`).
Imagery: one editorial photograph — manuscript page, blackboard with equations, or HQ meeting room.

**Activities** — Single job: route the reader to the right recurring series.
Sections: short intro · six cards (Mixed-Gen, Webinars, CECAM Lectures, MARVEL Classics, Mansigh Series, Alder Prize) each with one-paragraph description + link.
No form. Imagery: small symbolic mark per series (SVG monogram).

**About** — Single job: prove CECAM is institutionally serious.
Sections: institutional name + tagline · history paragraph (the existing "CECAM is an organization devoted to…") · HQ location with photo · member-nations / partners block `[verify]` · governance and director (`[verify]`) · contact block.
Imagery: HQ exterior or interior photograph; map of Lausanne location.

**News** — Single job: show recent activity.
Sections: page title · reverse-chronological list of news items, each a card with date, title, two-line dek, link.
No form. Imagery: optional 16:9 thumbnail per item.

### Collections
Default `pages` collection handles About and Flagship Call (one-off pages). The site needs:

- **events** — `name: events`, `label: Events`, `route: /program`, `template: event.html`, `list_template: program.html`. Fields:
  - `title` (text, required) — event name
  - `slug` (slug, required) — URL slug
  - `event_type` (select: workshop, school, conference, event; required) — category for filtering and grouping on Program page
  - `start_date` (datetime, required) — first day
  - `end_date` (datetime, required) — last day
  - `location` (text, required) — e.g. "CECAM-HQ, EPFL, Lausanne"
  - `organizers` (textarea, required) — comma-separated list, rendered as plain text
  - `summary` (textarea, required) — one-line teaser used on Program list and Home grid
  - `body` (markdown, required) — full description
  - `external_url` (url, optional) — original cecam.org workshop-details link, used when the static rebuild doesn't host the full event microsite

- **activities** — `name: activities`, `label: Activity Series`, `route: /activities`, `template: activity.html`, `list_template: activities.html`. Fields:
  - `title` (text, required) — series name (e.g. "Mary Ann Mansigh Conversation Series")
  - `slug` (slug, required)
  - `summary` (textarea, required) — one-paragraph description
  - `body` (markdown, required) — full description
  - `external_url` (url, optional) — link to live series page on cecam.org while rebuild is partial
  - `order` (number, required) — sort order on Activities index

- **news** — already exists as `posts`, reuse it; route it under `/news` via template naming. No new collection.

The default `contact` form collection is **not used** — see Forms below.

### Forms
**Mailto fallback.** CECAM's culture is institutional and the existing site already routes contact through a plain email address (`helpdesk@cecam.org`); a Formspree placeholder would look out-of-character on a research-centre site, and a research scientist will happily click a mailto. The Flagship submission already goes to an external system (`/submit-flagship-proposal` on the live site) — link out, don't rebuild.

## 4 · Design

### Direction
**Editorial scientific-deck:** a dark, dense, presentation-grade aesthetic that treats the home page like the opening spread of a research conference deck — heavy navy ground, generous editorial serif headlines, monospaced metadata, charts and lists handled with the same care as body type. Touchstones: **Stripe Press** for the type-driven editorial calm; **MIT Technology Review** print covers for the confident serif-on-dark; and the reference screenshot the user supplied — the data-deck "Smart Digital Transformation" template with its layered navy panels, sharp dividers, and analytics blocks. Decidedly not Aesop-soft, not startup-bright; closer to a Nature special-issue cover redesigned for the web.

### Type scale
1.25 modular scale, Fraunces variable weights 400/500/600 (display optical size 144), Inter 400/500/600.
- Display: `4.5rem / 1.05 / 600` (Fraunces, display opsz)
- H1: `3rem / 1.1 / 600` (Fraunces)
- H2: `2.25rem / 1.15 / 500` (Fraunces)
- H3: `1.5rem / 1.25 / 500` (Fraunces)
- Body: `1.0625rem / 1.55 / 400` (Inter)
- Small / meta: `0.8125rem / 1.4 / 500` (Inter, tracking +0.04em, uppercase for labels)

### Spacing & rhythm
- Container max-width: **1240px**, with an inner reading column of **720px** for long-form sections.
- Section vertical padding: small `4rem` (64px), large `8rem` (128px).
- Grid gutters: **24px** on desktop, **16px** on mobile; 12-column grid.
- No strict baseline grid — rhythm comes from a consistent `1.5rem` vertical step between block elements; headings get extra breathing room on the top edge (`mt: 3rem`).

### Components

**Header / nav** — 72px tall, fixed at top with a thin 1px brass underline that appears on scroll. CECAM wordmark left (small, set in Fraunces small caps), five nav items right in Inter 500. On mobile collapses to a hamburger icon and a full-screen overlay with nav items as oversized Fraunces H2 links.

**Hero** — Asymmetric two-column on desktop: left column 60% holds Display headline + subhead + primary CTA; right column 40% holds a single editorial photograph with a subtle Lorentz Blue gradient overlay (bottom-left). On mobile the photo drops to a 16:9 block under the text. No carousel.

**Standard content section** — Two-column on desktop, 5/7 split: left column is a short Fraunces H2 with an uppercase brass eyebrow above; right column is body copy or list. Alternate sides only when two such sections sit back-to-back to avoid wall-of-text.

**Card** — For events on Home and Program: dark surface with a 1px Paper-tinted border, no shadow. Top: eyebrow with event type in brass uppercase and date range in Inter mono-feeling style. Title in Fraunces H3. One-line summary in Inter body. Location in small/meta. Whole card is the link; hover lifts the border colour to brass.

**Footer** — Four columns on desktop: HQ address · contact · activities quick links · legal/social. Dense — Inter small at 0.8125rem, generous line-height. Bottom strip with copyright and a small "Centre Européen de Calcul Atomique et Moléculaire" full name in Fraunces italic.

**Buttons** — Primary: solid Brass on Navy, Inter 500, 0.9375rem, 12px × 24px padding, 2px radius, no shadow. Hover: background shifts to slightly lighter brass. Focus: 2px Bone outline offset 3px. Secondary: 1px Paper outline on dark backgrounds, fills to Paper-on-Navy on hover. Link: Lorentz Blue on light surfaces, brass on dark, underlined with 1px brass on hover.

**Forms** — Not used on this site (mailto only). Mailing-list block in footer: a single inline element pairing label + `<a href="mailto:…">` styled as a secondary button.

### Per-page layout

**Home**
1. Header (sticky).
2. Hero — Hero component, headline left + photograph right.
3. Open Call band — full-bleed Navy section, one line: "Flagship Call open · Deadline 17 July 2026" with Brass CTA right-aligned. Oversized Fraunces display number for the deadline day.
4. Upcoming events — 3-up grid using Card component; Section padding large.
5. Featured news — Standard content section, left column "From the program" eyebrow + H2, right column the Lorentz workshop announcement with a small thumbnail.
6. Activities strip — 6 small cards in a 3×2 grid on desktop, 2×3 on tablet, stacked on mobile.
7. About teaser — Two-column Standard content section with the institutional paragraph + "About CECAM" link.
8. Footer.

**Program**
1. Header.
2. Page title block — Display "Program 2026–2027" + one-line intro + filter row (anchored tabs, not real filters).
3. Workshops list — H2 + 5–10 cards.
4. Schools list — same pattern.
5. Conferences list — same pattern.
6. Events list — same pattern.
7. Footer.
One-off treatment: tall left margin in each list group reserved for an oversized brass count ("12 / Workshops" set in Fraunces display) — a single static visual that anchors the page without illustration.

**Flagship Call**
1. Header.
2. Hero — single column, centred Display headline "The 2027–2028 Flagship Call is open", deadline pulled out below in oversized brass type. Background: full-bleed editorial photograph at 30% opacity.
3. What this call funds — Standard content section.
4. Eligibility — Standard content section.
5. Timeline — vertical list with brass dates in mono-feeling Inter.
6. Submit — full-width Navy band with the primary CTA centred.
7. Footer.

**Activities**
1. Header.
2. Page title + one-paragraph intro.
3. Six activity cards in a 2×3 grid; each card uses the Card component but taller, with an SVG monogram top-left.
4. Footer.

**About**
1. Header.
2. Display title — full institutional name set across two lines in Fraunces.
3. Mission paragraph — single 720px reading column.
4. HQ — Standard content section: left column heading "Headquarters" + address; right column photograph of the EPFL building.
5. Member nations / partners `[verify]` — Standard content section with a flat list of names in Inter small caps.
6. Contact — full-bleed Navy band with email, address, mailing-list mailto.
7. Footer.

**News**
1. Header.
2. Page title.
3. Reverse-chronological list — each item is a Card variant: full width, date eyebrow + Fraunces H3 title + two-line dek + Inter "Read more" link.
4. Footer.

### Imagery plan

| Page | Slot | Treatment | Source | Search query (if photo) | Aspect |
|------|------|-----------|--------|-------------------------|--------|
| Home | Hero photo | Right column, 40% width, Lorentz Blue gradient overlay bottom-left | Source asset (`source/images/img-00.png`, the CECAM conference auditorium) | — | 4:3 |
| Home | Featured news thumbnail | Small, right of news block | Photograph | `fractured glass close-up macro` (for the amorphous-materials workshop teaser) | 4:3 |
| Home | Activity tiles (×6) | Small SVG monogram per series, top-left of card | SVG illustration | Engineer draws: M, W, L, C, S, A monograms in Fraunces small caps inside a 1px brass square | 1:1 |
| Program | Page accent | None — type-only page | — | — | — |
| Flagship Call | Hero background | Full-bleed, 30% opacity over Navy | Photograph | `chalkboard physics equations handwritten dense` | 16:9 |
| Activities | Activity tiles (×6) | Same SVG monograms as Home | SVG illustration | (see Home) | 1:1 |
| About | HQ photo | Right column, full width of column | Photograph | `EPFL Lausanne campus building modern Swiss architecture afternoon light` | 4:3 |
| About | Mission section background | Color block — Navy section divider | Color block | — | — |
| News | Item thumbnails (optional) | 16:9 left of each card, may be omitted on text-only items | Photograph | per item — for the Lorentz item, `crack propagation polymer micrograph` | 16:9 |

Engineer should run `bash scripts/fetch-image.sh "<query>"` for each photographic slot before writing templates. The vintage-computers cartoon in `source/images/img-01.jpeg` and the other source images are **not used** — they undercut the rebuild's tone.

### Motion
Very little, snappy fades only. Header gets a 200ms fade-in on the brass underline once the page scrolls past 100px. Cards lift their border colour on hover over 120ms — no transform, no shadow. Page transitions are instant. No parallax, no scroll-triggered animation, no carousel. The page should feel like turning a journal page, not opening a deck.

### What NOT to do
- Don't use stock-photo "scientists in lab coats pointing at screens" — the audience *is* those scientists and will read it as condescending.
- Don't carousel the events. Researchers scan; a 3–4-card static grid lets them parse dates in one pass.
- Don't translate the brand into bright "tech startup" blue or add gradients beyond the single Lorentz overlay on the hero photo.
- Don't hide the Flagship Call deadline inside body copy — it is the single most commercially important number on the site and must be set in display type at least once on Home and once on the Flagship page.
- Don't add a cookie banner, chat widget, or any third-party overlay; this is a research institution, not an e-commerce site.