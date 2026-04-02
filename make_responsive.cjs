const fs = require('fs');
const path = require('path');

const pagesDir = path.resolve('resources/views/pages');

// ─── SHARED MOBILE CSS BLOCKS ────────────────────────────────────────────────

const FOOTER_MOBILE = `
        /* ═══ SHARED FOOTER MOBILE ═══ */
        @media (max-width: 992px) {
            .footer-container {
                flex-direction: column !important;
                align-items: center !important;
                text-align: center !important;
                flex-wrap: wrap !important;
                gap: 30px;
            }
            .footer-links { margin-left: 0 !important; margin-top: 10px; }
            .footer-newsletter form { flex-direction: column; border-radius: 20px; }
            .foot-social-icon { justify-content: center; }
            .footer-newsletter button { width: 100%; border-radius: 12px; }
            .footer-brand, .footer-links, .footer-contact, .footer-newsletter { width: 100%; max-width: 500px; }
        }
`;

// ─── PAGE-SPECIFIC CSS ────────────────────────────────────────────────────────

const PAGE_CSS = {

    'contact.blade.php': `
        @media (max-width: 992px) {
            .contact-hero { height: 220px; border-radius: 10px; }
            .contact-hero h2 { font-size: 2.2rem; }
            .contact-row { flex-direction: column; min-height: auto; }
            .contact-form { margin-left: 0 !important; max-width: 100% !important; width: 100%; }
            .contact-map { margin-right: 0 !important; width: 100%; }
            .contact-map .card { height: 350px; }
            .contact-info { flex-direction: column; align-items: center; gap: 20px; margin-top: 30px; }
            .contact-info .info-card { width: 90%; max-width: 400px; }
        }
        @media (max-width: 576px) {
            .contact-hero h2 { font-size: 1.7rem; }
            .contact-form .card { padding: 20px 15px; }
            .contact-form input, .contact-form textarea { width: 100%; box-sizing: border-box; }
        }
    `,

    'sponsor-partner.blade.php': `
        @media (max-width: 992px) {
            .partner-grid-container { grid-template-columns: 1fr; }
            .partner-hero { padding: 120px 15px 30px; }
            .partner-hero-title { font-size: 2rem; }
            .partner-hero-desc { font-size: 1rem; }
            .form-container { padding: 30px 20px; }
            .sponsor-section { padding: 60px 15px 40px; }
        }
        @media (max-width: 576px) {
            .partner-hero-title { font-size: 1.5rem; }
            .form-container { padding: 20px 15px; }
            .row { flex-direction: column; }
            .col-md-6 { width: 100% !important; flex: 0 0 100% !important; }
            .btn-gradient { padding: 12px; font-size: 1rem; }
        }
    `,

    'detailed-partner.blade.php': `
        @media (max-width: 992px) {
            .dp-hero { padding: 120px 15px 40px; }
            .dp-hero-title, h1 { font-size: 2rem !important; }
            .dp-grid, .tiers-grid { grid-template-columns: 1fr !important; }
            .dp-content { padding: 0 15px; }
        }
        @media (max-width: 576px) {
            h1 { font-size: 1.5rem !important; }
            h2 { font-size: 1.3rem !important; }
            section { padding: 40px 12px; }
        }
    `,

    'agenda.blade.php': `
        @media (max-width: 768px) {
            .agenda-section { padding-top: 90px; padding-left: 10px; padding-right: 10px; }
            .agenda-header { flex-direction: column; align-items: flex-start; gap: 14px; }
            .agenda-title-row h2 { font-size: 1rem; }
            .document-wrapper iframe { height: 500px; }
            .btn-download { width: 100%; justify-content: center; }
        }
        @media (max-width: 480px) {
            .document-wrapper iframe { height: 380px; }
        }
    `,

    'ubora-challenge.blade.php': `
        @media (max-width: 992px) {
            .ubora-hero, .challenge-hero { padding: 120px 15px 40px; }
            .ubora-hero h1, .challenge-hero h1 { font-size: 2rem !important; }
            .ubora-grid, .challenge-grid, .prizes-grid { grid-template-columns: 1fr !important; }
            .timeline { padding: 0 10px; }
        }
        @media (max-width: 576px) {
            .ubora-hero h1, .challenge-hero h1 { font-size: 1.4rem !important; }
            .ubora-hero p, .challenge-hero p { font-size: 1rem; }
            section { padding: 40px 12px; }
        }
    `,

    'register.blade.php': `
        @media (max-width: 992px) {
            .ticket-grid, .tickets-grid { grid-template-columns: 1fr !important; }
            .register-hero { padding: 120px 15px 40px; }
            .register-hero h1 { font-size: 2rem !important; }
            .modal-content { padding: 20px 15px !important; margin: 10px; max-height: 90vh; overflow-y: auto; }
        }
        @media (max-width: 576px) {
            .register-hero h1 { font-size: 1.5rem !important; }
            .ticket-card { padding: 20px 15px !important; }
            .attendee-box { padding: 15px !important; }
            .attendee-box input { width: 100%; box-sizing: border-box; }
        }
    `,

    'past-event-1.blade.php': `
        @media (max-width: 992px) {
            .events-grid, .gallery-grid, .speakers-grid { grid-template-columns: 1fr 1fr !important; }
            .event-hero { padding: 120px 15px 40px; }
            .event-hero h1 { font-size: 2rem !important; }
        }
        @media (max-width: 576px) {
            .events-grid, .gallery-grid, .speakers-grid { grid-template-columns: 1fr !important; }
            .event-hero h1 { font-size: 1.5rem !important; }
            section { padding: 40px 12px; }
        }
    `,

    'past-event-2.blade.php': `
        @media (max-width: 992px) {
            .events-grid, .gallery-grid, .speakers-grid { grid-template-columns: 1fr 1fr !important; }
            .event-hero { padding: 120px 15px 40px; }
            .event-hero h1 { font-size: 2rem !important; }
        }
        @media (max-width: 576px) {
            .events-grid, .gallery-grid, .speakers-grid { grid-template-columns: 1fr !important; }
            .event-hero h1 { font-size: 1.5rem !important; }
            section { padding: 40px 12px; }
        }
    `,

    'about.blade.php': `
        @media (max-width: 992px) {
            .about-hero { padding: 120px 15px 40px; }
            .about-hero h1 { font-size: 2rem !important; }
            .stats-grid, .team-grid, .values-grid { grid-template-columns: 1fr 1fr !important; }
            .about-layout { flex-direction: column !important; }
        }
        @media (max-width: 576px) {
            .about-hero h1 { font-size: 1.5rem !important; }
            .stats-grid, .team-grid, .values-grid { grid-template-columns: 1fr !important; }
            section { padding: 40px 12px; }
        }
    `,

    'what-to-expect.blade.php': `
        @media (max-width: 992px) {
            .expect-hero { padding: 120px 15px 40px; }
            .expect-hero h1 { font-size: 2rem !important; }
            .cards-grid, .expect-grid { grid-template-columns: 1fr 1fr !important; }
        }
        @media (max-width: 576px) {
            .expect-hero h1 { font-size: 1.5rem !important; }
            .cards-grid, .expect-grid { grid-template-columns: 1fr !important; }
            section { padding: 40px 12px; }
        }
    `,
};

// ─── INJECT INTO EACH PAGE ───────────────────────────────────────────────────

const targetPages = Object.keys(PAGE_CSS);

targetPages.forEach(filename => {
    const filepath = path.join(pagesDir, filename);
    if (!fs.existsSync(filepath)) {
        console.log('SKIP (not found): ' + filename);
        return;
    }

    let content = fs.readFileSync(filepath, 'utf8');

    const cssToAdd = FOOTER_MOBILE + PAGE_CSS[filename];

    // Inject just before </style> (first closing style tag after main style block)
    const styleCloseTag = '</style>';
    const idx = content.indexOf(styleCloseTag);
    if (idx === -1) {
        console.log('SKIP (no </style>): ' + filename);
        return;
    }

    // Check if already injected
    if (content.includes('SHARED FOOTER MOBILE')) {
        console.log('ALREADY DONE: ' + filename);
        return;
    }

    content = content.slice(0, idx) + cssToAdd + '\n    ' + content.slice(idx);
    fs.writeFileSync(filepath, content);
    console.log('Updated: ' + filename);
});

console.log('\nDone! All pages updated.');
