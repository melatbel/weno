<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >
    
    <title>
        Contact | Wennovate Africa
    </title>
    
    <link 
        rel="preconnect" 
        href="https://fonts.googleapis.com"
    >
    <link 
        rel="preconnect" 
        href="https://fonts.gstatic.com" 
        crossorigin
    >
    
    <link 
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" 
        rel="stylesheet"
    >
    
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >
    


    <style>
        /**
         * ============================================================
         * 1. DESIGN TOKENS & VARIABLES
         * ============================================================
         */
        :root {
            --primary: #6a0dad;
            --secondary: #FFD700;
            --dark: #0a0f3f;
            --soft-bg: #f8fafc;
            --text-main: #1e293b;
            --ease-in-out-cubic: cubic-bezier(0.65, 0, 0.35, 1);
            --nav-bg: linear-gradient(135deg, #0a0f3f, #000);
            --transition-smooth: 0.4s all var(--ease-in-out-cubic);
            --success-color: #22c55e;
            --error-color: #ef4444;
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 1.5rem;
        }

        /**
         * ============================================================
         * 2. RESET & GLOBAL STYLES
         * ============================================================
         */
        body { 
            font-family: 'Inter', sans-serif; 
            background: #f4f5f7; 
            margin: 0; 
            padding: 0; 
            color: var(--text-main);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /**
         * ============================================================
         * FORM GRID SYSTEM (Bootstrap-like structure for form boxes)
         * ============================================================
         * Added to ensure the form is responsive across desktop, tablet,
         * and mobile without changing the actual form HTML elements.
         */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .row > * {
            box-sizing: border-box;
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }

        .g-3 {
            --bs-gutter-x: 1rem;
            --bs-gutter-y: 1rem;
        }

        @media (min-width: 768px) {
            .col-md-6 {
                flex: 0 0 auto;
                width: 50%;
            }
        }

        /**
         * ============================================================
         * 3. DESKTOP NAVBAR 
         * ============================================================
         */
        header#topnav {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            padding: 10px 0;
            transition: var(--transition-smooth);
            background: #ffffff;
        }

        header#topnav.scrolled {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 5px 0;
        }

        header#topnav .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
        }

        @media (min-width: 993px) {
            header#topnav .logo {
                position: relative;
                left: -150px;
            }
        
            .navigation-container {
                position: absolute;
                left: 0;
                right: 0;
                display: flex;
                justify-content: center;
                pointer-events: none;
            }
            .navigation-menu {
                display: flex;
                justify-content: center;
                align-items: center;
                list-style: none;
                gap: 35px;
                margin: 0;
                padding: 0;
                pointer-events: auto;
            }
            .mobile-nav-header, 
            .mobile-nav-footer, 
            .mobile-bg-shape,
            #particle-canvas { 
                display: none !important; 
            }
            /* Hide mobile toggle components */
            .hamburger {
                display: none !important;
            }
        }

        .navigation-menu li a {
            color: #000000;
            font-size: 1.2rem;
            font-weight: 800;
            text-decoration: none;
            padding: 10px 8px;
            position: relative;
            transition: color 0.3s;
        }


        
        .navigation-menu li a:hover { 
            color: #FFD700; 
        }

        /* ============================================================= */
        /* REGISTER BUTTONS (Desktop and Mobile)                         */
        /* ============================================================= */

        .btn-register-navbar,
        .btn-register-mobile {
            background: linear-gradient(135deg, #6a0dad, #FFD700);
            color: #fff;
            font-weight: 600;
            padding: 12px 25px;
            font-size: 1.1rem;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .btn-register-navbar:hover,
        .btn-register-mobile:hover {
            transform: scale(1.15) translateY(-3px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.3);
            color: #fff;
        }

        /* Specific Mobile Register Button Adjustments */
        .btn-register-mobile {
            display: inline-block;
            margin-bottom: 25px;
            padding: 14px 35px;
            font-size: 1.25rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        /**
         * ============================================================
         * 4. MOBILE NAVIGATION (GLASSMORPHIC SYSTEM)
         * ============================================================
         */
        @media (max-width: 992px) {
            
            /* Hide Desktop Elements on Mobile */
            .btn-register-navbar {
                display: none !important;
            }

            .hamburger {
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                z-index: 2000;
                position: relative;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: rgba(0, 0, 0, 0.05);
                border: 1px solid rgba(0,0,0,0.1);
                transition: all 0.3s var(--ease-in-out-cubic);
            }

            .hamburger-box { 
                width: 24px; 
                height: 18px; 
                position: relative; 
            }

            .h-line {
                display: block; 
                width: 100%; 
                height: 2px;
                background: #000000; 
                border-radius: 4px; 
                position: absolute;
                transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            }

            .line-top { 
                top: 0; 
            }
            .line-mid { 
                top: 50%; 
                transform: translateY(-50%); 
            }
            .line-bot { 
                bottom: 0; 
            }

            .hamburger.active .line-top { 
                top: 50%; 
                transform: translateY(-50%) rotate(45deg); 
                background: var(--secondary); 
            }
            .hamburger.active .line-mid { 
                opacity: 0; 
                transform: translateX(-10px); 
            }
            .hamburger.active .line-bot { 
                bottom: 50%; 
                transform: translateY(50%) rotate(-45deg); 
                background: var(--secondary); 
            }

            .navigation-container {
                position: fixed; 
                top: 0; 
                right: 0; 
                width: 100%; 
                height: 100vh;
                background: radial-gradient(circle at top right, #1a0b2e 0%, #000000 100%);
                z-index: 1500; 
                display: flex; 
                flex-direction: column;
                justify-content: center; 
                align-items: center; 
                padding: 40px;
                opacity: 0; 
                visibility: hidden; 
                clip-path: circle(0% at 90% 5%);
                transition: all 0.8s var(--ease-in-out-cubic); 
                pointer-events: none;
            }

            .navigation-container.show {
                opacity: 1; 
                visibility: visible; 
                clip-path: circle(150% at 90% 5%); 
                pointer-events: auto;
            }

            #particle-canvas { 
                position: absolute; 
                top: 0; 
                left: 0; 
                width: 100%; 
                height: 100%; 
                z-index: -1; 
                pointer-events: none; 
            }

            .navigation-menu { 
                flex-direction: column; 
                gap: 12px; 
                width: 100%; 
                text-align: center; 
                z-index: 2; 
                padding: 0;
                list-style: none;
            }

            .navigation-menu li { 
                opacity: 0; 
                transform: translateY(30px); 
                transition: all 0.5s var(--ease-in-out-cubic); 
            }

            .navigation-container.show .navigation-menu li {
                opacity: 1; 
                transform: translateY(0); 
                transition-delay: calc(0.1s + (var(--i) * 0.08s));
            }

            .navigation-menu li a { 
                font-size: 1.35rem; 
                font-weight: 700; 
                color: rgba(255, 255, 255, 0.8); 
                padding: 12px 20px; 
                display: inline-block; 
                text-decoration: none;
            }

            .navigation-menu li a:hover { 
                color: #fff; 
                transform: scale(1.05); 
            }

            .mobile-nav-footer { 
                margin-top: 40px; 
                text-align: center; 
                opacity: 0; 
                transform: translateY(20px); 
                transition: 0.5s ease 0.6s; 
                z-index: 2; 
            }

            .navigation-container.show .mobile-nav-footer { 
                opacity: 1; 
                transform: translateY(0); 
            }

            .mob-socials { 
                display: flex; 
                justify-content: center; 
                gap: 20px; 
                margin-top: 15px; 
            }

            .mob-socials a {
                width: 45px; 
                height: 45px; 
                border-radius: 50%;
                background: rgba(255,255,255,0.05); 
                display: flex;
                align-items: center; 
                justify-content: center; 
                color: #fff;
                transition: 0.3s; 
                border: 1px solid rgba(255,255,255,0.1);
                text-decoration: none;
                font-size: 1.2rem;
            }

            .mob-socials a:hover, 
            .mob-socials a:active {
                background: var(--secondary);
                color: var(--dark);
                box-shadow: 0 0 15px var(--secondary);
                transform: translateY(-5px);
            }
        }

/* ================= CONTACT HERO ================= */
.contact-hero {
    background: url('{{ asset('images/contact-detail.jpg') }}') center center/cover no-repeat;
    height: 400px;
    position: relative;
    border-radius: 16px;
    margin-bottom: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.contact-hero .overlay {
    position: absolute;
    top:0; left:0; right:0; bottom:0;
    background: none;
    border-radius: 16px;
    z-index:1;
}
.contact-hero h2 {
    position: relative;
    z-index:2;
    font-size: 4rem;
    font-family: 'Inter', sans-serif;
    font-weight: 800;
    text-align: center;
    color: #000000;
    opacity: 0;
    transform: translateY(-20px);
    letter-spacing: 1px;
    animation: fadeInUp 1s forwards;
}
.contact-hero h2::after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: #6a0dad;
    margin: 12px auto 0;
    border-radius: 2px;
}
@keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

/* ================= FORM + MAP ================= */
.contact-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
    margin-bottom: 50px;
    align-items: stretch;
    min-height: 600px;
}
.contact-form {
    flex: 1 1 380px;
    max-width: 420px;
    margin-left: 200px;
    display: flex;
}
.contact-map {
    flex: 2 1 650px;
    margin-right: 50px;
}

/* FORM CARD */
.contact-form .card {
    border-radius: 16px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    padding: 35px 25px;
    background: none;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    transition: transform 0.3s, box-shadow 0.3s;
}
.contact-form .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 18px 35px rgba(0,0,0,0.18);
}
.contact-form h4 {
    font-size: 26px;
    font-weight: 900; 
    color: #000000;
    margin-bottom: 25px;
    letter-spacing: 1px;
    position: relative;
    text-shadow: 1px 0 rgba(0,0,0,0.15), 0 1px rgba(0,0,0,0.15), 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
}
.contact-form h4::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: #6a0dad;
    margin-top: 6px;
    border-radius: 2px;
}

