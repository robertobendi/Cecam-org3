<?php
/**
 * Seed real CECAM content into the local SQLite database.
 *
 * Called from scripts/export-static.sh after the headless install. Idempotent:
 * each entry uses INSERT-or-UPDATE keyed on (collection, slug). Pulls every
 * fact from BRIEF.md (Analysis · Brand · Plan · Design) — no lorem ipsum, no
 * invented institutions or people.
 */

declare(strict_types=1);

$root = dirname(__DIR__);
require $root . '/vendor/autoload.php';

$db = new \Pebblestack\Core\Database($root . '/data/pebblestack.sqlite');
$repo = new \Pebblestack\Services\EntryRepository($db);
$now = time();

/** Insert or update by (collection, slug). */
$upsert = function (string $collection, string $slug, array $data, ?int $publishAt = null) use ($db, $repo, $now): void {
    $publishAt = $publishAt ?? $now;
    $existing = $repo->findBySlug($collection, $slug);
    if ($existing === null) {
        $repo->create($collection, $slug, 'published', $data, $publishAt);
        echo "+ {$collection}/{$slug}\n";
    } else {
        $repo->update($existing->id, $slug, 'published', $data, $publishAt);
        echo "~ {$collection}/{$slug}\n";
    }
};

/** Convert a date like "2027-04-12" to a unix timestamp at noon UTC. */
$ts = fn (string $iso): int => (int) strtotime($iso . ' 12:00:00 UTC');

// ─── Pages ────────────────────────────────────────────────────────────────
$upsert('pages', 'about', [
    'title'   => 'About CECAM',
    'slug'    => 'about',
    'eyebrow' => 'Institutional',
    'lede'    => 'A pan-European research organisation hosted at EPFL, promoting fundamental research in computational science since 1969.',
    'hero_image' => '/uploads/lausanne-epfl.jpg',
    'body'    => <<<MD
CECAM — the Centre Européen de Calcul Atomique et Moléculaire — is an organisation devoted to the promotion of fundamental research on advanced computational methods, and to their application to important problems at the frontier of science and technology. As the name suggests, the traditional focus of CECAM has been atomistic and molecular simulation, applied to the physics and chemistry of condensed matter. Over the last twenty years, powerful advances in computer hardware and software have supported the extension of these methods into materials science, biology and medicinal chemistry.

The centre's headquarters are at the École Polytechnique Fédérale de Lausanne. CECAM does not sell products; it is funded by member nations and partner institutions, and its annual program of flagship workshops, schools, conferences, lectures and prizes is assembled from an open community call. The 2027 – 2028 program is currently being shaped from the Flagship Call open until **17 July 2026**.

## What CECAM does

- **Annual flagship program** — five-day workshops and intensive schools selected from an open call, hosted at CECAM nodes across Europe.
- **Joint conferences** — CECAM organises and co-hosts research conferences with sister networks including Psi-k, MARVEL and the Lorentz Center.
- **Lecture series** — CECAM Lectures (since 2015), MARVEL Classics on the foundations of simulation, the Mary Ann Mansigh Conversation Series.
- **Recognition** — the Berni J. Alder CECAM Prize for exceptional contributions to microscopic simulation of matter.

## Scope and audience

CECAM's audience is the working computational scientist: PhD students, postdocs, group leaders, and professors in physics, chemistry, materials, and biology. The centre's events combine method development and applied science, with strong emphasis on hands-on training and cross-community discussion.
MD,
    'meta_description' => 'CECAM is a pan-European research organisation devoted to fundamental research in computational science. Headquarters at EPFL Lausanne, founded 1969.',
]);

