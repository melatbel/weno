@php
    // header.php in WordPress theme (Retained as requested)
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
@endphp
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Wennovate Africa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template">
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern">
    <meta name="author" content="Shreethemes">
    <meta name="email" content="support@shreethemes.in">
    <meta name="website" content="https://shreethemes.in">
    <meta name="Version" content="v4.8.0">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Google Fonts: Inter + Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400..900&family=Poppins:wght@400..800&family=Outfit:wght@300..900&display=swap"
        rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link href="{{ asset('assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" id="bootstrap-style" class="theme-opt"
        rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="{{ asset('assets/css/style.min.css') }}" id="color-opt" class="theme-opt" rel="stylesheet"
        type="text/css">

    <style>
        /* ==============================================
           CUSTOM ANIMATION CLASSES
           ============================================== */

        /* General Reveal (Fade Up) */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        /* Specific Directionals */
        .reveal-left {
            opacity: 0;
            transform: translateX(-60px);
            transition: all 1s ease-out;
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(60px);
            transition: all 1s ease-out;
        }

        .reveal-bottom {
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s ease-out;
        }

        /* Active State (Triggered by JS) */
        .reveal-on-scroll.active,
        .reveal-left.active,
        .reveal-right.active,
        .reveal-bottom.active {
            opacity: 1;
            transform: translate(0, 0);
        }

        /* Delays */
        .delay-100 {
            transition-delay: 0.1s;
        }

        .delay-200 {
            transition-delay: 0.2s;
        }

        .delay-300 {
            transition-delay: 0.3s;
        }

        .delay-400 {
            transition-delay: 0.4s;
        }

        .delay-500 {
            transition-delay: 0.5s;
        }

        .delay-1000 {
            transition-delay: 1.0s;
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
            font-family: 'Outfit', sans-serif;
            font-size: 17px;
            margin: 0;
            background: linear-gradient(135deg, #f0f4ff, #e6f0ff);
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ==============================================
           NAVBAR CSS
           ============================================== */
        header#topnav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            background: transparent;
            padding: 15px 0;
            transition: all 0.4s ease;
            box-shadow: none;
        }

        /* Scrolled State: Background becomes white */
        header#topnav.nav-scrolled {
            background: #ffffff !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        header#topnav .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        header#topnav .logo img {
            height: 55px;
            width: auto;
        }

        #navigation {
            display: flex;
            align-items: center;
        }

        .navigation-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 6px;
            flex-wrap: nowrap;
        }

        .mobile-nav-footer,
        #particle-canvas {
            display: none !important;
        }

        .navigation-menu li a {
            color: #fff !important;
            font-size: 0.9rem !important;
            font-weight: 700;
            text-decoration: none;
            text-transform: none !important;
            font-family: 'Inter', sans-serif;
            transition: color 0.3s ease;
            position: relative;
            padding: 5px 4px;
            letter-spacing: -0.2px;
            display: inline-block;
            white-space: nowrap;
        }

        /* Scrolled State: Black Text */
        header#topnav.nav-scrolled .navigation-menu li a {
            color: #000 !important;
        }

        /* Hover State: Gold */
        .navigation-menu li a:hover,
        .navigation-menu li a.active {
            color: #FFD700 !important;
        }

        /* Ensure Hover overrides Scrolled Black */
        header#topnav.nav-scrolled .navigation-menu li a:hover {
            color: #d4af37 !important;
            /* Gold */
        }



        /* REGISTER BUTTON */
        .btn-register-navbar {
            background: linear-gradient(135deg, #6a0dad, #FFD700);
            color: #fff !important;
            padding: 10px 22px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: transform 0.3s ease;
            white-space: nowrap;
            margin-left: 8px;
            flex-shrink: 0;
        }

        .btn-register-navbar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
        }

        /* --- TOGGLE ICON (Hamburger to X) --- */
        .menu-extras {
            display: none;
            /* Important: Ensure toggle is above the slide-in menu */
            z-index: 9999;
            position: relative;
        }

        .hamburger {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s cubic-bezier(0.65, 0, 0.35, 1);
        }

        header#topnav.nav-scrolled .hamburger {
            background: rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.1);
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
            background: #ffffff;
            border-radius: 4px;
            position: absolute;
            transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        }

        header#topnav.nav-scrolled .h-line {
            background: #000000;
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

        .hamburger.open .line-top {
            top: 50%;
            transform: translateY(-50%) rotate(45deg);
            background: var(--secondary, #FFD700) !important;
        }

        .hamburger.open .line-mid {
            opacity: 0;
            transform: translateX(-10px);
        }

        .hamburger.open .line-bot {
            bottom: 50%;
            transform: translateY(50%) rotate(-45deg);
            background: var(--secondary, #FFD700) !important;
        }

        /* ==============================================
           MOBILE RESPONSIVENESS (Advanced)
           ============================================== */
        @media (max-width: 991px) {

            /* General Header Styling on Mobile */
            header#topnav {
                background: #0a0f3f;
            }

            header#topnav.nav-scrolled {
                background: #fff;
            }

            /* Logo Fix */
            header#topnav .logo img {
                left: 0 !important;
                max-width: 140px;
            }

            /* Show Toggle */
            .menu-extras {
                display: block;
                margin-left: 10px;
            }

            /* Hide Register Button in the navbar on mobile, use the one inside the menu instead */
            .register-btn-container {
                display: none !important;
            }

            /* --- ADVANCED SLIDE-IN MENU --- */
            #navigation {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                width: 100vw !important;
                height: 100vh !important;
                max-width: 100vw !important;
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
                transition: all 0.8s cubic-bezier(0.65, 0, 0.35, 1);
                pointer-events: none;
                transform: none;
                box-shadow: none;
            }

            #navigation.open {
                opacity: 1;
                visibility: visible;
                clip-path: circle(150% at 90% 5%);
                pointer-events: auto;
                transform: none;
            }

            #particle-canvas {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                pointer-events: none;
                display: block !important;
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
                transition: all 0.5s cubic-bezier(0.65, 0, 0.35, 1);
            }

            #navigation.open .navigation-menu li {
                opacity: 1;
                transform: translateY(0);
                transition-delay: calc(0.1s + (var(--i) * 0.08s));
            }

            header#topnav .navigation-menu li a {
                font-size: 1.35rem !important;
                font-weight: 700;
                color: rgba(255, 255, 255, 0.8) !important;
                padding: 12px 20px;
                display: inline-block;
                text-decoration: none;
                width: auto;
                opacity: 1;
                transform: none;
                transition: transform 0.3s ease, color 0.3s ease;
            }

            header#topnav .navigation-menu li a:after {
                display: none;
            }

            header#topnav .navigation-menu li a:hover {
                color: #fff !important;
                transform: scale(1.05);
            }

            .mobile-nav-footer {
                display: block !important;
                margin-top: 40px;
                text-align: center;
                opacity: 0;
                transform: translateY(20px);
                transition: 0.5s ease 0.6s;
                z-index: 2;
            }

            #navigation.open .mobile-nav-footer {
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
                background: rgba(255, 255, 255, 0.05);
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                transition: 0.3s;
                border: 1px solid rgba(255, 255, 255, 0.1);
                text-decoration: none;
                font-size: 1.2rem;
            }

            .mob-socials a:hover,
            .mob-socials a:active {
                background: #FFD700;
                color: #0a0f3f;
                box-shadow: 0 0 15px #FFD700;
                transform: translateY(-5px);
            }
        }
    </style>
</head>

