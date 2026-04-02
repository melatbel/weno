<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Partnership Details | Wennovate Africa
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

        /* ============================================================= */
        /* FOOTER STYLES                                                  */
        /* ============================================================= */
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
            background: linear-gradient(90deg, #1E3A8A, #2563EB, #3B82F6, #1E3A8A);
            opacity: 0.25;
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
        @media (max-width: 1400px) { .footer-container { flex-direction: column; align-items: center; } }

        /* ============================================================= */
        /* AGENDA BODY SECTION                                            */
        /* ============================================================= */
        .agenda-section {
            padding-top: 100px;
            padding-bottom: 80px;
            background: #f4f5f7;
            min-height: 100vh;
        }

        .agenda-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .agenda-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .agenda-title-row {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .agenda-title-row .pdf-icon {
            font-size: 2rem;
            color: #e74c3c;
            flex-shrink: 0;
        }

        .agenda-title-row h2 {
            font-size: 1.5rem;
            font-weight: 900;
            color: #0a0f3f;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .btn-download {
            background-color: #0a0f3f;
            color: #ffffff;
            font-weight: 700;
            padding: 12px 32px;
            border-radius: 6px;
            font-size: 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .btn-download:hover {
            background-color: #1a2060;
            color: #FFD700;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(10,15,63,0.4);
        }

        .document-wrapper {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            background: #525659;
            border: 1px solid #ccc;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .document-wrapper iframe {
            width: 100%;
            height: 900px;
            border: none;
            display: block;
        }

        @media (max-width: 768px) {
            .agenda-title-row h2 { font-size: 1.1rem; }
            .document-wrapper iframe { height: 600px; }
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
    
    </style>
</head>
<body>

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
                <li style="--i:5;"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
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

<!-- ================= AGENDA SECTION ================= -->
<section class="agenda-section">
    <div class="agenda-container">

        <!-- Header row: title on left, download button on right -->
        <div class="agenda-header">
            <div class="agenda-title-row">
                <i class="fas fa-file-pdf pdf-icon"></i>
                <h2>WENNOVATE SUMMIT AFRICA-2026 &mdash; PARTNERSHIP DETAILS</h2>
            </div>
            <a href="{{ asset('assets/images/event/agenda.pdf') }}" download class="btn-download">
                <i class="fas fa-download"></i> Download
            </a>
        </div>

        <!-- PDF Viewer -->
        <div class="document-wrapper">
            <iframe src="{{ asset('assets/images/event/agenda.pdf') }}" title="Wennovate Summit Africa 2026 – Agenda"></iframe>
        </div>

    </div>
</section>

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
/**
 * -----------------------------------------------------------------------
 * NAVBAR SCROLL EFFECT
 * -----------------------------------------------------------------------
 */
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

/**
 * -----------------------------------------------------------------------
 * NAV LINK SMOOTH SCROLL
 * -----------------------------------------------------------------------
 */
document.querySelectorAll('.navigation-menu li a').forEach(link => {
    link.addEventListener('click', function(e){
        const href = this.getAttribute('href');
        const frontPage = "{{ url('/') }}";
        if (href === frontPage) {
            e.preventDefault();
            if (window.location.pathname === "/") { window.scrollTo({ top: 0, behavior: 'smooth' }); }
            else { window.location.href = frontPage; }
        }
        if (href.includes('#')) { e.preventDefault(); window.location.href = href; }
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