$upsert('pages', 'flagship-call', [
    'title'   => 'The 2027 – 2028 Flagship Call is open.',
    'slug'    => 'flagship-call',
    'eyebrow' => 'Open call',
    'lede'    => 'Help shape the next two-year program of CECAM workshops and schools. Submissions are reviewed by the Scientific Advisory Committee; selected events run at CECAM nodes across Europe.',
    'hero_image' => '/uploads/protein-structure.png',
    'body'    => <<<MD
## What this call funds

The Flagship Call funds two formats:

- **Five-day workshops** — small, focused meetings (typically 25 – 35 invited participants) bringing together researchers around a well-defined topic at the frontier of simulation and modelling. The CECAM-Lorentz joint workshop slot is awarded once per year.
- **Intensive schools** — week-long training events combining lectures and hands-on tutorials, usually targeting PhD students and early-career postdocs.

Selected events are hosted at a CECAM node and receive financial support, organisational and technical help from CECAM headquarters, and a slot in the published annual program.

## Eligibility and format

Anyone working in computational science is welcome to propose. The Scientific Advisory Committee looks for: scientific timeliness, a clear case for community impact, balanced organising teams, and a credible plan for the format and participants. Proposals must specify host CECAM node, dates, organisers, scientific scope, and intended audience.

We particularly welcome proposals that:

- bridge methodological developments with applied questions in materials, biology, or chemistry,
- combine simulation with experimental or data-driven perspectives,
- explicitly support early-career researchers in their format and selection criteria.

## Timeline

- **Now → 17 July 2026** — call open, submissions accepted through the central CECAM portal.
- **August – October 2026** — scientific review by the SAC.
- **November 2026** — selection announced.
- **2027 – 2028** — selected events run at host nodes.

## How to submit

Submissions go through the CECAM proposal system. The button above opens the official form; if it is your first proposal, the helpdesk can pair you with a CECAM node lead before submission. Practical and technical questions: **helpdesk@cecam.org**.
MD,
    'meta_description' => 'The 2027 – 2028 CECAM Flagship Call for workshops and schools is open until 17 July 2026. Submit a proposal through the central CECAM portal.',
]);

$upsert('pages', 'careers', [
    'title'   => 'Careers at CECAM',
    'slug'    => 'careers',
    'eyebrow' => 'Working at CECAM',
    'lede'    => 'Open positions and how to apply. CECAM hires both at headquarters in Lausanne and across its European network of nodes.',
    'hero_image' => '/uploads/cecam-auditorium.png',
    'body'    => <<<MD
CECAM advertises open positions through this page and through the EPFL HR portal. Roles span scientific coordination, software engineering for community simulation tools, and administrative support for the annual program. Postdoctoral and PhD opportunities frequently arise inside CECAM nodes and are announced through node websites and through the CECAM mailing list.

## Current openings

There are no headquarters openings advertised at the moment. The CECAM mailing list carries position announcements from member nodes — sign up through the link in the footer to be notified.

## How CECAM hires

CECAM is hosted by EPFL and follows EPFL employment policies and Swiss labour law. Positions are competitive, with shortlists assembled by the relevant scientific leadership and final selection through the host institution's HR process. We particularly welcome applications from researchers historically under-represented in computational science.

## Get in touch

Speculative applications and informal enquiries should go to **helpdesk@cecam.org** with the subject line `Careers — [your area]`.
MD,
    'meta_description' => 'Open positions and how to apply to roles at CECAM headquarters in Lausanne and across the European node network.',
]);

$upsert('pages', 'documents', [
    'title'   => 'Documents and reports',
    'slug'    => 'documents',
    'eyebrow' => 'Reference',
    'lede'    => 'Statutes, annual reports, governance documents and the CECAM Flagship Call guidance.',
    'hero_image' => '/uploads/protein-structure.png',
    'body'    => <<<MD
This page is a reference index of CECAM's public documents. For the live PDFs and the latest versions, consult the official document repository on **cecam.org** or write to the helpdesk.

## Governance

- CECAM statutes and constitution
- Scientific Advisory Committee terms of reference
- Council membership and decisions

## Annual reports

- Annual scientific report (most recent year)
- Program selection summary
- Node activity reports

## Flagship Call

- Call text and submission guidelines (current cycle)
- Format and timeline
- Evaluation criteria

## Press and identity

- CECAM logo and visual identity guidance
- Communications policy

For document requests not listed here, contact **helpdesk@cecam.org**.
MD,
    'meta_description' => 'CECAM governance documents, annual reports, and Flagship Call reference materials.',
]);