/* INPUTS */
.contact-form input,
.contact-form textarea {
    width: 95%;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 14px 12px;
    font-size: 14px;
    margin-bottom: 16px;
    background: #fff;
    transition: all 0.3s;
}
.contact-form textarea {
    min-height: 180px;   /* increase height */
    resize: vertical;    /* allow user to resize */
}
.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #6a0dad;
    box-shadow: 0 0 10px rgba(106,13,173,0.2);
    outline: none;
}

/* BUTTON */
.btn-gradient {
    background: linear-gradient(135deg, #FFD700, #6a0dad);
    color: #fff;
    border: none;
    font-weight: 600;
    font-size: 15px;
    padding: 14px;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
    margin-top: 10px;
}
.btn-gradient:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 10px 25px rgba(106,13,173,0.35);
    background: linear-gradient(135deg, #6a0dad, #FFD700);
}

/* MAP */
.contact-map .card {
    border-radius: 16px;
    padding: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    height: 100%;
}
.contact-map iframe {
    width: 100%;
    height: 100%;
    border-radius: 16px;
    border:0;
}

/* CONTACT INFO */
.contact-info {
    display: flex;
    flex-wrap: wrap;
    gap: 160px;
    justify-content: center;
    margin-top: 80px;
    margin-bottom: 50px;
}
.contact-info .info-card {
    flex: 0 1 280px;
    text-align: center;
    padding: 25px 15px;
    border-radius: 16px;
    background: #f8f9fa;
    box-shadow: 0 6px 15px rgba(0,0,0,0.05);
    transition: all 0.3s;
}
.contact-info .info-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    background: linear-gradient(135deg, #FFD700, #6a0dad);
    color: #fff;
}
.contact-info .info-card i {
    font-size: 48px;
    color: #007bff;
    margin-bottom: 12px;
}
.contact-info .info-card:hover i { color: #fff; }
.contact-info .info-card h5 { font-weight: 700; margin-bottom: 10px; font-size: 20px; }
.contact-info .info-card p { font-size: 18px; color: #555; }
.contact-info .info-card a {
    display: block;
    margin-top: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 17px;
    color: #007bff;
}
.contact-info .info-card:hover p,
.contact-info .info-card:hover a { color: #fff; }
.contact-info .info-card a:hover { text-decoration: underline; }

/* RESPONSIVE */
@media (max-width: 992px) {
    .contact-row { flex-direction: column; min-height: auto; }
    .contact-form { margin-left: 0; max-width: 100%; }
    .contact-map { margin-right: 0; width: 100%; }
    .contact-hero h2 { font-size: 3rem; }
}

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
    
    </style>

<!-- ================= HERO SECTION ================= -->
<section class="contact-hero">
    <div class="overlay"></div>
    <h2>Contact Us</h2>
</section>

<!-- ================= FORM + MAP ================= -->
<div class="container">
    <div class="contact-row">
        <!-- Contact Form -->
        <div class="contact-form">
            <div class="card">
                <h4 class="mb-4">Contact Us</h4>
             <form id="contactForm">
    <input type="hidden" id="contact_nonce" value="{{ csrf_token() }}">
    <input type="hidden" id="contact_ajaxurl" value="{{ url('/api/contact') }}">
    <div class="form-group">
        <input type="text" id="c_name" placeholder="Your Name *" required pattern="[A-Za-z\s]+" title="Please enter only letters and spaces" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
    </div>
    <div class="form-group">
        <input type="email" id="c_email" placeholder="Your Email *" required pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address (e.g., name@domain.com)" onblur="verifyContactEmail(this)">
        <div id="c_email_error" style="color:#ef4444;font-size:0.85rem;margin-top:4px;display:none;font-weight:600;text-align:left;">Please enter a valid email containing '@' and a domain ending (e.g. .com).</div>
    </div>
    <div class="form-group">
        <input type="text" id="c_subject" placeholder="Subject *" required pattern="[A-Za-z\s]+" title="Subject should only contain letters and spaces (no numbers)" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
    </div>
    <div class="form-group">
        <textarea id="c_message" placeholder="Write your message..." required></textarea>
    </div>
    <div id="form-feedback" style="display:none; padding: 12px 16px; border-radius: 8px; margin-bottom: 12px; font-weight: 600; font-size: 14px;"></div>
    <button type="submit" class="btn btn-gradient w-100">Send Message</button>
</form>
            </div>
        </div>

        <!-- Map -->
        <div class="contact-map">
            <div class="card">
                <iframe src="https://www.google.com/maps?q=Bole,+Gazebo+roundabout,+Rizq+building,+9th+floor,+Addis+Ababa,+Ethiopia&output=embed"></iframe>
            </div>
        </div>
    </div>

    <!-- ================= CONTACT INFO ================= -->
    <div class="contact-info">
        <div class="info-card">
            <i class="fas fa-phone"></i>
            <h5>Phone</h5>
            <p>Start working with us that can provide everything</p>
            <a href="tel:+251911234567">+251 911 234 567</a>
        </div>
        <div class="info-card">
            <i class="fas fa-envelope"></i>
            <h5>Email</h5>
            <p>Reach out to us anytime</p>
            <a href="mailto:contact@example.com">contact@example.com</a>
        </div>
        <div class="info-card">
            <i class="fas fa-map-marker-alt"></i>
            <h5>Location</h5>
            <p>Bole, by Gazebo roundabout, Rizq building, 9th floor,<br>Addis Ababa, Ethiopia</p>
            <a href="https://www.google.com/maps?q=Bole,+Gazebo+roundabout,+Rizq+building,+9th+floor,+Addis+Ababa,+Ethiopia">View on Map</a>
        </div>
    </div>
</div>

<style>
    /* ================= ULTRA-ADVANCED SINGLE ROW FOOTER (UNCHANGED) ================= */
    .footer {
            background: #050510;
        color: #fff;
        padding: 60px 20px 30px 20px;
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow: hidden;
        font-size: 1.1rem;
    }
    .footer::after {
        content: '';
        position: absolute;
        top: -50px;
        left: 0;
        width: 200%;
        height: 150px;
        background: linear-gradient(90deg, #0f172a, #1E3A8A, #2563EB, #0f172a);
        opacity: 0.1;
        border-radius: 50%;
        animation: wave 12s ease-in-out infinite;
        transform: rotate(0deg);
        z-index: 1;
    }
    @keyframes wave { 0%,100% { transform: translateX(-25%) translateY(0) rotate(0deg); } 50% { transform: translateX(25%) translateY(10px) rotate(3deg); } }
    .footer::before {
        content: '';
        position: absolute;
        width: 300%;
        height: 300%;
        background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%);
        top: -100%;
        left: -100%;
        transform: rotate(45deg);
        animation: floatGlow 20s linear infinite;
        pointer-events: none;
        z-index: 0;
    }
    @keyframes floatGlow { 0% { transform: translate(0,0) rotate(45deg); } 50% { transform: translate(50px,50px) rotate(45deg); } 100% { transform: translate(0,0) rotate(45deg); } }
    .footer-container {
        max-width: 1400px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        gap: 40px;
        align-items: flex-start;
        position: relative;
        z-index: 2;
        flex-wrap: nowrap;
    }
    .footer-brand { flex: 1; min-width: 220px; }
    .footer-logo {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        line-height: 1.2;
        /* removed text shadow */
        animation: glowText 3s ease-in-out infinite alternate;
    }
    /* text shadow removed for transparent gradient */ 100% { text-shadow: 0 0 30px rgba(59,130,246,1), 0 0 60px rgba(59,130,246,0.6); } }
    .footer-links { flex: 1; margin-left: 100px; }
    .footer-links h4 { font-size: 1.5rem; margin-bottom: 15px; background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .foot-links { list-style: none; padding: 0; }
    .foot-links li { margin-bottom: 12px; }
    .foot-links li a { color: #fff; opacity: 0.9; text-decoration: none; font-size: 1.15rem; position: relative; transition: all 0.3s ease; }
    .foot-links li a::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -2px; left: 0; background: linear-gradient(90deg, #6a0dad, #FFD700); transition: width 0.3s ease; }
    .foot-links li a:hover::after { width: 100%; }
    .foot-links li a:hover { color: #ffffff; opacity: 1; }
    .footer-contact { flex: 1; }
    .footer-contact h4 { font-size: 1.5rem; margin-bottom: 15px; background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .foot-contact { list-style: none; padding: 0; }
    .foot-contact li { margin-bottom: 12px; }
    .foot-contact li a { color: #fff; font-size: 1.15rem; opacity: 0.9; text-decoration: none; position: relative; transition: all 0.3s ease; }
    .foot-contact li a::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -2px; left: 0; background: linear-gradient(90deg, #6a0dad, #FFD700); transition: width 0.3s ease; }
    .foot-contact li a:hover::after { width: 100%; }
    .foot-contact li a:hover { color: #ffffff; opacity: 1; }
    .footer-newsletter { flex: 1; }
    .footer-newsletter h4 { font-size: 1.5rem; margin-bottom: 15px; background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .footer-newsletter p { font-size: 1.15rem; margin-bottom: 20px; opacity: 0.9; }
    .footer-newsletter form { display: flex; gap: 10px; background: rgba(255,255,255,0.05); padding: 12px; border-radius: 40px; }
    .footer-newsletter input[type="email"] { padding: 14px 18px; border-radius: 30px; border: none; flex: 1; outline: none; font-size: 1.15rem; background: rgba(255,255,255,0.1); color: #fff; transition: all 0.3s ease; }
    .footer-newsletter input[type="email"]::placeholder { color: rgba(255,255,255,0.7); }
    .footer-newsletter input[type="email"]:focus { background: rgba(255,255,255,0.15); box-shadow: 0 0 18px rgba(59,130,246,0.9); }
    .footer-newsletter button { padding: 14px 28px; border-radius: 30px; border: none; background: linear-gradient(90deg, #6a0dad, #FFD700); color: #fff; font-weight: 600; font-size: 1.15rem; cursor: pointer; transition: all 0.3s ease; }
    .footer-newsletter button:hover { background: linear-gradient(90deg, #6a0dad, #FFD700); transform: translateY(-2px) scale(1.05); box-shadow: 0 5px 20px rgba(37,99,235,0.5); }
    .footer-bottom { text-align: center; padding-top: 40px; border-top: 1px solid rgba(255,255,255,0.1); opacity: 0.9; font-size: 1.05rem; }
    .foot-social-icon { list-style: none; display: flex; padding: 0; gap: 20px; margin-top: 25px; }
    .foot-social-icon li a { display: inline-flex; align-items: center; justify-content: center; width: 55px; height: 55px; border-radius: 50%; color: #fff; background: #1E3A8A; font-size: 1.4rem; box-shadow: 0 0 18px rgba(59,130,246,0.3); transition: all 0.3s ease; position: relative; overflow: hidden; }
    .foot-social-icon li a::after { content: ''; position: absolute; width: 100%; height: 100%; border-radius: 50%; background: rgba(59,130,246,0.2); transform: scale(0); transition: all 0.4s ease; z-index: 0; }
    .foot-social-icon li a:hover::after { transform: scale(1.5); opacity: 0; }
    .foot-social-icon li a:hover { transform: scale(1.3) rotate(15deg); background: #3B82F6; color: #000; box-shadow: 0 0 30px rgba(59,130,246,0.8); }
    @media (max-width: 1100px) {
        .footer-container {
            flex-wrap: wrap;
            justify-content: center;
        }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter {
            flex: 1 1 calc(50% - 40px);
            min-width: 220px;
        }
        .footer-links { margin-left: 0 !important; }
    }
    @media (max-width: 600px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
        }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter {
            flex: 1 1 100%;
            width: 100%;
            max-width: 500px;
        }
    }
    </style>

<style>
        /**
         * ============================================================
         * 1. DESIGN TOKENS & VARIABLES
         * ============================================================
         */
        :root {
            --primary: #6a0dad;
            --secondary: #FFD700;
            --dark: #0a0f3f;
            --soft-bg: #f8fafc;
            --text-main: #1e293b;
            --ease-in-out-cubic: cubic-bezier(0.65, 0, 0.35, 1);
            --nav-bg: linear-gradient(135deg, #0a0f3f, #000);
            --transition-smooth: 0.4s all var(--ease-in-out-cubic);
        }

        /**
         * ============================================================
         * 2. RESET & BASE
         * ============================================================
         */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #f0f4ff, #e6f0ff);
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /**
         * ============================================================
         * 3. DESKTOP NAVBAR
         * ============================================================
         */
        header#topnav {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            padding: 10px 0;
            transition: var(--transition-smooth);
            background: #ffffff;
        }

        header#topnav.scrolled {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 5px 0;
        }

        header#topnav .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
        }

        @media (min-width: 993px) {
            header#topnav .logo {
                position: relative;
                z-index: 10;
            }

            .navigation-container {
                position: absolute;
                left: 0;
                right: 0;
                display: flex;
                justify-content: center;
                pointer-events: none;
            }

            .navigation-menu {
                display: flex;
                justify-content: center;
                align-items: center;
                list-style: none;
                gap: 35px;
                margin: 0;
                padding: 0;
                pointer-events: auto;
            }

            .mobile-nav-header,
            .mobile-nav-footer,
            .mobile-bg-shape,
            #particle-canvas {
                display: none !important;
            }

            /* Hide hamburger on desktop */
            .hamburger {
                display: none !important;
            }
        }

        .navigation-menu li a {
            color: #000000;
            font-family: 'Inter', sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            text-decoration: none;
            padding: 10px 8px;
            position: relative;
            transition: color 0.3s;
        }

        .navigation-menu li a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #FFD700;
            position: absolute;
            bottom: 0;
            left: 0;
            transition: width 0.3s;
        }

        .navigation-menu li a:hover::after,
        .navigation-menu li a.active::after {
            width: 100%;
        }

        .navigation-menu li a:hover {
            color: #FFD700;
        }

        /* ============================================================= */
        /* REGISTER BUTTONS (Desktop and Mobile)                         */
        /* ============================================================= */

        .btn-register-navbar,
        .btn-register-mobile {
            background: linear-gradient(135deg, #6a0dad, #FFD700);
            color: #fff;
            font-weight: 600;
            padding: 12px 25px;
            font-size: 1.1rem;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .btn-register-navbar:hover,
        .btn-register-mobile:hover {
            transform: scale(1.15) translateY(-3px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.3);
            color: #fff;
        }

        .btn-register-mobile {
            display: inline-block;
            margin-bottom: 25px;
            padding: 14px 35px;
            font-size: 1.25rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        /**
         * ============================================================
         * 4. MOBILE NAVIGATION (GLASSMORPHIC SYSTEM)
         * ============================================================
         */
        @media (max-width: 992px) {

            .btn-register-navbar {
                display: none !important;
            }

            .hamburger {
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                z-index: 2000;
                position: relative;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: rgba(0, 0, 0, 0.05);
                border: 1px solid rgba(0,0,0,0.1);
                transition: all 0.3s var(--ease-in-out-cubic);
            }

            .hamburger-box {
                width: 24px;
                height: 18px;
                position: relative;
            }

            .h-line {
                display: block;
                width: 100%;
                height: 2px;
                background: #000000;
                border-radius: 4px;
                position: absolute;
                transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            }

            .line-top { top: 0; }
            .line-mid { top: 50%; transform: translateY(-50%); }
            .line-bot { bottom: 0; }

            .hamburger.active .line-top {
                top: 50%;
                transform: translateY(-50%) rotate(45deg);
                background: var(--secondary);
            }
            .hamburger.active .line-mid {
                opacity: 0;
                transform: translateX(-10px);
            }
            .hamburger.active .line-bot {
                bottom: 50%;
                transform: translateY(50%) rotate(-45deg);
                background: var(--secondary);
            }

            .navigation-container {
                position: fixed;
                top: 0;
                right: 0;
                width: 100%;
                height: 100vh;
                background: radial-gradient(circle at top right, #1a0b2e 0%, #000000 100%);
                z-index: 1500;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 40px;
                opacity: 0;
                visibility: hidden;
                clip-path: circle(0% at 90% 5%);
                transition: all 0.8s var(--ease-in-out-cubic);
                pointer-events: none;
            }

            .navigation-container.show {
                opacity: 1;
                visibility: visible;
                clip-path: circle(150% at 90% 5%);
                pointer-events: auto;
            }

            #particle-canvas {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                pointer-events: none;
            }

            .navigation-menu {
                flex-direction: column;
                gap: 12px;
                width: 100%;
                text-align: center;
                z-index: 2;
                padding: 0;
                list-style: none;
            }

            .navigation-menu li {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.5s var(--ease-in-out-cubic);
            }

            .navigation-container.show .navigation-menu li {
                opacity: 1;
                transform: translateY(0);
                transition-delay: calc(0.1s + (var(--i) * 0.08s));
            }

            .navigation-menu li a {
                font-size: 1.35rem;
                font-weight: 700;
                color: rgba(255, 255, 255, 0.8);
                padding: 12px 20px;
                display: inline-block;
                text-decoration: none;
            }

            .navigation-menu li a:hover {
                color: #fff;
                transform: scale(1.05);
            }

            .mobile-nav-footer {
                margin-top: 40px;
                text-align: center;
                opacity: 0;
                transform: translateY(20px);
                transition: 0.5s ease 0.6s;
                z-index: 2;
            }

            .navigation-container.show .mobile-nav-footer {
                opacity: 1;
                transform: translateY(0);
            }

            .mob-socials {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-top: 15px;
            }

            .mob-socials a {
                width: 45px;
                height: 45px;
                border-radius: 50%;
                background: rgba(255,255,255,0.05);
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                transition: 0.3s;
                border: 1px solid rgba(255,255,255,0.1);
                text-decoration: none;
                font-size: 1.2rem;
            }

            .mob-socials a:hover,
            .mob-socials a:active {
                background: var(--secondary);
                color: var(--dark);
                box-shadow: 0 0 15px var(--secondary);
                transform: translateY(-5px);
            }
        }
    </style>
</head>
<body class="contact-page">

<!-- ================= HEADER / NAVBAR ================= -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">

        <a class="logo" href="{{ url('/') }}">
            <img
                src="{{ asset('images/wennovate-logo.jpg') }}"
                alt="Wennovate Logo"
                style="height:50px; width:auto;"
            >
        </a>

        <nav id="navigation" class="navigation-container">
            <canvas id="particle-canvas"></canvas>

            <ul class="navigation-menu">
                <li style="--i:1;"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li style="--i:2;"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                    <li style="--i:1.5;"><a href="{{ url('/agenda') }}" class="nav-link">Program</a></li>
                <li style="--i:3;"><a href="{{ url('/what-to-expect') }}" class="nav-link">What to Expect</a></li>
                <li style="--i:4;"><a href="{{ url('/ubora-challenge') }}" class="nav-link">Ubora Challenge</a></li>
                <li style="--i:5;"><a href="{{ url('/contact') }}" class="nav-link active">Contact</a></li>
            </ul>

            <div class="mobile-nav-footer">
                <a href="{{ url('/register') }}" class="btn-register-mobile">Register</a>
                <p style="color:var(--secondary); font-size:0.8rem; letter-spacing:2px; text-transform:uppercase; font-weight:700;">
                    Secure Your Spot
                </p>
                <div class="mob-socials">
                    <a href="https://www.facebook.com/share/14aF1GGHqLB/"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/wennovate.africa?igsh=NHg2bjJ0N3hod2oy"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </nav>

        <a href="{{ url('/register') }}" class="btn-register-navbar">Register</a>

        <div class="hamburger" id="hamburger">
            <div class="hamburger-box">
                <span class="h-line line-top"></span>
                <span class="h-line line-mid"></span>
                <span class="h-line line-bot"></span>
            </div>
        </div>

    </div>
</header>
<!-- ================= ULTRA-ADVANCED SINGLE ROW FOOTER ================= -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-brand">
            <span class="footer-logo">Wennovate Africa<br>Summit 2026</span>
            <ul class="foot-social-icon">
                <li><a href="https://www.facebook.com/share/14aF1GGHqLB/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="https://www.instagram.com/wennovate.africa?igsh=NHg2bjJ0N3hod2oy"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul class="foot-links">
                    <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                    <li><a href="{{ url('/agenda') }}" class="nav-link">Program</a></li>
                    <li><a href="{{ url('/what-to-expect') }}" class="nav-link">What to Expect</a></li>
<li><a href="{{ url('/ubora-challenge') }}" class="nav-link">Ubora Challenge</a></li>
                    <li><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h4>Contact Us</h4>
            <ul class="foot-contact">
                <li><a href="mailto:summit@wennovate.africa">summit@wennovate.africa</a></li>
                <li><a href="tel:+251967446447">+251 96 744 6447</a></li>
                <li>Addis Ababa, Bole, W. 05, House nr. 301.</li>
            </ul>
        </div>

        <div class="footer-newsletter">
            <h4>Newsletter</h4>
            <p>Subscribe to stay updated with our latest news and offers!</p>
            <form id="newsletterForm">
                <input type="email" id="newsletterEmail" placeholder="Enter your email" required>
                <button type="submit" id="newsletterBtn">Subscribe</button>
            </form>
            <div id="newsletterFeedback" style="display:none; margin-top:10px; font-size: 0.95rem; border-radius:10px; padding: 10px;"></div>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; 2026 Wennovate Africa Summit. All Rights Reserved.
    </div>
</footer>



<script>
// YOUR ORIGINAL UI SCRIPTS
window.addEventListener('scroll', function() { document.getElementById('topnav').classList.toggle('scrolled', window.scrollY > 80); });
const hamburger = document.getElementById('hamburger');
const navContainer = document.querySelector('.navigation-container');
hamburger.addEventListener('click', () => { navContainer.classList.toggle('show'); hamburger.classList.toggle('active'); });
const navLinks = document.querySelectorAll('.navigation-menu li a');
window.addEventListener('scroll', () => {
    let fromTop = window.scrollY + 100;
    navLinks.forEach(link => {
        const section = document.querySelector(link.hash);
        if(section){ link.classList.toggle('active', section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop); }
    });
});
document.querySelectorAll('.navigation-menu li a').forEach(link => {
    link.addEventListener('click', function(e){
        const href = this.getAttribute('href');
        const frontPage = "{{ url('/') }}";
        if(href === frontPage){
            e.preventDefault();
            if(window.location.pathname === "/"){ window.scrollTo({ top: 0, behavior: 'smooth' }); } 
            else { window.location.href = frontPage; }
        }
        if(href.includes('#')){ e.preventDefault(); window.location.href = href; }
    });
});

// Real-time email validation
document.getElementById('c_email').addEventListener('input', function() {
    const regex = /^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/;
    const errorDiv = document.getElementById('c_email_error');
    if (this.value && !regex.test(this.value)) {
        this.style.borderColor = '#ef4444';
        errorDiv.style.display = 'block';
        errorDiv.innerText = 'Please enter a valid email address.';
        document.querySelector('#contactForm button[type="submit"]').disabled = true;
    } else {
        this.style.borderColor = '';
        errorDiv.style.display = 'none';
        if(this.value && regex.test(this.value)) {
            this.style.borderColor = '#22c55e';
            document.querySelector('#contactForm button[type="submit"]').disabled = false;
        }
    }
});

// Real-world server verification on blur
document.getElementById('c_email').addEventListener('blur', function() {
    const errorDiv = document.getElementById('c_email_error');
    const submitBtn = document.querySelector('#contactForm button[type="submit"]');
    if (!this.value || errorDiv.style.display === 'block') return; // Ignore if empty or already invalid via regex

    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('email', this.value);

    fetch("{{ url('/verify-email-ajax') }}", {
        method: 'POST', body: formData
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) {
            this.style.borderColor = '#ef4444';
            errorDiv.style.display = 'block';
            errorDiv.innerText = data.message;
            submitBtn.disabled = true;
        } else {
            this.style.borderColor = '#22c55e';
            errorDiv.style.display = 'none';
            submitBtn.disabled = false;
        }
    }).catch(e => console.log('Mail verification error:', e));
});

// FIXED FORM SCRIPT - Now uses inline feedback instead of alerts
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const btn = this.querySelector('button[type="submit"]');
    const feedbackDiv = document.getElementById('form-feedback');
    const originalText = btn.innerText;
    
    btn.innerText = 'Sending...';
    btn.disabled = true;
    feedbackDiv.style.display = 'none'; // Hide previous message

    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('name', document.getElementById('c_name').value);
    formData.append('email', document.getElementById('c_email').value);
    formData.append('subject', document.getElementById('c_subject').value);
    formData.append('message', document.getElementById('c_message').value);

    fetch("{{ url('/contact-submit') }}", {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        feedbackDiv.style.display = 'block';
        if(data.success) {
            feedbackDiv.style.backgroundColor = '#d1e7dd';
            feedbackDiv.style.color = '#0f5132';
            feedbackDiv.innerText = 'Thank you for your feedback! Your message has been received.';
            document.getElementById('contactForm').reset();
            localStorage.removeItem('wennovate_contact_draft');
            console.log('Contact draft cleared after submission.');
        } else {
            feedbackDiv.style.backgroundColor = '#f8d7da';
            feedbackDiv.style.color = '#842029';
            feedbackDiv.innerText = data.data.message || 'An error occurred. Please try again.';
        }
    })
    .catch(error => {
        feedbackDiv.style.display = 'block';
        feedbackDiv.style.backgroundColor = '#f8d7da';
        feedbackDiv.style.color = '#842029';
        feedbackDiv.innerText = 'Error sending message. Please try again.';
    })
    .finally(() => {
        btn.innerText = originalText;
        btn.disabled = false;
    });
});

async function verifyContactEmail(inputEl) {
    const val = inputEl.value;
    const errorEl = document.getElementById('c_email_error');
    const submitBtn = document.querySelector('#contactForm button[type="submit"]');
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    if (!val || !emailRegex.test(val)) return;

    const fd = new FormData();
    fd.append('_token', '{{ csrf_token() }}');
    fd.append('email', val);

    try {
        const r = await fetch("{{ url('/verify-email-ajax') }}", { method: 'POST', body: fd });
        const data = await r.json();
        
        if(!data.success) {
            errorEl.innerText = data.message;
            errorEl.style.display = 'block';
            inputEl.style.borderColor = '#ef4444';
            if(submitBtn) submitBtn.disabled = true;
        } else {
            errorEl.style.display = 'none';
            inputEl.style.borderColor = '#22c55e';
            if(submitBtn) submitBtn.disabled = false;
        }
    } catch(e) {
        console.error('Check failed', e);
    }
}
</script>

<script>
/**
 * -----------------------------------------------------------------------
 * AOS INIT
 * -----------------------------------------------------------------------
 */
AOS.init({
    easing: 'ease-in-out',
    once: true,
    duration: 1000,
});

/**
 * -----------------------------------------------------------------------
 * MOBILE GLASSMORPHIC NAV CONTROLLER
 * -----------------------------------------------------------------------
 */
const hamburger = document.getElementById('hamburger');
const navigation = document.getElementById('navigation');
const canvas     = document.getElementById('particle-canvas');
const ctx        = canvas ? canvas.getContext('2d') : null;

let particlesArray = [];
let animationId;

function initCanvas() {
    if (!canvas) return;
    canvas.width  = window.innerWidth;
    canvas.height = window.innerHeight;
}

window.addEventListener('resize', initCanvas);
initCanvas();

class Particle {
    constructor() { this.reset(); }

    reset() {
        if (!canvas) return;
        this.x      = Math.random() * canvas.width;
        this.y      = Math.random() * canvas.height;
        this.size   = Math.random() * 2 + 0.1;
        this.speedX = Math.random() * 0.8 - 0.4;
        this.speedY = Math.random() * 0.8 - 0.4;
        this.alpha  = Math.random() * 0.5;
    }

    update() {
        if (!canvas) return;
        this.x += this.speedX;
        this.y += this.speedY;
        if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
            this.reset();
        }
    }

    draw() {
        if (!ctx) return;
        ctx.fillStyle = `rgba(255, 215, 0, ${this.alpha})`;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
    }
}

function initParticles() {
    particlesArray = [];
    for (let i = 0; i < 50; i++) {
        particlesArray.push(new Particle());
    }
}

function animate() {
    if (!ctx || !canvas) return;
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particlesArray.forEach(p => { p.update(); p.draw(); });
    animationId = requestAnimationFrame(animate);
}

function toggleMenu() {
    if (!hamburger || !navigation) return;
    const isActive = hamburger.classList.toggle('active');
    navigation.classList.toggle('show');
    if (isActive) {
        document.body.style.overflow = 'hidden';
        initParticles();
        animate();
    } else {
        document.body.style.overflow = 'auto';
        cancelAnimationFrame(animationId);
    }
}

if (hamburger) {
    hamburger.addEventListener('click', toggleMenu);
}

window.addEventListener('scroll', function() {
    const topNav = document.getElementById('topnav');
    if (topNav) {
        if (window.scrollY > 50) {
            topNav.classList.add('scrolled');
        } else {
            topNav.classList.remove('scrolled');
        }
    }
});

/* --- Form Draft Persistence --- */
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (!contactForm) return;

    const fields = ['c_name', 'c_email', 'c_subject', 'c_message'];
    const storageKey = 'wennovate_contact_draft';

    // Load draft
    const savedDraft = JSON.parse(localStorage.getItem(storageKey) || '{}');
    if (Object.keys(savedDraft).length > 0) {
        console.log('Restoring contact draft...', savedDraft);
    }
    
    fields.forEach(id => {
        const field = document.getElementById(id);
        if (field && savedDraft[id]) {
            field.value = savedDraft[id];
        }
    });

    // Save draft on input
    contactForm.addEventListener('input', function(e) {
        if (fields.includes(e.target.id)) {
            const currentDraft = JSON.parse(localStorage.getItem(storageKey) || '{}');
            currentDraft[e.target.id] = e.target.value;
            localStorage.setItem(storageKey, JSON.stringify(currentDraft));
            console.log('Contact draft updated:', e.target.id);
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nlForm = document.getElementById('newsletterForm');
    if (nlForm) {
        nlForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('newsletterBtn');
            const emailInput = document.getElementById('newsletterEmail');
            const feedback = document.getElementById('newsletterFeedback');
            
            const originalText = btn.innerText;
            btn.innerText = 'Subscribing...';
            btn.disabled = true;
            feedback.style.display = 'none';

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('email', emailInput.value);

            fetch("{{ url('/subscribe-submit') }}", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                feedback.style.display = 'block';
                if (data.success) {
                    feedback.style.backgroundColor = 'rgba(34, 197, 94, 0.2)';
                    feedback.style.color = '#4ade80';
                    feedback.innerText = 'Thank you for subscribing!';
                    nlForm.reset();
                } else {
                    feedback.style.backgroundColor = 'rgba(239, 68, 68, 0.2)';
                    feedback.style.color = '#f87171';
                    feedback.innerText = data.message || 'Error subscribing. Try again.';
                }
            })
            .catch(error => {
                feedback.style.display = 'block';
                feedback.style.backgroundColor = 'rgba(239, 68, 68, 0.2)';
                feedback.style.color = '#f87171';
                feedback.innerText = 'An error occurred. Please try again.';
            })
            .finally(() => {
                btn.innerText = originalText;
                btn.disabled = false;
            });
        });
    }
});
</script>

    @include('partials.cookie-banner')
</body>
</html>

   

   