<body>

    <!-- ================= HEADER / NAVBAR ================= -->
    <header id="topnav" class="defaultscroll sticky">
        <div class="container">
            <a class="logo" href="{{ url('/') }}">
                <img src="{{ asset('images/wennovate-logo.jpg') }}" alt="Wennovate Logo" id="brand-logo">
            </a>

            <div id="navigation">
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
                    <a href="{{ url('/register') }}" class="btn-register-mobile" style="background: linear-gradient(135deg, #6a0dad, #FFD700); color: #fff; font-weight: 600; padding: 12px 25px; font-size: 1.1rem; border-radius: 25px; text-decoration: none; display: inline-block; margin-bottom: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">Register</a>
                    <p style="color:#FFD700; font-size:0.8rem; letter-spacing:2px; text-transform:uppercase; font-weight:700;">
                        Secure Your Spot
                    </p>
                    <div class="mob-socials">
                        <a href="https://www.facebook.com/share/14aF1GGHqLB/"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/wennovate.africa?igsh=NHg2bjJ0N3hod2oy"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="register-btn-container">
                    <a href="{{ url('/register') }}" class="btn-register-navbar">Register</a>
                </div>

                <div class="menu-extras">
                    <div class="menu-item">
                        <div id="isToggle" class="hamburger" onclick="toggleMobileMenu()">
                            <div class="hamburger-box">
                                <span class="h-line line-top"></span>
                                <span class="h-line line-mid"></span>
                                <span class="h-line line-bot"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script>
        let canvas, ctx, particlesArray, animationId;

        document.addEventListener('DOMContentLoaded', () => {
            canvas = document.getElementById('particle-canvas');
            if (canvas) {
                ctx = canvas.getContext('2d');
                window.addEventListener('resize', initCanvas);
                initCanvas();
            }
        });

        function initCanvas() {
            if (!canvas) return;
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        class Particle {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 0.1;
                this.speedX = Math.random() * 0.8 - 0.4;
                this.speedY = Math.random() * 0.8 - 0.4;
                this.alpha = Math.random() * 0.5;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
                    this.reset();
                }
            }
            draw() {
                ctx.fillStyle = `rgba(255, 215, 0, ${this.alpha})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function initParticles() {
            if (!canvas) return;
            particlesArray = [];
            for (let i = 0; i < 50; i++) {
                particlesArray.push(new Particle());
            }
        }

        function animate() {
            if (!canvas) return;
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particlesArray.forEach(p => { p.update(); p.draw(); });
            animationId = requestAnimationFrame(animate);
        }

        function toggleMobileMenu() {
            const navigation = document.getElementById('navigation');
            const hamburger = document.getElementById('isToggle');
            
            const isActive = hamburger.classList.toggle('open');
            navigation.classList.toggle('open');
            
            if (isActive) {
                document.body.style.overflow = 'hidden';
                if (canvas && window.innerWidth <= 991) {
                    initParticles();
                    animate();
                }
            } else {
                document.body.style.overflow = '';
                if (animationId) cancelAnimationFrame(animationId);
            }
        }
    </script>

    

    
    <section class="bg-half-260 w-100 d-table jarallax" data-jarallax data-speed="0.5" 
        style="background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), 
        url('{{ asset('images/event/event.jpg') }}') center center; 
        background-size: cover; position: relative;">
        
        <div class="bg-overlay" 
             style="opacity: 1;
                    background: 
                        linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                        linear-gradient(135deg, rgba(75,0,130,0.85), rgba(46,26,71,0.85), rgba(128,0,128,0.85), rgba(255,215,0,0.85));">
        </div>

        <div class="container h-100">
            <div class="row justify-content-center position-relative h-100">
                <div class="col-lg-10 text-center d-flex flex-column justify-content-center h-100">
                    <div class="title-heading" style="overflow: hidden;">

                        <h4 class="mb-3 animate__animated"
                            style="color:#FFD700; animation: slideInLeft 1s ease forwards;">
                            May 27–30, 2026
                        </h4>

                        <h1 class="display-3 text-white fw-bold mb-3 animate__animated text-uppercase"
                            style="animation: fadeInDown 1.5s ease forwards;">
                            WENNOVATE AFRICA SUMMIT 2026
                        </h1>

                        <p class="para-desc mx-auto mb-4 animate__animated"
                           style="font-size:1.85rem; font-family: 'Outfit', sans-serif; color:#FFD700; line-height:1.4; max-width:1000px; animation: fadeInUp 2s ease forwards; font-weight:600; letter-spacing: 0.02em; font-style: italic;">
                           A pan-African startup and investment summit that connects founders,<br>
                           investors, policymakers and the diaspora to accelerate<br>
                           investable innovation and measurable impact
                        </p>

                        <div id="eventdown" class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
                            <div class="count-box">
                                <span id="days" class="count-num"></span>
                                <small class="count-label">Days</small>
                            </div>
                            <div class="count-box">
                                <span id="hours" class="count-num"></span>
                                <small class="count-label">Hours</small>
                            </div>
                            <div class="count-box">
                                <span id="mins" class="count-num"></span>
                                <small class="count-label">Mins</small>
                            </div>
                            <div class="count-box">
                                <span id="secs" class="count-num"></span>
                                <small class="count-label">Secs</small>
                            </div>
                        </div>

                        <div id="end" class="h4 text-white fw-bold mb-3"></div>

                        <div class="d-flex justify-content-center gap-3 flex-wrap mb-3">
                            <a href="{{ url('/register') }}" class="btn btn-lg" 
                               style="background: linear-gradient(135deg, #6a0dad, #FFD700); color:#fff; font-weight:700;">
                                <i class="uil uil-ticket"></i> Buy Tickets
                            </a>
                            <a href="{{ url('/sponsor-partner') }}" 
                               class="btn btn-lg fw-bold"
                               style="background: linear-gradient(135deg, #FFD700, #6a0dad); color:#fff;">
                                <i class="uil uil-handshake"></i> Become a Partner
                            </a>
                        </div>

                        <a href="{{ url('/register') }}" class="early-bird-hero">
                            <span class="early-bird-text">Early Bird<br>Get 30% Off</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center position-absolute w-100" style="bottom:20px; left:0; right:0; z-index:10;">
            <h5 class="mb-0" style="color:#FFD700; font-size:1.6rem; font-weight:500; font-family: 'Poppins', sans-serif;">
                Addis Ababa, Ethiopia
            </h5>
        </div>

    </section>

    <script>
    const targetDate = new Date("May 27, 2026 00:00:00").getTime();
    const timer = setInterval(() => {
        const now = new Date().getTime();
        const diff = targetDate - now;
        if (diff > 0) {
            document.getElementById("days").innerText = Math.floor(diff / (1000 * 60 * 60 * 24));
            document.getElementById("hours").innerText = Math.floor((diff / (1000 * 60 * 60)) % 24);
            document.getElementById("mins").innerText = Math.floor((diff / (1000 * 60)) % 60);
            document.getElementById("secs").innerText = Math.floor((diff / 1000) % 60);
        } else {
            clearInterval(timer);
            document.getElementById("eventdown").style.display = "none";
            document.getElementById("end").innerText = "🎉 EVENT STARTED!";
        }
    }, 1000);
    </script>

    <style>
    .count-box {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(6px);
        border-radius: 14px;
        padding: 14px 18px;
        min-width: 90px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    }
    .count-num { font-size: 2.5rem; font-weight: 700; color: #fff; line-height: 1.1; }
    .count-label { display: block; font-size: 1rem; color: rgba(255,255,255,0.85); margin-top: 2px; letter-spacing: 0.5px; }
    .early-bird-hero {
        position: absolute; left: 0; top: 82%; transform: translate(-20%, -50%);
        display: flex; align-items: center; justify-content: center;
        width: 160px; height: 160px; background: linear-gradient(135deg, #6a0dad, #FFD700);
        color: #fff; font-weight: 700; text-align: center; text-decoration: none;
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.7), 0 15px 35px rgba(0,0,0,0.3);
        transition: all 0.3s ease; z-index: 10; border-radius: 50% 35% 50% 35% / 45% 55% 45% 55%;
        animation: float 3s ease-in-out infinite;
    }
    .early-bird-hero:hover {
        background: linear-gradient(135deg, #00A86B, #FFD700);
        transform: scale(1.25); box-shadow: 0 0 30px rgba(255, 215, 0, 0.9), 0 25px 60px rgba(0,0,0,0.5); color: #fff;
    }
    .early-bird-text { font-size: 1.2rem; line-height: 1.2; }
    @keyframes float { 0%, 100% { transform: translate(-20%, -50%) translateY(0); } 50% { transform: translate(-20%, -50%) translateY(-10px); } }
    @keyframes slideInLeft { from { transform: translateX(-100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
    @keyframes fadeInDown { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    @keyframes fadeInUp { from { transform: translateY(50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>

<section id="exclusive-speaker-section">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <span class="subtitle-accent">Meet Our Experts</span>
                <h4 class="main-title-black">Our Speakers</h4>
            </div>
        </div>

        <div class="row speaker-flex-row">
            @php 
                            $speakers = [
                    ['name' => 'Ronny Jofra', 'role' => 'Organizer', 'img' => '01.jpg'],
                    ['name' => 'Micheal Carlo', 'role' => 'Event Manager', 'img' => '04.jpg'],
                    ['name' => 'Aliana Rosy', 'role' => 'Motivator', 'img' => '03.jpg'],
                    ['name' => 'Sofia Razaq', 'role' => 'Speaker', 'img' => '02.jpg'],
                ];
            @endphp
            @foreach ($speakers as $speaker)
                <div class="col-lg-3 col-md-6 speaker-flex-col">
                    <div class="speaker-card-v3">
                        <div class="img-container">
                            <img src="{{ asset('images/client/' . $speaker['img']) }}" 
                                 class="avatar-v3 shadow-sm" alt="Speaker">
                        </div>

                        <div class="content-v3">
                            <h5 class="name-v3">{{ $speaker['name'] }}</h5>
                            <p class="role-v3">{{ $speaker['role'] }}</p>

                            <div class="social-box">
                                <a href="#" class="social-btn"><i data-feather="facebook" style="width:16px;"></i></a>
                                <a href="#" class="social-btn"><i data-feather="instagram" style="width:16px;"></i></a>
                                <a href="#" class="social-btn"><i data-feather="twitter" style="width:16px;"></i></a>
                                <a href="#" class="social-btn"><i data-feather="linkedin" style="width:16px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const speakerCards = document.querySelectorAll('#exclusive-speaker-section .speaker-card-v3');

    const speakerObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if(entry.isIntersecting) {
                const cardArray = Array.from(speakerCards);
                const index = cardArray.indexOf(entry.target);
                
                // 1.2s delay for the section to settle, then 250ms stagger
                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, 1200 + (index * 250)); 
                
                speakerObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    speakerCards.forEach(card => speakerObserver.observe(card));

    // Refresh feather icons for this specific section
    if (typeof feather !== "undefined") {
        feather.replace();
    }
});
</script>

    <section id="about" class="section about-section">
    <div class="container">


        <p class="about-text scroll-left" data-delay="0.2s">
            Wennovate Africa Summit 2026, themed “Innovate, Invest, Impact,” is a flagship initiative by Wennovate Consult, created to spark dialogue, accelerate startups, and catalyze investments for real change. Scheduled to take place over three powerful days in Addis Ababa, the Summit aims to bring together African entrepreneurs, investors, diaspora professionals, development partners, government leaders, and academia in a multidisciplinary exchange.
        </p>

        <p class="about-text scroll-left" data-delay="0.4s">
            This Summit will bridge the gap between impactful innovations and investment, between startups and policy, and between Africa and its global diaspora and international impact investors. It is Africa’s Premier Startup Investment Summit Empowering Impactful Innovation.
        </p>

        <div class="mt-5 pt-5 border-top">
            <h3 class="about-title scroll-left" data-delay="0.5s" style="font-size: 32px;">Thematic Areas</h3>
            <span class="title-accent scroll-left" data-delay="0.5s" style="background: #FFD700; width: 50px;"></span>
            
            <div class="row justify-content-center mt-4 g-4">
                <div class="col-lg-4 col-md-6 scroll-left" data-delay="0.6s">
                    <div class="thematic-card-adv">
                        <i class="mdi mdi-robot thematic-icon-adv"></i>
                        <h5 class="thematic-title-adv">Artificial Intelligence & Future Tech in Africa</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 scroll-left" data-delay="0.7s">
                    <div class="thematic-card-adv">
                        <i class="mdi mdi-handshake thematic-icon-adv"></i>
                        <h5 class="thematic-title-adv">Investment, impact and partnerships</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 scroll-left" data-delay="0.8s">
                    <div class="thematic-card-adv">
                        <i class="mdi mdi-earth thematic-icon-adv"></i>
                        <h5 class="thematic-title-adv">Diaspora Engagement for Innovation & Investment</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 scroll-left" data-delay="0.9s">
                    <div class="thematic-card-adv">
                        <i class="mdi mdi-account-group thematic-icon-adv"></i>
                        <h5 class="thematic-title-adv">Venture & Founder Summit</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 scroll-left" data-delay="1.0s">
                    <div class="thematic-card-adv">
                        <i class="mdi mdi-trophy thematic-icon-adv"></i>
                        <h5 class="thematic-title-adv">Ubora Challenge – Startup Competition</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<style>
.about-section {
    padding: 90px 0;
    background: #f8fafc;
}

/* Title */
.about-title {
    font-size: 42px;
    font-weight: 800;
    color: #0b1c39;
    margin-bottom: 8px;
}

/* Accent line */
.title-accent {
    display: inline-block;
    width: 70px;
    height: 4px;
    background: #f57c00;
    border-radius: 10px;
    margin-bottom: 18px;
}

/* Paragraph text */
.about-text {
    font-size: 22px;
    line-height: 1.9;
    color: #444;
    max-width: 900px;
    margin-bottom: 18px;
}

/* Scroll animation */
.scroll-left {
    opacity: 0;
    transform: translateX(-70px);
    transition: all 1s ease;
}

/* Active with staggered delay */
.scroll-left.active {
    opacity: 1;
    transform: translateX(0);
}

/* Advanced Thematic UI Styles */
.thematic-card-adv {
    background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    padding: 40px 30px;
    position: relative;
    transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.03), 0 1px 3px rgba(0,0,0,0.02);
    border: 1px solid rgba(106, 13, 173, 0.08);
    height: 100%;
    z-index: 1;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.thematic-card-adv:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 30px 60px rgba(106, 13, 173, 0.12), 0 10px 20px rgba(0,0,0,0.05);
    border-color: rgba(106, 13, 173, 0.3);
    background: #ffffff;
}
.thematic-card-adv:hover .thematic-icon-adv {
    transform: scale(1.1);
    color: #9e3fd1;
}

.thematic-card-adv:hover .thematic-title-adv {
    color: #6a0dad;
}

.thematic-icon-adv {
    font-size: 3rem;
    color: #6a0dad;
    margin-bottom: 20px;
    display: inline-block;
    transition: all 0.4s ease;
}
.thematic-title-adv {
    font-size: 1.15rem;
    font-weight: 700;
    color: #0b1c39;
    margin: 0;
    line-height: 1.5;
    transition: all 0.4s ease;
}

/* Mobile */
@media (max-width: 768px) {
    .about-title {
        font-size: 32px;
    }

    .about-text {
        font-size: 20px;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const scrollElements = document.querySelectorAll("#about .scroll-left");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                const element = entry.target;
                const delay = element.getAttribute('data-delay') || '0s';
                element.style.transitionDelay = delay; // staggered delay
                element.classList.add("active");
                observer.unobserve(element);
            }
        });
    }, { threshold: 0.3 });

    scrollElements.forEach(el => observer.observe(el));
});
</script>

    <section id="summit-program" class="section summit-schedule">

<style>
/* ===== GENERAL ===== */
.summit-schedule {
    color: #000; /* text black */
    padding: 80px 0;
}

.summit-schedule h3, .summit-schedule h4 {
    color: #000;
}

.summit-schedule p {
    color: rgba(0,0,0,0.85);
}

/* ===== NAV PILLS ===== */
.summit-schedule .nav-pills {
    background: rgba(0,0,0,0.05);
}

.summit-schedule .nav-pills .nav-link {
    color: rgba(0,0,0,0.7);
    font-weight: 600;
    padding: 14px;
}

.summit-schedule .nav-pills .nav-link.active {
    background: linear-gradient(135deg, #6a0dad, #ffd700);
    color: #000;
}

/* ===== CARD ===== */
.schedule-card {
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 25px 60px rgba(0,0,0,0.2);
    position: relative;
    overflow: hidden;
    background: transparent;
}

.schedule-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(180deg, #ffd700, #6a0dad);
}

/* ===== DATE ===== */
.schedule-date {
    min-width: 80px;
    text-align: center;
    margin-right: 25px;
}

.schedule-date .day {
    font-size: 34px;
    font-weight: 800;
    color: #6a0dad;
}

.schedule-date .month {
    letter-spacing: 2px;
    font-size: 13px;
    opacity: 0.85;
    color: #000;
}

/* ===== CONTENT ===== */
.schedule-title {
    font-size: 22px;
    margin-bottom: 14px;
    color: #000;
}

/* MODIFIED: BETTER FONT AND CUSTOM BULLETS 
*/
.agenda-list {
    padding-left: 0;
    list-style: none; /* Removed default bullets */
}

.agenda-list li {
    padding: 12px 0 12px 35px; /* Added left padding for custom icon */
    font-size: 1.15rem; /* Increased font size */
    font-weight: 500;
    color: #1a1a2e; /* Darker text for contrast */
    position: relative;
    line-height: 1.6;
    border-bottom: 1px dashed rgba(0,0,0,0.1);
}

/* Custom Bullet Icon (Chevron) */
.agenda-list li::before {
    content: '❯';
    position: absolute;
    left: 0;
    top: 12px;
    color: #6a0dad;
    font-weight: 900;
    font-size: 1.2rem;
}

.agenda-list li:last-child {
    border-bottom: none;
}

.more-content {
    display: none;
}

/* ===== READ MORE ===== */
.read-more {
    margin-top: 14px;
    display: inline-block;
    font-weight: 600;
    color: #6a0dad;
    cursor: pointer;
}

.read-more:hover {
    text-decoration: underline;
}

/* ===== BUTTON ===== */
.btn-ticket {
    margin-top: 18px;
    display: inline-block;
    padding: 10px 22px;
    border-radius: 25px;
    background: linear-gradient(135deg, #6a0dad, #ffd700);
    color: #000;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-ticket:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(255,215,0,0.35);
}

/* ===== SUMMIT PROGRAM TITLE & SUBTITLE (Who Should Attend UI) ===== */
.summit-title {
    font-size: 42px;
    font-weight: 800;
    color: #0b1c39;
    margin-bottom: 8px;
}

.title-accent {
    display: inline-block;
    width: 70px;
    height: 4px;
    background: #f57c00;
    border-radius: 10px;
    margin-bottom: 18px;
}

.summit-subtitle-container p {
    font-size: 23px;
    color: #555;
    max-width: 800px;
    margin: 10px auto;
    opacity: 0;
    transform: translateX(-70px);
    transition: all 0.6s ease;
}

.summit-subtitle-container p.active {
    opacity: 1;
    transform: translateX(0);
}

/* Stagger animations for each paragraph */
.summit-subtitle-container p:nth-child(1).active { transition-delay: 0.2s; }
.summit-subtitle-container p:nth-child(2).active { transition-delay: 0.5s; }

/* Scroll animation */
.scroll-left {
    opacity: 0;
    transform: translateX(-70px);
    transition: all 1.2s ease;
}

.scroll-left.active {
    opacity: 1;
    transform: translateX(0);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .summit-title {
        font-size: 32px;
    }

    .summit-subtitle-container p {
        font-size: 18px;
    }
}
</style>

<div class="container">

    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
            <h2 class="summit-title scroll-left"> Program </h2>
            <span class="title-accent scroll-left" style="display: block; width: 40px; margin: 0 auto 18px;"></span>
            
            <div class="summit-subtitle-container">
                <p class="scroll-left">Core stages, masterclasses, expo and matchmaking.</p>
                <p class="scroll-left">Wennovate_Africa_Summit_2026_Co…</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <ul class="nav nav-pills nav-justified rounded shadow">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#day1">Day 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#day2">Day 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#day3">Day 3</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content">

        <div class="tab-pane fade show active" id="day1">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="schedule-card">
                        <div class="d-flex schedule-flex">

                            <div class="schedule-date">
                                <div class="day">27</div>
                                <div class="month">MAY</div>
                            </div>

                            <div>
                                <div class="schedule-title">Day 1 — Innovation, AI & Tech for Impact</div>

                                <ul class="agenda-list">
                                    <li>Opening ceremony & keynote addresses</li>
                                    <li>Panels: AI in Africa (Vision 2030); sustainability & tech partnerships</li>
                                    <li>Innovation Expo launch (AI, Agritech, Fintech, HealthTech, EdTech)</li>
                                    <li class="more-content">Ubora Challenge — Round 1 (sector tracks)</li>
                                    <li class="more-content">Networking & cultural reception</li>
                                </ul>

                                <span class="read-more" onclick="toggleAgenda(this)">Read more</span><br>
                                <a href="{{ url('/register') }}" class="btn-ticket">Buy Ticket</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="day2">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="schedule-card">
                        <div class="d-flex schedule-flex">

                            <div class="schedule-date">
                                <div class="day">28</div>
                                <div class="month">MAY</div>
                            </div>

                            <div>
                                <div class="schedule-title">Day 2 — Venture, Founder & Investor Summit</div>

                                <ul class="agenda-list">
                                    <li>Diaspora investors & founders breakfast</li>
                                    <li>Workshops: fundraising, pitching, due diligence</li>
                                    <li>Roundtables on VC pipelines; launch of The Big Push Fund & Studio (partnered initiatives)</li>
                                    <li class="more-content">Ubora Challenge — Semi-finals; masterclasses on valuation, leadership, investment readiness</li>
                                    <li class="more-content">Summit dinner & Wennovate Impact Awards</li>
                                </ul>

                                <span class="read-more" onclick="toggleAgenda(this)">Read more</span><br>
                                <a href="{{ url('/register') }}" class="btn-ticket">Buy Ticket</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="day3">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="schedule-card">
                        <div class="d-flex schedule-flex">

                            <div class="schedule-date">
                                <div class="day">29</div>
                                <div class="month">MAY</div>
                            </div>

                            <div>
                                <div class="schedule-title">Day 3 — Policy, Inclusion & Diaspora Engagement</div>

                                <ul class="agenda-list">
                                    <li>Policy forum on tech regulation and startup policy (Startup Acts)</li>
                                    <li>Panels: E-commerce, mobility, EdTech & HealthTech for last-mile impact</li>
                                    <li class="more-content">Ubora Challenge final pitches & award ceremony</li>
                                    <li class="more-content">Closing remarks and Summit outcomes</li>
                                </ul>

                                <span class="read-more" onclick="toggleAgenda(this)">Read more</span><br>
                                <a href="{{ url('/register') }}" class="btn-ticket">Buy Ticket</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
function toggleAgenda(el) {
    const hiddenItems = el.previousElementSibling.querySelectorAll('.more-content');
    hiddenItems.forEach(item => {
        if(item.style.display === "list-item") item.style.display = "none";
        else item.style.display = "list-item";
    });
    el.innerText = hiddenItems[0].style.display === "none" ? 'Read more' : 'Show less';
}

// Scroll animation for title & subtitles
document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll("#summit-program .scroll-left");

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    elements.forEach(el => observer.observe(el));
});
</script>

</section>
    <style>
    .about-section { padding: 80px 0 60px; background: #f8fafc; }
    .about-title { font-size: 42px; font-weight: 800; color: #0b1c39; margin-bottom: 10px; }
    .title-accent { display: block; width: 80px; height: 5px; background: #f57c00; border-radius: 10px; margin-bottom: 20px; }
    .about-text { color: #555; line-height: 1.8; margin-bottom: 20px; font-size: 1.15rem; }

    .obj-card {
        background: #fff;
        padding: 35px 25px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        text-align: center;
        transition: all 0.4s ease;
        border-bottom: 4px solid transparent;
        height: 100%;
    }
    .obj-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(106, 13, 173, 0.15);
        border-bottom: 4px solid #FFD700;
    }
    .obj-card .icon-box {
        width: 70px; height: 70px;
        background: linear-gradient(135deg, #6a0dad, #9e3fd1);
        color: #fff;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 30px; margin: 0 auto 20px;
        box-shadow: 0 5px 15px rgba(106, 13, 173, 0.3);
    }
    .obj-card h5 { font-size: 22px; font-weight: 700; color: #0b1c39; margin-bottom: 10px; }
    .obj-card p { font-size: 16px; color: #666; margin: 0; }
    </style>
    <section class="section who-attend-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="who-attend-title reveal-right">Who Should Attend</h2>
                    <span class="title-accent reveal-on-scroll delay-100" style="margin: 0 auto;"></span>
                    
                    <p class="who-attend-subtitle reveal-bottom delay-300 mx-auto mt-3" 
                       style="font-size: 1.45rem; line-height: 1.6; color: #444; font-weight: 500;">
                        Target audience includes founders, investors, policymakers and institutions shaping innovation and growth.
                    </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 reveal-on-scroll delay-100">
                    <div class="img-container-advanced">
                        <img 
                            src="{{ asset('images/event/about.jpg') }}" 
                            alt="Who Should Attend"
                            class="img-fluid who-attend-image"
                        >
                    </div>
                </div>
                <div class="col-lg-6 reveal-on-scroll delay-300">
                    <div class="attendee-list-wrapper">
                        <ul class="who-attend-list">
                            <li>
                                <span class="list-icon"><i class="mdi mdi-rocket-launch"></i></span>
                                Founders and startup teams (Seed → Series A)
                            </li>
                            <li>
                                <span class="list-icon"><i class="mdi mdi-bank"></i></span>
                                Institutional and angel investors, DFIs and family offices
                            </li>
                            <li>
                                <span class="list-icon"><i class="mdi mdi-briefcase-check"></i></span>
                                Diaspora investors and business professionals
                            </li>
                            <li>
                                <span class="list-icon"><i class="mdi mdi-scale-balance"></i></span>
                                Policymakers, regulators and development partners
                            </li>
                            <li>
                                <span class="list-icon"><i class="mdi mdi-school"></i></span>
                                Universities, innovation hubs and corporates seeking partnerships
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    .who-attend-section { background: #fdfdfd; padding: 100px 0; }
    .who-attend-title { font-size: 42px; font-weight: 800; color: #0b1c39; margin-bottom: 10px; }
    .who-attend-subtitle { max-width: 800px; }
    
    .img-container-advanced {
        position: relative;
        padding: 15px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        transform: rotate(-2deg);
        transition: transform 0.5s;
    }
    .img-container-advanced:hover { transform: rotate(0deg); }
    .who-attend-image { border-radius: 15px; width: 100%; object-fit: cover; }

    .attendee-list-wrapper { padding-left: 20px; }
    .who-attend-list { list-style: none; padding: 0; }
    .who-attend-list li {
        display: flex; align-items: center;
        background: #fff;
        padding: 15px 20px;
        margin-bottom: 15px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        font-weight: 600; font-size: 18px; color: #333;
        transition: transform 0.3s;
    }
    .who-attend-list li:hover { transform: translateX(10px); background: linear-gradient(90deg, #fff, #f9f9f9); border-left: 4px solid #6a0dad; }
    .list-icon {
        width: 40px; height: 40px; background: rgba(106, 13, 173, 0.1);
        color: #6a0dad; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin-right: 15px; font-size: 20px;
    }
    </style>
  <style>
/* SPECIFICITY WRAPPER: Limits styles to this section ONLY */
#exclusive-speaker-section {
    padding: 100px 0 !important;
    background-color: #ffffff !important;
    overflow: hidden !important;
    position: relative !important;
}

/* TWO TITLES STYLING */
#exclusive-speaker-section .subtitle-accent {
    color: #444 !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: 2px !important;
    font-size: 0.9rem !important;
    display: block !important;
    margin-bottom: 10px !important;
}

#exclusive-speaker-section .main-title-black {
    font-family: 'Arial Black', Gadget, sans-serif !important;
    font-weight: 900 !important;
    font-size: 2.8rem !important;
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
    text-transform: uppercase !important;
    margin-bottom: 50px !important;
    letter-spacing: -1px !important;
    line-height: 1 !important;
}

/* FLEXBOX FOR EQUAL CARD HEIGHTS */
#exclusive-speaker-section .speaker-flex-row {
    display: flex !important;
    flex-wrap: wrap !important;
}

#exclusive-speaker-section .speaker-flex-col {
    display: flex !important; /* Forces cards to stretch vertically */
    margin-bottom: 30px !important;
}

/* INTERACTIVE CARD */
#exclusive-speaker-section .speaker-card-v3 {
    background: #ffffff !important;
    border-radius: 20px !important;
    padding: 40px 30px !important;
    width: 100% !important;
    text-align: center !important;
    border: 1px solid #eee !important;
    box-shadow: 0 10px 30px rgba(0,0,0,0.03) !important;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
    
    /* Animation Start State (Left) */
    opacity: 0 !important;
    transform: translateX(-100px) !important;
}

/* Visible Animation State */
#exclusive-speaker-section .speaker-card-v3.animate-in {
    opacity: 1 !important;
    transform: translateX(0) !important;
}

/* HOVER EFFECTS */
#exclusive-speaker-section .speaker-card-v3:hover {
    transform: translateY(-15px) !important;
    box-shadow: 0 20px 50px rgba(0,0,0,0.12) !important;
    border-color: #000000 !important;
}

/* AVATAR UI */
#exclusive-speaker-section .img-container {
    position: relative !important;
    margin-bottom: 25px !important;
}

#exclusive-speaker-section .avatar-v3 {
    width: 140px !important;
    height: 140px !important;
    object-fit: cover !important;
    border-radius: 50% !important;
    border: 5px solid #f8f9fa !important;
    transition: transform 0.5s ease !important;
}

#exclusive-speaker-section .speaker-card-v3:hover .avatar-v3 {
    transform: scale(1.1) rotate(3deg) !important;
    border-color: #000000 !important;
}

/* TEXT CONTENT */
#exclusive-speaker-section .name-v3 {
    color: #000000 !important;
    font-weight: 900 !important;
    font-size: 1.4rem !important;
    margin-bottom: 5px !important;
}

#exclusive-speaker-section .role-v3 {
    color: #666 !important;
    font-weight: 600 !important;
    font-size: 0.9rem !important;
    text-transform: uppercase !important;
}

/* SOCIAL MEDIA UI */
#exclusive-speaker-section .social-box {
    margin-top: 20px !important;
    display: flex !important;
    justify-content: center !important;
    gap: 12px !important;
    opacity: 0 !important; /* Hidden until hover */
    transform: translateY(10px) !important;
    transition: all 0.4s ease !important;
}

#exclusive-speaker-section .speaker-card-v3:hover .social-box {
    opacity: 1 !important;
    transform: translateY(0) !important;
}

#exclusive-speaker-section .social-btn {
    width: 38px !important;
    height: 38px !important;
    background: #000 !important;
    color: #fff !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-decoration: none !important;
    transition: 0.3s !important;
}

#exclusive-speaker-section .social-btn:hover {
    background: #333 !important;
    transform: scale(1.2) !important;
}
</style>


    <section class="sponsors-advanced" id="sponsors-section">
    <div class="container">

        <div class="section-header">
            <h2>Sponsors</h2>
            <span class="sponsor-accent-line"></span>
        </div>

        @php
            $platinum = $sponsors->where('level', 'Platinum');
            $gold = $sponsors->where('level', 'Gold');
            $silver = $sponsors->where('level', 'Silver');
            $totalSponsors = $platinum->count() + $gold->count() + $silver->count();
        @endphp

        @if($totalSponsors > 0)

            @if($platinum->count() > 0)
                <h3 class="tier-title platinum-text">Platinum Sponsors</h3>
                <div class="sponsor-grid">
                    @foreach($platinum as $sp)
                        <div class="sponsor-card platinum">
                            <div class="glow"></div>
                            <img src="{{ asset('storage/' . $sp->logo_path) }}" alt="{{ $sp->company_name }}">
                        </div>
                    @endforeach
                </div>
            @endif

            @if($gold->count() > 0)
                <h3 class="tier-title gold-text">Gold Sponsors</h3>
                <div class="sponsor-grid">
                    @foreach($gold as $sp)
                        <div class="sponsor-card gold">
                            <img src="{{ asset('storage/' . $sp->logo_path) }}" alt="{{ $sp->company_name }}">
                        </div>
                    @endforeach
                </div>
            @endif

            @if($silver->count() > 0)
                <h3 class="tier-title silver-text">Silver Sponsors</h3>
                <div class="sponsor-grid">
                    @foreach($silver as $sp)
                        <div class="sponsor-card silver">
                            <img src="{{ asset('storage/' . $sp->logo_path) }}" alt="{{ $sp->company_name }}">
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- ====== CONTACT BAR (shown when sponsors are posted) ====== --}}
            <p class="sponsor-contact-tagline">Proudly supported by Africa's leading innovators &amp; investors</p>
            <div class="sponsor-contact-bar">
                <a href="mailto:summit@wennovate.africa" class="sponsor-contact-pill">
                    <span class="scp-icon"><i class="fas fa-envelope"></i></span>
                    <span class="scp-body">
                        <small>EMAIL US</small>
                        summit@wennovate.africa
                    </span>
                </a>
                <a href="tel:+251967446447" class="sponsor-contact-pill">
                    <span class="scp-icon"><i class="fas fa-phone-alt"></i></span>
                    <span class="scp-body">
                        <small>CALL US</small>
                        +251 96 744 6447
                    </span>
                </a>
            </div>

        @else

            {{-- ====== INVITATION CARD (no sponsors posted) ====== --}}
            <div class="sponsor-invite-wrap">
                <p class="invite-headline">
                    Shape Africa's most powerful startup summit.<br>
                    <span>Be the brand behind the breakthrough.</span>
                </p>
                <p class="invite-sub">
                    Sponsoring Wennovate Africa Summit 2026 puts your brand in front of 500+ founders,
                    investors &amp; policymakers from across the continent. Limited slots — reach out today.
                </p>
                <div class="invite-contacts">
                    <a href="mailto:summit@wennovate.africa" class="invite-contact-link">
                        <i class="fas fa-envelope"></i>
                        summit@wennovate.africa
                    </a>
                    <a href="tel:+251967446447" class="invite-contact-link phone">
                        <i class="fas fa-phone-alt"></i>
                        +251 96 744 6447
                    </a>
                </div>
            </div>

        @endif

    </div>
</section>

<style>
/* ===== SPONSORS SECTION ===== */
.sponsors-advanced {
    padding: 100px 20px;
    background: linear-gradient(135deg, #0f0f1a, #1a1a2e);
    color: #fff;
    font-family: 'Inter', sans-serif;
}

/* Header */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-header h2 {
    font-size: 44px;
    font-weight: 800;
    background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 14px;
}

.sponsor-accent-line {
    display: block;
    width: 55px;
    height: 4px;
    background: linear-gradient(90deg, #6a0dad, #FFD700);
    border-radius: 10px;
    margin: 0 auto;
}

/* Tier Titles */
.tier-title {
    text-align: center;
    font-size: 18px;
    letter-spacing: 4px;
    margin-bottom: 40px;
    text-transform: uppercase;
}

.platinum-text { color: #c77dff; }
.gold-text     { color: #FFD700; }
.silver-text   { color: #C0C0C0; }

/* Grid */
.sponsor-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
    margin-bottom: 80px;
}

/* Card Base */
.sponsor-card {
    position: relative;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(20px);
    padding: 30px;
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.5s ease;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.08);
}

.sponsor-card img {
    max-height: 160px;
    max-width: 100%;
    filter: grayscale(1);
    opacity: 0.7;
    transition: 0.4s ease;
}

.sponsor-card:hover img {
    filter: grayscale(0);
    opacity: 1;
    transform: scale(1.15);
}

.sponsor-card:hover { transform: translateY(-15px) scale(1.03); }

.platinum .glow {
    position: absolute;
    width: 300%; height: 300%;
    background: radial-gradient(circle, rgba(199,125,255,0.4) 0%, transparent 60%);
    animation: rotateGlow 6s linear infinite;
}

.platinum:hover { box-shadow: 0 0 40px rgba(199,125,255,0.6); }
.gold:hover     { box-shadow: 0 0 30px rgba(255,215,0,0.6); }
.silver:hover   { box-shadow: 0 0 25px rgba(192,192,192,0.5); }

@keyframes rotateGlow {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}

/* ===== INVITATION CARD (simplified) ===== */
.sponsor-invite-wrap {
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
    padding: 60px 50px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255, 215, 0, 0.15);
    border-radius: 28px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}

.invite-headline {
    font-size: 2rem;
    font-weight: 800;
    line-height: 1.35;
    color: #fff;
    margin-bottom: 20px;
}

.invite-headline span {
    background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.invite-sub {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.65);
    line-height: 1.8;
    margin-bottom: 40px;
    max-width: 560px;
    margin-left: auto;
    margin-right: auto;
}

.invite-contacts {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 16px;
}

.invite-contact-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 30px;
    border-radius: 50px;
    font-size: 1rem;
    font-weight: 700;
    text-decoration: none;
    background: linear-gradient(135deg, #6a0dad, #9b59b6);
    color: #fff;
    transition: all 0.3s ease;
    box-shadow: 0 6px 20px rgba(106,13,173,0.35);
    letter-spacing: 0.2px;
}

.invite-contact-link.phone {
    background: linear-gradient(135deg, #b8860b, #FFD700);
    color: #000;
    box-shadow: 0 6px 20px rgba(255,215,0,0.25);
}

.invite-contact-link:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 35px rgba(106,13,173,0.5);
    color: #fff;
}

.invite-contact-link.phone:hover {
    box-shadow: 0 14px 35px rgba(255,215,0,0.45);
    color: #000;
}

/* ===== SPONSOR CONTACT BAR (when sponsors posted) ===== */
.sponsor-contact-tagline {
    text-align: center;
    color: rgba(255,255,255,0.55);
    font-size: 0.95rem;
    letter-spacing: 0.5px;
    margin-top: 60px;
    margin-bottom: 20px;
}

.sponsor-contact-bar {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 10px;
}

.sponsor-contact-pill {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    background: #1a1a2e;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 60px;
    padding: 16px 30px;
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease;
    min-width: 260px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.4);
}

.sponsor-contact-pill:hover {
    background: #252545;
    transform: translateY(-4px);
    box-shadow: 0 14px 35px rgba(0,0,0,0.5);
    color: #fff;
}

.scp-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: linear-gradient(135deg, #6a0dad, #FFD700);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
    color: #fff;
}

.scp-body {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.scp-body small {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.55);
    line-height: 1;
}

.scp-body {
    font-size: 1rem;
    font-weight: 700;
    color: #FFD700;
    line-height: 1.3;
}

/* Responsive */
@media(max-width: 992px) {
    .sponsor-grid { grid-template-columns: 1fr; }
    .sponsor-invite-wrap { padding: 40px 25px; }
    .invite-headline { font-size: 1.55rem; }
    .invite-contacts { flex-direction: column; align-items: center; }
    .invite-contact-link { width: 100%; justify-content: center; }
    .sponsor-contact-bar { flex-direction: column; align-items: center; }
    .sponsor-contact-pill { width: 100%; max-width: 320px; justify-content: flex-start; }
}
</style>
    
    <section class="partners-marquee" style="background: #f8fafc; padding: 30px 0;">
        <div class="container">
             <h4 class="text-center mb-4 reveal-on-scroll" style="font-weight: 800; font-size: 2rem; color: #000;">Partners</h4>
        </div>
        
        <div class="sponsor-video-frame reveal-on-scroll delay-200">
            <div class="sponsor-video-track">
                @foreach($postedPartners as $pp)
                    @if($pp->logo_path)
                        <div class="sponsor-logo"><img src="{{ asset('storage/' . $pp->logo_path) }}" alt="{{ $pp->company_name }}"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <style>
    /* Compacted Marquee Styles - WIDTH MINIMIZED to 80% */
    .sponsor-video-frame { 
        max-width: 80%; 
        margin: 0 auto; 
        overflow: hidden; 
        position: relative; 
        padding: 15px 0;
        border-radius: 20px;
        mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }
    .sponsor-video-track { display: flex; align-items: center; gap: 40px; width: max-content; animation: videoSlide 28s linear infinite; }
    .sponsor-logo { padding: 18px 30px; border-radius: 60px; background: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
    .sponsor-logo img { height: 65px; filter: grayscale(100%); opacity: 0.85; }
    @keyframes videoSlide { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    </style>

   
<section class="section bg-cta jarallax" data-jarallax data-speed="0.5" style="background: url('{{ asset('images/event/cta.jpg') }}') center center;" id="cta">
        <div class="bg-overlay bg-primary bg-gradient" style="opacity: 0.85;"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h4 class="title title-dark text-white mb-4">Digital International Conference 2021</h4>
                        <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn  mt-4 lightbox">
                            <i data-feather="play" class="fea icon-ex-md text-white title-dark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="past-events" class="pe-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="pe-title reveal-on-scroll">Past Events</h2>
                    <span class="pe-accent reveal-on-scroll delay-100" style="margin: 0 auto;"></span>
                </div>
            </div>
            <div class="row pe-grid g-4">
                <div class="col-lg-6 col-md-6 pe-item reveal-on-scroll delay-100 d-flex">
                    <a href="{{ url('/past-event-1') }}" class="pe-card">
                        <div class="pe-img-wrap">
                            <img src="{{ asset('images/contact-detail.jpg') }}" alt="Event 2">
                            <div class="pe-date-badge">MAY 2020</div>
                        </div>
                        <div class="pe-content">
                            <h4>Hack Africa — The Hackathon</h4>
                            <p>Digital African Innovation 2020.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 pe-item reveal-on-scroll delay-200 d-flex">
                    <a href="{{ url('/past-event-2') }}" class="pe-card">
                        <div class="pe-img-wrap">
                            <img src="{{ asset('images/contact-detail.jpg') }}" alt="Event 3">
                            <div class="pe-date-badge">2023-2025</div>
                        </div>
                        <div class="pe-content">
                            <h4>Wennovate Africa – Nordic Dialogue</h4>
                            <p>Oslo Innovation Week Partnership.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <style>
        .pe-section { padding: 90px 0; background: #fff; }
        .pe-title { font-size: 49px; font-weight: 800; margin-bottom: 10px; color: #0b1c39; }
        .pe-accent { width: 70px; height: 5px; background: #f57c00; display: block; border-radius: 10px; margin-bottom: 30px; }
        
        /* MODIFIED: EQUAL HEIGHT CARDS 
        */
        .pe-card {
            display: flex; /* Changed from block to flex */
            flex-direction: column; /* Stack content vertically */
            width: 100%; /* Fill the column width */
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-decoration: none;
            background: #fff;
            transition: all 0.4s ease;
            position: relative;
            height: 100%; /* Ensure it fills the flex container */
        }
        .pe-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(106, 13, 173, 0.2);
        }
        
        .pe-img-wrap {
            position: relative;
            height: 250px;
            overflow: hidden;
            flex-shrink: 0; /* Prevent image from shrinking */
        }
        .pe-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }
        .pe-card:hover .pe-img-wrap img {
            transform: scale(1.1);
        }
        
        .pe-date-badge {
            position: absolute;
            top: 15px; left: 15px;
            background: #FFD700;
            color: #000;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            z-index: 2;
        }

        .pe-content {
            padding: 25px;
            background: #fff;
            position: relative;
            z-index: 2;
            flex-grow: 1; /* Pushes content to fill height uniformly */
        }
        .pe-content h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0b1c39;
            margin-bottom: 8px;
            transition: color 0.3s;
        }
        .pe-card:hover .pe-content h4 {
            color: #6a0dad;
        }
        .pe-content p {
            font-size: 0.95rem;
            color: #777;
            margin: 0;
        }
        </style>
    </section>

    <section class="section upcoming-events-ultra">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="pe-title reveal reveal-left">Upcoming Events</h2>
            <span class="pe-accent reveal reveal-left" style="margin: 0 auto 30px;"></span>
        </div>

        <div class="row justify-content-start">
            <div class="col-lg-6 col-md-8">
                <div class="event-card reveal">
                    <div class="event-image">
                        <img src="{{ asset('images/contact-detail.jpg') }}">
                        <div class="event-date">
                            <span>15</span>
                            <small>JUNE</small>
                        </div>
                    </div>
                    <div class="event-content">
                        <h4 style="color: #0b1c39;">Nairobi Tech Mixer</h4>
                        <p style="color: #444;">Connect with Africa’s leading founders and investors shaping the next tech revolution.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* SECTION */
.upcoming-events-ultra {
    position: relative;
    padding: 100px 20px;
    background: #f8fafc;
    overflow: hidden;
}

/* Title */
.section-title {
    font-size: 48px;
    font-weight: 800;
    background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.section-line {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg,#a855f7,#f97316);
    margin: 15px auto;
    border-radius: 50px;
}

/* Grid */
.events-grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 40px;
}

/* Card */
.event-card {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(25px);
    border-radius: 30px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.1);
    transition: 0.4s ease;
    transform-style: preserve-3d;
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

.event-card:hover {
    transform: translateY(-5px);
    border: 1px solid rgba(0,0,0,0.1);
    box-shadow: 0 30px 60px rgba(0,0,0,0.15);
}

/* Image */
.event-image { position: relative; height: 240px; overflow: hidden; }
.event-image img { width: 100%; height: 100%; object-fit: cover; transition: 0.6s; }
.event-card:hover img { transform: scale(1.15); }

/* Date Badge */
.event-date {
    position: absolute;
    top: 20px;
    left: 20px;
    background: #FFD700;
    padding: 14px;
    border-radius: 15px;
    text-align: center;
    color: #000;
    font-weight: bold;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}
.event-date span { font-size: 20px; display: block; }

/* Content */
.event-content {
    padding: 35px;
    color: #e2e8f0;
}
.event-content h4 { font-size: 1.5rem; margin-bottom: 15px; }
.event-content p {
    opacity: 0.9;
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 25px;
}

/* Reveal Animation */
.reveal {
    opacity: 0;
    transform: translateY(60px);
    transition: opacity 1s ease, transform 1s ease;
}

.reveal.active { opacity: 1; transform: translateY(0); }

/* Responsive */
@media(max-width:992px){ .events-grid { grid-template-columns: 1fr; } }
	
	
    .content-wrap { padding: 25px; }
    .content-wrap h4 { font-size: 1.35rem; font-weight: 700; color: #0b1c39; margin-bottom: 15px; }
    .content-wrap p { font-size: 1rem; line-height: 1.6; margin: 0; }
</style>

<script>
/* Scroll Reveal */
window.addEventListener("scroll", function() {
    const reveals = document.querySelectorAll(".upcoming-events-ultra .reveal");
    const windowHeight = window.innerHeight;

    reveals.forEach((el, index) => {
        const elementTop = el.getBoundingClientRect().top;
        if(elementTop < windowHeight - 100){
            setTimeout(() => { el.classList.add("active"); }, index * 300);
        }
    });
});
</script>
   

    <section class="section bg-light" id="faq">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="faq-title reveal-on-scroll delay-300" style="font-size: 42px; font-weight: 800; color: #0b1c39;">Frequently Asked Questions</h2>
                    <span class="title-accent reveal-on-scroll delay-400" style="display:inline-block; width:70px; height:4px; background:#f57c00; border-radius:10px; margin-bottom:25px;"></span>
                </div>
            </div>

            <div class="accordion reveal-on-scroll delay-200" id="faqAccordion">
                <div class="accordion-item mb-3 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            When and where is the Summit?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body about-font">May 27–30, 2026 — Addis Ababa, Ethiopia (venue TBC).</div>
                    </div>
                </div>
                <div class="accordion-item mb-3 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            How do I apply to pitch in the Ubora Challenge?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body about-font">Applications open on the Summit website. Selected teams proceed to sector heats, semis, and finals.</div>
                    </div>
                </div>
                 <div class="accordion-item mb-3 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Who is the Summit for?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body about-font">Startups, investors, diaspora professionals, policymakers, corporates, and ecosystem builders.</div>
                    </div>
                </div>
                 <div class="accordion-item mb-3 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            What is the Ubora Challenge?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body about-font">A pan-African pitching competition spotlighting investable startups.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .accommodation-advanced { 
            padding: 100px 0; 
            background: #ffffff; 
            overflow: hidden; 
            position: relative; 
        }
        .accom-subtitle {
            color: #6a0dad;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.95rem;
            display: block;
            margin-bottom: 10px;
        }
        .section-title-adv { 
            font-size: 3.2rem; 
            font-weight: 800; 
            color: #0b1c39; 
            line-height: 1.2; 
        }
        .section-line-left { 
            width: 80px; 
            height: 5px; 
            background: linear-gradient(90deg, #6a0dad, #FFD700); 
            border-radius: 10px; 
            margin-top: 15px; 
        }
        .accom-text { 
            font-size: 1.15rem; 
            color: #555; 
            line-height: 1.8; 
        }
        .btn-explore-adv { 
            background: linear-gradient(135deg, #0b1c39, #1E3A8A); 
            color: #fff !important; 
            padding: 14px 35px; 
            border-radius: 50px; 
            font-size: 1.1rem;
            font-weight: 700; 
            transition: all 0.4s ease; 
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(30, 58, 138, 0.2); 
            text-decoration: none;
        }
        .btn-explore-adv:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 15px 30px rgba(30, 58, 138, 0.4); 
            background: linear-gradient(135deg, #6a0dad, #1E3A8A); 
            color: #FFD700 !important; 
        }
        .accom-image-wrapper { 
            position: relative; 
            z-index: 1; 
            border-radius: 25px; 
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .accom-image-wrapper:hover { 
            transform: scale(1.03) rotate(-1deg); 
        }
        .img-rounded-custom { 
            border-radius: 25px; 
            width: 100%;
            object-fit: cover;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }
        .accom-glow { 
            position: absolute; 
            width: 100%; 
            height: 100%; 
            background: linear-gradient(135deg, #6a0dad, #FFD700); 
            top: 25px; 
            right: -25px; 
            border-radius: 25px; 
            z-index: -1; 
            opacity: 0.35; 
            filter: blur(25px); 
            transition: opacity 0.5s ease;
        }
        .accom-image-wrapper:hover .accom-glow {
            opacity: 0.6;
        }
        .floating-badge { 
            position: absolute; 
            bottom: 40px; 
            left: -40px; 
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(15px); 
            padding: 18px 30px; 
            border-radius: 20px; 
            font-weight: 800; 
            font-size: 1.1rem;
            color: #0b1c39; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            animation: floatBadge 5s ease-in-out infinite; 
            border: 1px solid rgba(255,255,255,0.4);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .floating-badge i { font-size: 1.5rem; color: #FFD700; }
        @keyframes floatBadge { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-15px); } }
        
        @media (max-width: 991px) { 
            .section-title-adv { font-size: 2.5rem; }
            .floating-badge { left: 20px; bottom: -20px; padding: 12px 20px; font-size: 1rem; }
            .accom-glow { right: -10px; top: 15px; filter: blur(15px); }
        }
    </style>

    <section class="accommodation-advanced">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 reveal-left">
                    <span class="accom-subtitle">Where To Stay</span>
                    <h2 class="section-title-adv">Accommodation</h2>
                    <div class="section-line-left"></div>
                    
                    <p class="accom-text mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    
                    <a href="https://v0-omnia-destination.vercel.app/packages" target="_blank" class="btn btn-explore-adv mt-4">
                        Explore Packages <i class="mdi mdi-arrow-right"></i>
                    </a>
                </div>
                
                <div class="col-lg-6 reveal-right">
                    <div class="accom-image-wrapper">
                        <img src="{{ asset('images/contact-detail.jpg') }}" alt="Event 1" class="img-rounded-custom">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section newsletter-advanced mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="newsletter-card reveal-on-scroll">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h4 class="newsletter-title mb-2" style="color: #fff; background: none; -webkit-text-fill-color: initial;">Stay Updated</h4>
                                <p class="text-white-80 mb-0" style="opacity:0.9; font-size: 1.1rem; font-weight: 400 !important;">Join our community. We provide news, updates, and exclusive offers straight to your inbox.</p>
                            </div>
                            <div class="col-md-5 mt-4 mt-md-0">
                                <form id="stayUpdatedForm" class="newsletter-form">
                                    <div class="input-group-custom">
                                        <input name="email" id="stayUpdatedEmail" type="email" class="form-control-adv" placeholder="Enter your email" required>
                                        <button id="stayUpdatedBtn" class="btn btn-subscribe-adv" type="submit">Subscribe</button>
                                    </div>
                                    <div id="stayUpdatedFeedback" style="display:none; padding: 10px; border-radius: 25px; margin-top: 10px; font-size: 0.9rem; font-weight: bold; text-align: center;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="glow-effect"></div>
                        <div class="decorative-circle circle-1"></div>
                        <div class="decorative-circle circle-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    /* MODIFIED: Advanced Glassmorphism & Gradient UI for Newsletter */
    .newsletter-advanced { padding: 60px 0; position: relative; } /* Reduced padding from 80px to 60px */
    .newsletter-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(30, 58, 138, 0.85));
        padding: 45px 50px; /* MODIFIED: Reduced padding inside the card to make it smaller */
        border-radius: 30px;
        position: relative;
        overflow: hidden;
        color: #fff;
        box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255,255,255,0.15);
        transition: transform 0.4s ease;
    }
    
    .newsletter-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 40px 80px -12px rgba(106, 13, 173, 0.3);
        border-color: rgba(255, 215, 0, 0.3);
    }
    
    .newsletter-title { 
        font-size: 2.5rem; 
        font-weight: 900; 
        letter-spacing: -1px;
        /* UPDATED: Solid white as requested */
        color: #fff !important;
        margin-bottom: 10px;
    }

    .input-group-custom {
        background: rgba(255,255,255,0.08);
        padding: 6px; /* slightly thicker padding to house the button curve nicely */
        border-radius: 50px;
        border: 1px solid rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        position: relative;
        backdrop-filter: blur(10px);
    }
    
    .form-control-adv {
        background: transparent;
        border: none;
        color: #fff;
        padding-left: 20px; 
        padding-right: 15px; /* Add right padding so text doesn't hit button */
        height: 46px; /* slightly taller */
        flex: 1 1 auto; 
        width: 100%;
        outline: none;
        font-size: 1rem; 
        font-weight: 400;
    }
    .form-control-adv::placeholder { color: #fff; opacity: 1; }
    
    .btn-subscribe-adv {
        background: linear-gradient(135deg, #FFD700, #F57C00);
        color: #000;
        border: none;
        height: 46px; /* Match the height */
        margin-left: 0;
        padding: 0 25px; /* Wider padding */
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        flex-shrink: 0; 
    }
    .btn-subscribe-adv:hover { 
        transform: scale(1.05); 
        background: linear-gradient(135deg, #fff, #f0f0f0); 
        color: #6a0dad; 
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4);
    }
    
    /* Animations & Deco */
    .glow-effect {
        position: absolute;
        width: 100px;
        height: 200%;
        top: -50%;
        left: -150px;
        background: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.05), rgba(255,255,255,0));
        transform: skewX(-20deg);
        animation: sheen 6s infinite;
        pointer-events: none;
    }
    @keyframes sheen { 0% { left: -150px; } 20% { left: 150%; } 100% { left: 150%; } }

    .decorative-circle { position: absolute; border-radius: 50%; pointer-events: none; }
    .circle-1 { 
        width: 400px; height: 400px; top: -150px; left: -100px; 
        background: radial-gradient(circle, rgba(106, 13, 173,0.3) 0%, transparent 70%);
        opacity: 0.6; 
    }
    .circle-2 { 
        width: 300px; height: 300px; bottom: -100px; right: -50px; 
        background: radial-gradient(circle, rgba(255,215,0,0.2) 0%, transparent 70%);
        opacity: 0.5; 
    }
    </style>
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
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/agenda') }}">Program</a></li>
                    <li><a href="{{ url('/what-to-expect') }}">What to Expect</a></li>
                    <li><a href="{{ url('/ubora-challenge') }}">Ubora Challenge</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
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
                    <input type="email" id="newsletterEmail" placeholder="Enter your email" required pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address (e.g., name@domain.com)">
                    <button type="submit" id="newsletterBtn">Subscribe</button>
                </form>
                <div id="newsletterFeedback" style="display:none; margin-top:10px; font-size: 0.95rem; border-radius:10px; padding: 10px;"></div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 Wennovate Africa Summit. All Rights Reserved. 
        </div>
    </footer>

    <style>
    /* ================= ULTRA-ADVANCED SINGLE ROW FOOTER CSS ================= */
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
        /* TABLETS AND SMALLER (Max 991px) */
        @media (max-width: 991px) {
            /* Navbar Fixes */
            header#topnav .logo img {
                left: 0 !important; /* Fix off-screen logo */
                max-width: 150px;
            }
            .navigation-menu li a {
                font-size: 1.3rem !important; 
            }
            #navigation {
                padding-bottom: 20px;
            }
            
            /* Footer */
            .footer-container {
                flex-direction: column !important;
                align-items: center;
                gap: 40px;
            }
            .footer-links, .footer-contact, .footer-newsletter {
                margin-left: 0 !important;
                width: 100%;
                text-align: center;
            }
            .foot-social-icon {
                justify-content: center;
            }
            .footer-newsletter form {
                flex-direction: column;
            }
            .footer-newsletter button {
                width: 100%;
            }

            /* Speaker Section Flex Fix */
            #exclusive-speaker-section .speaker-flex-row {
                flex-direction: row !important;
            }
            #exclusive-speaker-section .speaker-flex-col {
                width: 50%; /* 2 per row on tablet */
            }
        }

        /* PHONES (Max 767px) */
        @media (max-width: 767px) {
            /* Hero Section */
            h1.display-3 {
                font-size: 2.2rem !important;
                line-height: 1.2;
            }
            .para-desc {
                font-size: 1.1rem !important;
                padding: 0 15px;
            }
            .count-box {
                min-width: 70px;
                padding: 10px;
            }
            .count-num {
                font-size: 1.8rem;
            }
            
            /* Early Bird Badge Mobile Fix */
            .early-bird-hero {
                position: relative !important;
                top: auto !important;
                left: auto !important;
                transform: none !important;
                margin: 20px auto;
                display: inline-flex;
            }

            /* About Titles */
            .about-title, .who-attend-title, .summit-title, .section-title, .pe-title {
                font-size: 2rem !important;
            }
            .about-text, .summit-subtitle-container p {
                font-size: 1.1rem !important;
            }

            /* Objectives & Speakers */
            .obj-card {
                margin-bottom: 20px;
            }
            #exclusive-speaker-section .speaker-flex-col {
                width: 100%; /* 1 per row on phone */
            }
            
            /* Schedule/Program */
            .schedule-flex {
                flex-direction: column;
            }
            .schedule-date {
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                gap: 15px;
                text-align: left;
            }
            .schedule-date .day {
                font-size: 2.5rem;
            }
            .schedule-date .month {
                font-size: 1rem;
            }

            /* Who Should Attend */
            .who-attend-list li {
                font-size: 1rem;
                padding: 12px;
            }
            
            /* Partners Marquee */
            .sponsor-video-frame {
                max-width: 100%;
            }
            .sponsor-video-track {
                gap: 20px;
            }

            /* Newsletter */
            .newsletter-card {
                padding: 30px 20px;
            }
            .newsletter-title {
                font-size: 1.8rem;
                text-align: center;
            }
            .text-white-80 {
                text-align: center;
                margin-bottom: 20px !important;
            }
            
            /* Events Grid */
            .events-grid, .pe-grid {
                grid-template-columns: 1fr !important;
            }
            
            /* CTA Video Button */
            .play-btn {
                margin-top: 10px !important;
            }
        }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting){
                    entry.target.classList.add("active");
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        // Select all elements with reveal classes
        document.querySelectorAll('.reveal-on-scroll, .reveal-left, .reveal-right, .reveal-bottom').forEach(el => observer.observe(el));
    });

    // SCROLL LISTENER FOR NAVBAR COLOR CHANGE
    window.addEventListener('scroll', function() {
        var nav = document.getElementById("topnav");
        // CHANGED: 50 is small enough to trigger "the moment you start scrolling"
        if (window.scrollY > 50) { 
            nav.classList.add("nav-scrolled");
        } else {
            nav.classList.remove("nav-scrolled");
        }
    });
    </script>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/libs/tobii/js/tobii.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Initialize Feather Icons globally -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>



    @stack('footer_scripts')
    @php // wp_footer() removed/converted @endphp


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
</script>



    @include('partials.cookie-banner')
</body>
</html>