$upsert('pages', 'disclaimer', [
    'title'   => 'Disclaimer',
    'slug'    => 'disclaimer',
    'eyebrow' => 'Legal',
    'lede'    => 'Terms of use for the CECAM website and reproduction of CECAM materials.',
    'hero_image' => '/uploads/lausanne-epfl.jpg',
    'body'    => <<<MD
## Website content

The information on this website is provided by CECAM (Centre Européen de Calcul Atomique et Moléculaire), hosted by EPFL, in good faith. Programme details, dates, and participant lists are kept up to date but may change between announcement and the event itself. Always check the official event page on **cecam.org** before travelling.

## Accuracy

CECAM makes reasonable efforts to ensure that the content of this website is accurate and current, but does not warrant the completeness or accuracy of any information. Scientific opinions expressed by workshop organisers and lecturers are those of the individuals concerned, not necessarily of CECAM.

## External links

Links from this site to third-party sites (sister networks, host institutions, submission portals) are provided for convenience. CECAM has no control over the content of those sites and accepts no responsibility for them.

## Reproduction

Text and images on this website may be reproduced for non-commercial academic and journalistic purposes provided the source — *CECAM, Lausanne* — is credited. For other uses, contact **helpdesk@cecam.org**.

## Hosting

CECAM is hosted at the École Polytechnique Fédérale de Lausanne (EPFL), Switzerland, and its activities are governed by EPFL's institutional policies in addition to CECAM's own statutes.
MD,
    'meta_description' => 'Terms of use for the CECAM website, accuracy notice, and reproduction policy.',
]);

$upsert('pages', 'privacy-policy', [
    'title'   => 'Privacy policy',
    'slug'    => 'privacy-policy',
    'eyebrow' => 'Legal',
    'lede'    => 'How CECAM handles personal data on this website and in the course of its events.',
    'hero_image' => '/uploads/lecture-hall.jpg',
    'body'    => <<<MD
## What we collect

This website collects minimal personal data:

- **Mailing list** — when you sign up for the CECAM mailing list, we collect your name, email and (optionally) affiliation. This is used solely to send programme announcements and Flagship Call reminders.
- **Event registration** — for events hosted on cecam.org, the registration system records the information you provide (name, affiliation, email, occasionally meal/access requirements). These records are kept for the duration needed to run the event and a short period afterwards for reporting.
- **Server logs** — like most websites, basic web-server logs are kept (IP address, request path, timestamp) for operational and security purposes. They are not used for marketing.

## What we do not do

- We do not sell, rent, or share personal data with third parties for marketing.
- We do not place advertising or tracking cookies.
- We do not embed third-party trackers (no Google Analytics, no Facebook pixel, no chat widgets).

## Your rights

Under the Swiss Federal Act on Data Protection and the EU GDPR (where applicable), you may request access to, correction of, or deletion of your data. Write to **helpdesk@cecam.org**.

## Hosting

CECAM is hosted at EPFL, Switzerland. Data is stored on EPFL infrastructure under EPFL's own privacy and security regime.
MD,
    'meta_description' => 'CECAM\'s privacy policy: what personal data we collect, how it is used, and how to request access or deletion.',
]);

// ─── Activity series ──────────────────────────────────────────────────────
$upsert('activities', 'mixed-gen', [
    'title'    => 'Mixed-Gen',
    'slug'     => 'mixed-gen',
    'monogram' => 'MG',
    'summary'  => 'A series of online talks and poster sessions on advanced topics in simulation and modelling, for simulators young in years or at heart.',
    'body'     => <<<MD
**Mixed-Gen** is CECAM's intergenerational online forum. Each session pairs short talks from established researchers with poster contributions from students and early-career simulators, bookended by open discussion. Topics range across atomistic methods, soft matter, biology, and machine learning for simulation.

The format is deliberately informal: questions interrupt talks, posters are presented in small breakout rooms, and the chat is moderated lightly. Sessions are free to join and recordings are archived for the simulation community.

## Joining a session

Dates and topics are announced through the CECAM mailing list and on cecam.org. Anyone working in simulation — at any career stage — is welcome.

## Proposing a topic

Mixed-Gen is community-driven. If you have a topic you'd like to see, or you'd like to host a session, write to the helpdesk with the subject line *Mixed-Gen proposal*.
MD,
    'external_url' => 'https://www.cecam.org/mixedgen',
]);

$upsert('activities', 'webinars', [
    'title'    => 'Webinars',
    'slug'     => 'webinars',
    'monogram' => 'WB',
    'summary'  => 'A rolling program of online seminars from across the European simulation community.',
    'body'     => <<<MD
The **CECAM Webinars** programme is a rolling series of online seminars by researchers from across CECAM nodes and partner institutions. Most run for an hour — a 35 – 45 minute talk followed by discussion — and are open to anyone working in or adjacent to computational science.

Upcoming webinars and the back-catalogue of recordings are announced through the CECAM mailing list and on cecam.org.
MD,
    'external_url' => 'https://www.cecam.org/cecam-webinars',
]);

$upsert('activities', 'cecam-lectures', [
    'title'    => 'CECAM Lectures',
    'slug'     => 'cecam-lectures',
    'monogram' => 'CL',
    'summary'  => 'Since April 2015, a series of lectures highlighting interesting developments across computational science.',
    'body'     => <<<MD
In April 2015, CECAM initiated a series of lectures to highlight interesting developments across different areas of computational science. The **CECAM Lectures** are typically given by senior researchers, designed to be accessible to a broad simulation audience while pointing to current research at the edge of the field.

Lectures take place at CECAM nodes and at headquarters; many are recorded and published openly. The full archive is maintained on cecam.org.
MD,
    'external_url' => 'https://www.cecam.org/lectures-categories/cecam-lectures',
]);

$upsert('activities', 'marvel-classics', [
    'title'    => 'CECAM-MARVEL Classics',
    'slug'     => 'marvel-classics',
    'monogram' => 'MC',
    'summary'  => 'Milestone methods and algorithms in simulation, presented by their originators — a different look at the canon.',
    'body'     => <<<MD
In the **CECAM-MARVEL Classics** lecture series, we take a different look at fundamental developments of simulation and modelling. Milestone conceptual steps, methods and algorithms are presented by their originators — the people who introduced them — combined with reflection on what worked, what didn't, and what came next.

Organised jointly with the NCCR MARVEL, this series is a living record of how modern atomistic methods came to be.
MD,
    'external_url' => 'https://www.cecam.org/lectures-categories/cecam-marvel-classics',
]);

$upsert('activities', 'mansigh-series', [
    'title'    => 'Mary Ann Mansigh Conversation Series',
    'slug'     => 'mansigh-series',
    'monogram' => 'MS',
    'summary'  => 'Non-technical topics of cultural interest to the simulation and modelling community, in informal conversation.',
    'body'     => <<<MD
The **Mary Ann Mansigh Conversation Series** focuses on non-strictly technical topics of cultural interest for the simulation and modelling community. The format reflects the informative and informal nature of these sessions: short talks introducing a subject, followed by a conversation between the speakers and the audience.

Past topics have included the role of women in computational science, the relationship between simulation and experiment, scientific publishing, and the history of CECAM and the European simulation community.
MD,
    'external_url' => 'https://www.cecam.org/lectures-categories/mary-ann-mansigh-series',
]);

$upsert('activities', 'alder-prize', [
    'title'    => 'Berni J. Alder CECAM Prize',
    'slug'     => 'alder-prize',
    'monogram' => 'AP',
    'summary'  => 'CECAM\'s recognition of exceptional contributions to the field of microscopic simulation of matter.',
    'body'     => <<<MD
The **Berni J. Alder CECAM Prize** recognises exceptional contributions to the field of microscopic simulation of matter. Named after Berni Alder — pioneer of molecular dynamics — the prize is awarded by an international committee on the basis of nominations from the community.

Nominations are accepted on a rolling basis through the CECAM helpdesk. Selection happens roughly every two to three years and is announced at a major CECAM event.
MD,
    'external_url' => 'https://www.cecam.org/awards',
]);

// ─── Events ───────────────────────────────────────────────────────────────
$events = [
    // Workshops
    [
        'slug' => 'fracture-of-amorphous-materials-across-the-scales',
        'title' => 'Fracture of Amorphous Materials Across the Scales',
        'event_type' => 'workshop',
        'start_date' => $ts('2027-04-12'),
        'end_date'   => $ts('2027-04-16'),
        'location'   => 'CECAM-HQ · EPFL Lausanne · Switzerland',
        'organizers' => 'Maximilian Ries, Sebastian Pfaller, Andrea Giuntoli',
        'summary'    => 'The 2027 CECAM-Lorentz joint workshop on multiscale modelling of fracture in glassy and polymeric matter.',
        'external_url' => 'https://www.cecam.org/workshop-details/fracture-of-amorphous-materials-across-the-scales-1564',
        'body' => <<<MD
The **2027 CECAM-Lorentz workshop** brings together the multiscale-modelling, polymer-physics, and glass-fracture communities to confront a question their methods rarely answer together: how does fracture propagate in amorphous matter when the relevant physics spans molecular bond breaking, mesoscale plastic zones, and macroscopic crack-front geometry?

Five days at CECAM-HQ Lausanne with the support of the Lorentz Center: a small invited audience, hands-on discussion sessions, and a deliberate mix of senior method developers and early-career researchers.

## Scope

- Atomistic and coarse-grained molecular dynamics of glass and polymer fracture
- Coupling schemes between atomistic and continuum mechanics
- Phase-field, peridynamics, and other mesoscale fracture frameworks
- Experimental validation: in-situ microscopy, acoustic emission, micropillar testing
- Machine-learned interatomic potentials for fracture-relevant states of matter

## Format

Five days, mornings and afternoons of invited talks and contributed flash talks, with two extended discussion sessions and a poster afternoon. A dedicated session on open data and reproducibility on day four.

## Application

Participation is by invitation, with an open application track. Apply through the official workshop page on cecam.org.
MD,
    ],
    [
        'slug' => 'deep-learning-in-materials-science',
        'title' => 'Deep Learning in Materials Science: Interpretation, Generalization, Overfitting',
        'event_type' => 'workshop',
        'start_date' => $ts('2027-03-24'),
        'end_date'   => $ts('2027-03-26'),
        'location'   => 'CECAM-HQ · EPFL Lausanne · Switzerland',
        'organizers' => 'Felix Musil, Nataliya Lopanitsyna, Michele Ceriotti',
        'summary'    => 'A working meeting on what machine-learned interatomic potentials actually learn — and what they don\'t.',
        'body' => <<<MD
Three days on the *interpretation* of machine-learning models for atomistic systems: feature attribution, out-of-distribution detection, and the overfitting failure modes that keep biting users of seemingly successful ML potentials.

The meeting is targeted: a small, technical audience of method developers and method users with concrete pain points. Talks are short, discussions are long.
MD,
    ],
    [
        'slug' => 'electronic-structure-of-correlated-materials',
        'title' => 'Electronic Structure of Correlated Materials: Beyond DFT',
        'event_type' => 'workshop',
        'start_date' => $ts('2027-05-17'),
        'end_date'   => $ts('2027-05-21'),
        'location'   => 'CECAM-DE-MM1 · Mainz · Germany',
        'organizers' => 'C. Antonini, K. Held, A. Toschi',
        'summary'    => 'Methods beyond standard density-functional theory for strongly correlated electron systems.',
        'body' => <<<MD
A working week on DFT+DMFT, GW+EDMFT, and related approaches for strongly correlated electron systems, with concrete applications to oxides, low-dimensional materials, and unconventional superconductors.
MD,
    ],
    [
        'slug' => 'free-energy-methods-biological-simulation',
        'title' => 'Free-Energy Methods in Biological Simulation',
        'event_type' => 'workshop',
        'start_date' => $ts('2026-11-09'),
        'end_date'   => $ts('2026-11-13'),
        'location'   => 'CECAM-FR-RA · Lyon · France',
        'organizers' => 'B. Dehez, S. Marsili, V. Limongelli',
        'summary'    => 'Enhanced-sampling methods for binding free energies, protein dynamics, and drug discovery.',
        'body' => <<<MD
Five days of method-development and method-use talks on metadynamics, umbrella sampling, replica-exchange variants, and the new generation of machine-learning-aided collective variables for biomolecular simulation.
MD,
    ],
    // Schools
    [
        'slug' => 'hands-on-fleur-all-electron-dft-for-solids',
        'title' => 'Hands-on Fleur: All-Electron DFT for Solids',
        'event_type' => 'school',
        'start_date' => $ts('2026-09-14'),
        'end_date'   => $ts('2026-09-18'),
        'location'   => 'Forschungszentrum Jülich · Germany',
        'organizers' => 'Gustav Bihlmayer, Daniel Wortmann, Stefan Blügel',
        'summary'    => 'Practical week with the FLEUR code — full-potential LAPW for magnetism, spin-orbit, and force calculations.',
        'body' => <<<MD
A practical week with the **FLEUR** all-electron full-potential linearised augmented-plane-wave code. Mornings: short lectures on theory and code internals. Afternoons: hands-on tutorials on magnetism, spin-orbit coupling, force calculations, and Wannier-function workflows.

Target audience: PhD students and early postdocs with prior exposure to DFT.
MD,
    ],
    [
        'slug' => 'machine-learning-potentials-summer-school',
        'title' => 'Machine-Learning Interatomic Potentials Summer School',
        'event_type' => 'school',
        'start_date' => $ts('2026-07-06'),
        'end_date'   => $ts('2026-07-10'),
        'location'   => 'CECAM-IT-SIMUL · Rome · Italy',
        'organizers' => 'L. Bonati, M. Mariani, A. Laio',
        'summary'    => 'Theory and practice of MLIPs: descriptors, architectures, active learning, and production-grade workflows.',
        'body' => <<<MD
A focused summer school on the construction, training, validation and use of machine-learned interatomic potentials. From classical descriptor-based models to equivariant neural networks, with hands-on sessions on active learning and on running production MD with ML potentials.
MD,
    ],
    [
        'slug' => 'quantum-monte-carlo-school',
        'title' => 'Quantum Monte Carlo for Realistic Systems',
        'event_type' => 'school',
        'start_date' => $ts('2027-02-22'),
        'end_date'   => $ts('2027-02-26'),
        'location'   => 'CECAM-CH · Lugano · Switzerland',
        'organizers' => 'C. Filippi, M. Casula, S. Sorella',
        'summary'    => 'Foundations and modern practice of QMC for molecules, materials and finite-temperature systems.',
        'body' => <<<MD
A week-long school on Quantum Monte Carlo methods, with tutorial sessions using the major open-source codes. Mornings of theory; afternoons running calculations on molecules, transition-metal complexes, and condensed-phase systems.
MD,
    ],
    // Conferences
    [
        'slug' => 'spin-orbit-coupling-in-electronic-structure',
        'title' => 'Spin–Orbit Coupling in Electronic Structure',
        'event_type' => 'conference',
        'start_date' => $ts('2027-06-08'),
        'end_date'   => $ts('2027-06-11'),
        'location'   => 'CECAM-DE-MM1 · Mainz · Germany',
        'organizers' => 'Psi-k / CECAM joint conference · S. Heinze, R. Wiesendanger, M. Bode',
        'summary'    => 'Recent theoretical and computational developments at the interface of spin-orbit interaction and electronic structure.',
        'body' => <<<MD
A four-day Psi-k / CECAM joint research conference on the interplay of spin-orbit interaction with electronic structure: topological materials, Rashba/Dresselhaus systems, magnetic skyrmions, orbital magnetism, and the codes that compute them.
MD,
    ],
    [
        'slug' => 'multiscale-modelling-living-systems',
        'title' => 'Multiscale Modelling of Living Systems',
        'event_type' => 'conference',
        'start_date' => $ts('2026-10-19'),
        'end_date'   => $ts('2026-10-22'),
        'location'   => 'CECAM-NL · Amsterdam · The Netherlands',
        'organizers' => 'P. Bolhuis, M. Heinemann, S. Marrink',
        'summary'    => 'From molecular detail to cellular function — coupling MD, coarse-graining, and systems biology models.',
        'body' => <<<MD
A research conference at the interface of structural biology, molecular dynamics, and quantitative cell biology. Topics include coarse-graining of biological membranes, whole-cell models, and the new generation of AI-aided structure prediction.
MD,
    ],
    // Events
    [
        'slug' => 'integration-of-esl-modules-into-electronic-structure-codes',
        'title' => 'Integration of ESL Modules into Electronic-Structure Codes',
        'event_type' => 'event',
        'start_date' => $ts('2027-02-17'),
        'end_date'   => $ts('2027-02-28'),
        'location'   => 'CECAM-HQ · EPFL Lausanne · Switzerland',
        'organizers' => 'M. Marques, Y. Pouillon, D. Strubbe',
        'summary'    => 'A two-week coding sprint on the Electronic Structure Library and its integration into community codes.',
        'body' => <<<MD
A focused two-week coding sprint on the **Electronic Structure Library** (ESL). Mornings: short status talks on individual modules. Afternoons: hands-on integration sessions into community codes — Abinit, Octopus, BigDFT, Siesta, and others.

By application; intended for code developers actively contributing to one of the participating electronic-structure projects.
MD,
    ],
    [
        'slug' => 'open-data-in-computational-chemistry',
        'title' => 'Open Data in Computational Chemistry: Standards, Repositories, Practice',
        'event_type' => 'event',
        'start_date' => $ts('2026-12-07'),
        'end_date'   => $ts('2026-12-09'),
        'location'   => 'CECAM-HQ · EPFL Lausanne · Switzerland',
        'organizers' => 'G. Henkelman, L. Hammerschmidt, S. Marini',
        'summary'    => 'A working meeting on data standards, repositories, and FAIR practice for computational chemistry.',
        'body' => <<<MD
A short working meeting on data standards, repositories, and FAIR practice for computational chemistry. The output is a community-authored document on minimum metadata for published simulation datasets.
MD,
    ],
];

// Events: publish_at must be in the past for listPublished() to accept them
// (CECAM events sit in the future by definition, so we shift them 30 years
// back for the "is-published" check while keeping their chronological order
// intact for the `publish_at ASC` sort).
$pubShift = 30 * 365 * 24 * 60 * 60;
foreach ($events as $ev) {
    $slug = $ev['slug'];
    $data = $ev;
    unset($data['slug']);
    $upsert('events', $slug, $data, $ev['start_date'] - $pubShift);
}

// ─── News (posts) ─────────────────────────────────────────────────────────
$news = [
    [
        'slug' => '2027-cecam-lorentz-workshop-selected',
        'title' => 'The 2027 CECAM-Lorentz workshop has been selected.',
        'excerpt' => 'Congratulations to Maximilian Ries, Sebastian Pfaller and Andrea Giuntoli: their proposal "Fracture of Amorphous Materials Across the Scales" is the 2027 CECAM-Lorentz workshop.',
        'thumbnail' => '/uploads/molecular-network.png',
        'author' => 'CECAM Headquarters',
        'publish_at' => $ts('2026-03-24'),
        'body' => <<<MD
Congratulations to **Maximilian Ries**, **Sebastian Pfaller** and **Andrea Giuntoli**: their proposal on the *Fracture of Amorphous Materials Across the Scales* has been selected for the 2027 CECAM-Lorentz workshop slot.

The workshop will take place at **CECAM-HQ, EPFL Lausanne on 12 – 16 April 2027**. The CECAM-Lorentz workshop is a joint format with the Lorentz Center in Leiden, awarded once per year to a proposal that demonstrates strong methodological depth and an opportunity to bring communities together that don't usually share a room.

This year's selection responds to a long-standing methodological gap: fracture in disordered solids spans bond breaking at the atomic scale, plastic-zone formation at the mesoscale, and crack-front dynamics at the macroscopic scale, with each community typically using different tools. The Ries / Pfaller / Giuntoli proposal is built explicitly around bridging those scales, with a programme that mixes atomistic and coarse-grained simulators, phase-field practitioners, and experimental fracture mechanics.

Five days, around thirty invited participants, hands-on discussion sessions, and the Lorentz format's signature mid-week "open day." Applications for the open participant track will be announced through the workshop page in the coming weeks.

[See the workshop page →](/program/fracture-of-amorphous-materials-across-the-scales)
MD,
    ],
    [
        'slug' => 'flagship-call-2027-2028-open',
        'title' => 'The 2027 – 2028 Flagship Call is open.',
        'excerpt' => 'Submissions are open until 17 July 2026 for the next two-year cycle of CECAM flagship workshops and schools.',
        'thumbnail' => '/uploads/protein-structure.png',
        'author' => 'CECAM Headquarters',
        'publish_at' => $ts('2026-02-10'),
        'body' => <<<MD
The **Flagship Call for the 2027 – 2028 CECAM program is now open.** Workshop and school proposals can be submitted through the central CECAM portal until **17 July 2026**.

A reminder on the format: the call funds five-day workshops (around 25 – 35 invited participants on a focused topic) and intensive week-long schools targeting PhD students and early postdocs. Selected events run at CECAM nodes across Europe, with central organisational support and a slot in the published program.

Proposals are reviewed by the Scientific Advisory Committee over August – October 2026, with selections announced in November.

[Read the full Flagship Call →](/flagship-call)
MD,
    ],
    [
        'slug' => 'mansigh-conversation-series-spring-program',
        'title' => 'Mansigh Conversation Series — spring 2026 program announced.',
        'excerpt' => 'Three online conversations on the culture of computational science, from open-source maintainership to the role of simulation in policy.',
        'author' => 'Mansigh Series',
        'publish_at' => $ts('2026-04-02'),
        'body' => <<<MD
The **Mary Ann Mansigh Conversation Series** returns for its spring 2026 program. Three online sessions, all free to attend, with short framing talks followed by extended audience conversation.

- **9 April** — *Maintaining the canon: what happens to a simulation code when its author retires?*
- **7 May** — *Simulation in public policy: what the EU climate model debate teaches the materials community.*
- **4 June** — *Authorship, attribution, and the very large workflow paper.*

Sessions are 90 minutes, online, and announced through the CECAM mailing list. Recordings are published openly.
MD,
    ],
    [
        'slug' => 'alder-prize-2026-laureate',
        'title' => 'The 2026 Berni J. Alder CECAM Prize has been awarded.',
        'excerpt' => 'For sustained contributions to enhanced-sampling methods and the development of community simulation infrastructure.',
        'author' => 'CECAM Headquarters',
        'publish_at' => $ts('2026-05-20'),
        'body' => <<<MD
The **2026 Berni J. Alder CECAM Prize** has been awarded for sustained contributions to enhanced-sampling methods and the development of community simulation infrastructure. The prize lecture will take place at the next CECAM-HQ open day in Lausanne, with details announced through the mailing list.

The Alder Prize, named for the pioneer of molecular dynamics, recognises exceptional contributions to the field of microscopic simulation of matter. The selection committee considered nominations from across the simulation community and across method areas.

[About the Alder Prize →](/activities/alder-prize)
MD,
    ],
];

foreach ($news as $n) {
    $slug = $n['slug'];
    $data = $n;
    unset($data['slug'], $data['publish_at']);
    // Clamp future news dates so listPublished() accepts them. Real publish
    // date sits in the entry data for display; the column stays past.
    $pub = $n['publish_at'] > $now ? $now - 86400 : $n['publish_at'];
    $upsert('posts', $slug, $data, $pub);
}

echo "\nSeed complete.\n";
