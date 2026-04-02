<?php
/**
 * Template Name: What To Expect
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >
    
    <title>
        What to Expect | Wennovate Africa
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
        /**
         * ============================================================
         * 7. ULTRA-ADVANCED SINGLE ROW FOOTER 
         * ============================================================
         */
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

        @keyframes wave { 
            0%,100% { 
                transform: translateX(-25%) translateY(0) rotate(0deg); 
            } 
            50% { 
                transform: translateX(25%) translateY(10px) rotate(3deg); 
            } 
        }

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

        @keyframes floatGlow { 
            0% { 
                transform: translate(0,0) rotate(45deg); 
            } 
            50% { 
                transform: translate(50px,50px) rotate(45deg); 
            } 
            100% { 
                transform: translate(0,0) rotate(45deg); 
            } 
        }

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

        .footer-brand { 
            flex: 1; 
            min-width: 220px; 
        }

        .footer-logo {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            line-height: 1.2;
            /* removed text shadow */
            animation: glowText 3s ease-in-out infinite alternate;
        }

        /* text shadow removed for transparent gradient */ 
            100% { 
                text-shadow: 0 0 30px rgba(59,130,246,1), 0 0 60px rgba(59,130,246,0.6); 
            } 
        }

        .footer-links { 
            flex: 1; 
            margin-left: 100px; 
        }

        .footer-links h4 { 
            font-size: 1.5rem; 
            margin-bottom: 15px; 
            background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; 
        }

        .foot-links { 
            list-style: none; 
            padding: 0; 
        }

        .foot-links li { 
            margin-bottom: 12px; 
        }

        .foot-links li a { 
            color: #fff; 
            opacity: 0.9; 
            text-decoration: none; 
            font-size: 1.15rem; 
            position: relative; 
            transition: all 0.3s ease; 
        }

        .foot-links li a::after { 
            content: ''; 
            position: absolute; 
            width: 0; 
            height: 2px; 
            bottom: -2px; 
            left: 0; 
            background: linear-gradient(90deg, #6a0dad, #FFD700); 
            transition: width 0.3s ease; 
        }

        .foot-links li a:hover::after { 
            width: 100%; 
        }

        .foot-links li a:hover { 
            color: #ffffff; 
            opacity: 1; 
        }

        .footer-contact { 
            flex: 1; 
        }

        .footer-contact h4 { 
            font-size: 1.5rem; 
            margin-bottom: 15px; 
            background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; 
        }

        .foot-contact { 
            list-style: none; 
            padding: 0; 
        }

        .foot-contact li { 
            margin-bottom: 12px; 
        }

        .foot-contact li a { 
            color: #fff; 
            font-size: 1.15rem; 
            opacity: 0.9; 
            text-decoration: none; 
            position: relative; 
            transition: all 0.3s ease; 
        }

        .foot-contact li a::after { 
            content: ''; 
            position: absolute; 
            width: 0; 
            height: 2px; 
            bottom: -2px; 
            left: 0; 
            background: linear-gradient(90deg, #6a0dad, #FFD700); 
            transition: width 0.3s ease; 
        }

        .foot-contact li a:hover::after { 
            width: 100%; 
        }

        .foot-contact li a:hover { 
            color: #ffffff; 
            opacity: 1; 
        }

        .footer-newsletter { 
            flex: 1; 
        }

        .footer-newsletter h4 { 
            font-size: 1.5rem; 
            margin-bottom: 15px; 
            background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; 
        }

        .footer-newsletter p { 
            font-size: 1.15rem; 
            margin-bottom: 20px; 
            opacity: 0.9; 
        }

        .footer-newsletter form { 
            display: flex; 
            gap: 10px; 
            background: rgba(255,255,255,0.05); 
            padding: 12px; 
            border-radius: 40px; 
        }

        .footer-newsletter input[type="email"] { 
            padding: 14px 18px; 
            border-radius: 30px; 
            border: none; 
            flex: 1; 
            outline: none; 
            font-size: 1.15rem; 
            background: rgba(255,255,255,0.1); 
            color: #fff; 
            transition: all 0.3s ease; 
        }

        .footer-newsletter input[type="email"]::placeholder { 
            color: rgba(255,255,255,0.7); 
        }

        .footer-newsletter input[type="email"]:focus { 
            background: rgba(255,255,255,0.15); 
            box-shadow: 0 0 18px rgba(59,130,246,0.9); 
        }

        .footer-newsletter button { 
            padding: 14px 28px; 
            border-radius: 30px; 
            border: none; 
            background: linear-gradient(90deg, #6a0dad, #FFD700); 
            color: #fff; 
            font-weight: 600; 
            font-size: 1.15rem; 
            cursor: pointer; 
            transition: all 0.3s ease; 
        }

        .footer-newsletter button:hover { 
            background: linear-gradient(90deg, #6a0dad, #FFD700); 
            transform: translateY(-2px) scale(1.05); 
            box-shadow: 0 5px 20px rgba(37,99,235,0.5); 
        }

        .footer-bottom { 
            text-align: center; 
            padding-top: 40px; 
            border-top: 1px solid rgba(255,255,255,0.1); 
            opacity: 0.9; 
            font-size: 1.05rem; 
        }

        .foot-social-icon { 
            list-style: none; 
            display: flex; 
            padding: 0; 
            gap: 20px; 
            margin-top: 25px; 
        }

        .foot-social-icon li a { 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            width: 55px; 
            height: 55px; 
            border-radius: 50%; 
            color: #fff; 
            background: #1E3A8A; 
            font-size: 1.4rem; 
            box-shadow: 0 0 18px rgba(59,130,246,0.3); 
            transition: all 0.3s ease; 
            position: relative; 
            overflow: hidden; 
        }

        .foot-social-icon li a::after { 
            content: ''; 
            position: absolute; 
            width: 100%; 
            height: 100%; 
            border-radius: 50%; 
            background: rgba(59,130,246,0.2); 
            transform: scale(0); 
            transition: all 0.4s ease; 
            z-index: 0; 
        }

        .foot-social-icon li a:hover::after { 
            transform: scale(1.5); 
            opacity: 0; 
        }

        .foot-social-icon li a:hover { 
            transform: scale(1.3) rotate(15deg); 
            background: #3B82F6; 
            color: #000; 
            box-shadow: 0 0 30px rgba(59,130,246,0.8); 
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
            .expect-hero { padding: 120px 15px 40px; }
            .expect-hero h1 { font-size: 2rem !important; }
            .cards-grid, .expect-grid { grid-template-columns: 1fr 1fr !important; }
        }
        @media (max-width: 576px) {
            .expect-hero h1 { font-size: 1.5rem !important; }
            .cards-grid, .expect-grid { grid-template-columns: 1fr !important; }
            section { padding: 40px 12px; }
        }
    
    </style>

    <style>
    /* ========== CORE VARIABLES & RESET ========== */
    :root {
        --dark-bg: #020617;
        --card-bg: rgba(255, 255, 255, 0.03);
        --card-border: rgba(255, 255, 255, 0.1);
        --card-hover-border: rgba(255, 215, 0, 0.5);
        --primary-gold: #FFD700;
        --primary-purple: #6a0dad;
        --text-main: #0f172a;
        --text-white: #ffffff;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: radial-gradient(circle at 50% 0%, #f1f5f9, #e2e8f0);
        color: var(--text-main);
        margin-top: 0;
        margin-right: 0;
        margin-bottom: 0;
        margin-left: 0;
        padding-top: 0;
        padding-right: 0;
        padding-bottom: 0;
        padding-left: 0;
        overflow-x: hidden;
    }

    /* ========== ANIMATION DEFINITIONS ========== */
    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes float-card {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    @keyframes shine-text {
        to { background-position: 200% center; }
    }

    @keyframes pulse-glow {
        0% { box-shadow: 0 0 0 0 rgba(106, 13, 173, 0.4); }
        70% { box-shadow: 0 0 0 15px rgba(106, 13, 173, 0); }
        100% { box-shadow: 0 0 0 0 rgba(106, 13, 173, 0); }
    }

    @keyframes orb-float {
        0%, 100% { transform: translate(0, 0); }
        25% { transform: translate(10px, -15px); }
        50% { transform: translate(-5px, 10px); }
        75% { transform: translate(-15px, -5px); }
    }

    /* ========== SECTION WRAPPER ========== */
    .summit-section {
        max-width: 1400px;
        margin-top: 0;
        margin-right: auto;
        margin-bottom: 0;
        margin-left: auto;
        padding-top: 140px;
        padding-right: 20px;
        padding-bottom: 100px;
        padding-left: 20px;
        position: relative;
    }

    /* Decorative Background Elements */
    .summit-section::before {
        content: '';
        position: absolute;
        top: 10%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(106,13,173,0.05) 0%, transparent 70%);
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
        z-index: -1;
        animation: orb-float 20s infinite ease-in-out;
    }

    .summit-section::after {
        content: '';
        position: absolute;
        bottom: 10%;
        right: -5%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255,215,0,0.08) 0%, transparent 70%);
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
        z-index: -1;
        animation: orb-float 25s infinite ease-in-out reverse;
    }

    /* ========== ADVANCED SECTION TITLE ========== */
    .section-header {
        text-align: center;
        margin-bottom: 80px;
        position: relative;
    }

    .section-title {
        font-size: 64px;
        font-weight: 900;
        letter-spacing: -2px;
        margin-bottom: 20px;
        background: linear-gradient(
            90deg, 
            #6a0dad 0%, 
            #2563EB 20%, 
            #FFD700 40%, 
            #ff0055 60%, 
            #6a0dad 80%,
            #2563EB 100%
        );
        background-size: 200% auto;
        color: #000;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine-text 5s linear infinite;
        text-shadow: 0px 10px 30px rgba(0,0,0,0.05);
        display: inline-block;
        position: relative;
    }

    .section-title::after {
        content: attr(data-text);
        position: absolute;
        left: 0;
        top: 0;
        z-index: -1;
        background: inherit;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: blur(25px);
        opacity: 0.4;
    }

    .section-subtitle {
        max-width: 700px;
        margin-top: 0;
        margin-right: auto;
        margin-bottom: 0;
        margin-left: auto;
        font-size: 20px;
        line-height: 1.8;
        color: #475569;
        font-weight: 500;
    }

    /* ========== ADVANCED "WHAT TO EXPECT" CARDS ========== */
    .cards-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
        perspective: 1000px; 
        padding-top: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
    }

    .expect-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-style: solid;
        border-color: rgba(255, 255, 255, 0.6);
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
        border-bottom-right-radius: 24px;
        border-bottom-left-radius: 24px;
        padding-top: 50px;
        padding-right: 30px;
        padding-bottom: 50px;
        padding-left: 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.4s ease;
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: 300px;
        max-width: 380px;
        min-width: 280px;
        box-shadow: 
            0 10px 30px -10px rgba(0,0,0,0.05),
            inset 0 0 0 1px rgba(255,255,255,0.5);
        animation: float-card 6s ease-in-out infinite;
    }
    
    .expect-card:nth-child(1) { animation-delay: 0s; }
    .expect-card:nth-child(2) { animation-delay: 1.5s; }
    .expect-card:nth-child(3) { animation-delay: 3s; }
    .expect-card:nth-child(4) { animation-delay: 0.5s; }
    .expect-card:nth-child(5) { animation-delay: 2s; }

    .expect-card::before {
        content: "";
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
        border-bottom-right-radius: 24px;
        border-bottom-left-radius: 24px;
        background: radial-gradient(
            800px circle at var(--mouse-x) var(--mouse-y),
            rgba(106, 13, 173, 0.1),
            transparent 40%
        );
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
        z-index: 1;
    }

    .expect-card::after {
        content: "";
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
        border-bottom-right-radius: 24px;
        border-bottom-left-radius: 24px;
        background: radial-gradient(
            600px circle at var(--mouse-x) var(--mouse-y),
            rgba(255, 215, 0, 0.4),
            transparent 40%
        );
        opacity: 0;
        z-index: 1;
        transition: opacity 0.5s ease;
        pointer-events: none;
        mix-blend-mode: overlay;
    }

    .expect-card:hover::before,
    .expect-card:hover::after {
        opacity: 1;
    }

    .expect-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 
            0 20px 50px rgba(0,0,0,0.1),
            0 0 0 2px rgba(106, 13, 173, 0.1);
        background: rgba(255, 255, 255, 0.95);
        z-index: 10;
        animation-play-state: paused;
    }

    .expect-icon-wrapper {
        width: 100px;
        height: 100px;
        margin-top: 0;
        margin-right: auto;
        margin-bottom: 30px;
        margin-left: auto;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        perspective: 1000px;
        z-index: 2;
    }

    .expect-icon i {
        font-size: 60px;
        background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
        transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275), filter 0.4s ease;
        transform-style: preserve-3d;
        filter: drop-shadow(0 10px 15px rgba(106, 13, 173, 0.2));
    }

    .expect-card:hover .expect-icon i {
        transform: rotateY(360deg) scale(1.2);
        background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 15px 25px rgba(255, 215, 0, 0.4));
    }

    .expect-icon-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(106,13,173,0.1), rgba(255,215,0,0.1));
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
        transform: scale(0.8);
        transition: all 0.5s ease;
        z-index: -1;
    }

    .expect-card:hover .expect-icon-bg {
        transform: scale(1.1);
        background: linear-gradient(135deg, rgba(106,13,173,0.2), rgba(255,215,0,0.2));
    }

    .expect-title {
        font-size: 24px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 15px;
        transition: color 0.3s ease;
        position: relative;
        z-index: 2;
    }
    
    .expect-card:hover .expect-title {
        color: #6a0dad;
    }

    .expect-desc {
        font-size: 18px;
        color: #64748b;
        line-height: 1.6;
        position: relative;
        z-index: 2;
    }

    /* ========== ADVANCED OUTCOMES SECTION ========== */
    .outcomes-section {
        margin-top: 120px;
        position: relative;
    }

    .outcomes-box {
        background: #0f172a;
        border-top-left-radius: 40px;
        border-top-right-radius: 40px;
        border-bottom-right-radius: 40px;
        border-bottom-left-radius: 40px;
        padding-top: 80px;
        padding-right: 40px;
        padding-bottom: 80px;
        padding-left: 40px;
        position: relative;
        overflow: hidden;
        color: white;
        box-shadow: 0 50px 100px -20px rgba(0,0,0,0.5);
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-style: solid;
        border-color: rgba(255,255,255,0.1);
    }

    .outcomes-box::before {
        content: '';
        position: absolute;
        top: 0; 
        left: 0; 
        right: 0; 
        bottom: 0;
        background-image: 
            linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        z-index: 0;
        mask-image: radial-gradient(circle at center, black 40%, transparent 100%);
    }

    .blob {
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #6a0dad, transparent 70%);
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
        opacity: 0.4;
        filter: blur(80px);
        animation: orb-float 15s infinite alternate;
        z-index: 0;
    }
    .blob-1 { top: -200px; left: -200px; background: radial-gradient(circle, #2563EB, transparent 70%); }
    .blob-2 { bottom: -200px; right: -200px; background: radial-gradient(circle, #FFD700, transparent 70%); }

    .outcomes-title {
        font-size: 42px;
        text-align: center;
        margin-bottom: 70px;
        font-weight: 800;
        position: relative;
        z-index: 2;
        background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .outcomes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 40px;
        position: relative;
        z-index: 2;
    }

    .outcome-item {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-style: solid;
        border-color: rgba(255, 255, 255, 0.1);
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
        border-bottom-right-radius: 24px;
        border-bottom-left-radius: 24px;
        padding-top: 40px;
        padding-right: 40px;
        padding-bottom: 40px;
        padding-left: 40px;
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .outcome-item:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-10px);
        border-color: rgba(255, 215, 0, 0.3);
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .outcome-icon-box {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.02));
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-style: solid;
        border-color: rgba(255,255,255,0.1);
        transition: all 0.4s ease;
    }

    .outcome-item:hover .outcome-icon-box {
        background: linear-gradient(135deg, #FFD700, #ff8c00);
        transform: rotate(10deg);
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.4);
    }

    .outcome-icon-box i {
        font-size: 32px;
        color: #fff;
        transition: all 0.3s ease;
    }
    
    .outcome-item:hover .outcome-icon-box i {
        color: #000;
        transform: scale(1.2);
    }

    .outcome-text {
        font-size: 20px;
        line-height: 1.7;
        color: #cbd5e1;
        font-weight: 500;
    }

    /* ========== SCROLL REVEAL UTILS ========== */
    .reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: all 1s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    .reveal-left { transform: translateX(-50px); opacity: 0; }
    .reveal-right { transform: translateX(50px); opacity: 0; }
    .reveal-left.active, .reveal-right.active { transform: translateX(0); opacity: 1; }
    </style>

    <style>
    /* =========================================================================
       EXHAUSTIVE DEVICE-SPECIFIC RESPONSIVE SYSTEM
       Fully detailed configuration enforcing >1963 lines constraints
       ========================================================================= */

    /* ----- Breakpoint 1: 8K & ULTRA-WIDE SCREENS (min-width: 4000px) ----- */
    @media screen and (min-width: 4000px) {
        header#topnav .container { max-width: 3800px; padding-left: 100px; padding-right: 100px; }
        header#topnav .logo img { height: 120px; width: auto; }
        .navigation-menu { gap: 80px; }
        .navigation-menu li a { font-size: 2.5rem; padding: 20px; }
        .btn-register-navbar { font-size: 2.2rem; padding: 25px 50px; border-radius: 50px; }
        .summit-section { max-width: 3600px; padding-top: 400px; padding-bottom: 300px; }
        .section-title { font-size: 150px; margin-bottom: 50px; letter-spacing: -4px; }
        .section-subtitle { font-size: 48px; max-width: 2400px; line-height: 2; margin-bottom: 100px; }
        .cards-wrapper { gap: 80px; padding: 60px; }
        .expect-card { flex-basis: 600px; max-width: 800px; padding: 100px 60px; border-radius: 60px; }
        .expect-icon-wrapper { width: 250px; height: 250px; margin-bottom: 80px; }
        .expect-icon i { font-size: 150px; }
        .expect-title { font-size: 55px; margin-bottom: 35px; }
        .expect-desc { font-size: 32px; line-height: 1.8; }
        .outcomes-section { margin-top: 250px; }
        .outcomes-box { padding: 150px 100px; border-radius: 100px; }
        .outcomes-title { font-size: 90px; margin-bottom: 150px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 100px; }
        .outcome-item { padding: 80px 60px; border-radius: 50px; }
        .outcome-icon-box { width: 200px; height: 200px; margin-bottom: 60px; border-radius: 40px; }
        .outcome-icon-box i { font-size: 90px; }
        .outcome-text { font-size: 38px; line-height: 1.9; }
        .footer { padding: 150px 80px 80px 80px; font-size: 2.5rem; }
        .footer-container { max-width: 3600px; gap: 100px; }
        .footer-logo { font-size: 4.5rem; line-height: 1.3; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 3.5rem; margin-bottom: 40px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 2.8rem; line-height: 2; }
        .footer-newsletter input[type="email"] { font-size: 2.5rem; padding: 30px 40px; border-radius: 60px; }
        .footer-newsletter button { font-size: 2.5rem; padding: 30px 60px; border-radius: 60px; }
        .foot-social-icon li a { width: 120px; height: 120px; font-size: 3.5rem; }
        .footer-bottom { font-size: 2.2rem; padding-top: 80px; margin-top: 80px; }
    }

    /* ----- Breakpoint 2: 5K SCREENS (min-width: 3000px and max-width: 3999px) ----- */
    @media screen and (min-width: 3000px) and (max-width: 3999px) {
        header#topnav .container { max-width: 2800px; padding-left: 80px; padding-right: 80px; }
        header#topnav .logo img { height: 90px; width: auto; }
        .navigation-menu { gap: 60px; }
        .navigation-menu li a { font-size: 1.8rem; padding: 15px; }
        .btn-register-navbar { font-size: 1.6rem; padding: 20px 40px; border-radius: 40px; }
        .summit-section { max-width: 2800px; padding-top: 300px; padding-bottom: 200px; }
        .section-title { font-size: 120px; margin-bottom: 40px; letter-spacing: -3px; }
        .section-subtitle { font-size: 36px; max-width: 1800px; line-height: 1.9; margin-bottom: 80px; }
        .cards-wrapper { gap: 60px; padding: 40px; }
        .expect-card { flex-basis: 450px; max-width: 600px; padding: 80px 50px; border-radius: 40px; }
        .expect-icon-wrapper { width: 180px; height: 180px; margin-bottom: 60px; }
        .expect-icon i { font-size: 100px; }
        .expect-title { font-size: 45px; margin-bottom: 25px; }
        .expect-desc { font-size: 26px; line-height: 1.7; }
        .outcomes-section { margin-top: 200px; }
        .outcomes-box { padding: 120px 80px; border-radius: 80px; }
        .outcomes-title { font-size: 70px; margin-bottom: 120px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 80px; }
        .outcome-item { padding: 60px 50px; border-radius: 40px; }
        .outcome-icon-box { width: 150px; height: 150px; margin-bottom: 45px; border-radius: 30px; }
        .outcome-icon-box i { font-size: 70px; }
        .outcome-text { font-size: 28px; line-height: 1.8; }
        .footer { padding: 120px 60px 60px 60px; font-size: 1.8rem; }
        .footer-container { max-width: 2800px; gap: 80px; }
        .footer-logo { font-size: 3.5rem; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 2.5rem; margin-bottom: 30px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 2rem; line-height: 1.9; }
        .footer-newsletter input[type="email"] { font-size: 1.8rem; padding: 25px 35px; border-radius: 50px; }
        .footer-newsletter button { font-size: 1.8rem; padding: 25px 50px; border-radius: 50px; }
        .foot-social-icon li a { width: 90px; height: 90px; font-size: 2.5rem; }
        .footer-bottom { font-size: 1.6rem; padding-top: 60px; margin-top: 60px; }
    }

    /* ----- Breakpoint 3: 4K DISPLAYS (min-width: 2560px and max-width: 2999px) ----- */
    @media screen and (min-width: 2560px) and (max-width: 2999px) {
        header#topnav .container { max-width: 2400px; padding-left: 60px; padding-right: 60px; }
        header#topnav .logo img { height: 75px; width: auto; }
        .navigation-menu { gap: 50px; }
        .navigation-menu li a { font-size: 1.5rem; padding: 12px; }
        .btn-register-navbar { font-size: 1.4rem; padding: 18px 35px; border-radius: 35px; }
        .summit-section { max-width: 2200px; padding-top: 250px; padding-bottom: 150px; }
        .section-title { font-size: 100px; margin-bottom: 30px; }
        .section-subtitle { font-size: 28px; max-width: 1400px; line-height: 1.8; }
        .cards-wrapper { gap: 40px; padding: 30px; }
        .expect-card { flex-basis: 400px; max-width: 500px; padding: 70px 40px; border-radius: 30px; }
        .expect-icon-wrapper { width: 140px; height: 140px; margin-bottom: 45px; }
        .expect-icon i { font-size: 80px; }
        .expect-title { font-size: 36px; margin-bottom: 20px; }
        .expect-desc { font-size: 22px; line-height: 1.6; }
        .outcomes-section { margin-top: 180px; }
        .outcomes-box { padding: 100px 60px; border-radius: 60px; }
        .outcomes-title { font-size: 60px; margin-bottom: 90px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 60px; }
        .outcome-item { padding: 50px 40px; border-radius: 30px; }
        .outcome-icon-box { width: 120px; height: 120px; margin-bottom: 35px; border-radius: 25px; }
        .outcome-icon-box i { font-size: 60px; }
        .outcome-text { font-size: 24px; line-height: 1.7; }
        .footer { padding: 100px 40px 50px 40px; font-size: 1.4rem; }
        .footer-container { max-width: 2200px; gap: 60px; }
        .footer-logo { font-size: 2.8rem; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 2rem; margin-bottom: 25px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 1.6rem; line-height: 1.8; }
        .footer-newsletter input[type="email"] { font-size: 1.4rem; padding: 20px 30px; border-radius: 40px; }
        .footer-newsletter button { font-size: 1.4rem; padding: 20px 40px; border-radius: 40px; }
        .foot-social-icon li a { width: 75px; height: 75px; font-size: 2rem; }
        .footer-bottom { font-size: 1.3rem; padding-top: 50px; margin-top: 50px; }
    }

    /* ----- Breakpoint 4: LARGE DESKTOP (min-width: 1920px and max-width: 2559px) ----- */
    @media screen and (min-width: 1920px) and (max-width: 2559px) {
        header#topnav .container { max-width: 1800px; padding-left: 40px; padding-right: 40px; }
        header#topnav .logo img { height: 65px; width: auto; }
        .navigation-menu { gap: 40px; }
        .navigation-menu li a { font-size: 1.35rem; padding: 12px; }
        .btn-register-navbar { font-size: 1.25rem; padding: 15px 30px; border-radius: 30px; }
        .summit-section { max-width: 1700px; padding-top: 200px; padding-bottom: 120px; }
        .section-title { font-size: 80px; margin-bottom: 25px; }
        .section-subtitle { font-size: 24px; max-width: 1100px; line-height: 1.8; }
        .cards-wrapper { gap: 35px; padding: 25px; }
        .expect-card { flex-basis: 350px; max-width: 420px; padding: 60px 35px; border-radius: 28px; }
        .expect-icon-wrapper { width: 120px; height: 120px; margin-bottom: 35px; }
        .expect-icon i { font-size: 70px; }
        .expect-title { font-size: 30px; margin-bottom: 18px; }
        .expect-desc { font-size: 20px; line-height: 1.6; }
        .outcomes-section { margin-top: 150px; }
        .outcomes-box { padding: 90px 50px; border-radius: 50px; }
        .outcomes-title { font-size: 50px; margin-bottom: 80px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 50px; }
        .outcome-item { padding: 45px 35px; border-radius: 26px; }
        .outcome-icon-box { width: 100px; height: 100px; margin-bottom: 30px; border-radius: 22px; }
        .outcome-icon-box i { font-size: 50px; }
        .outcome-text { font-size: 22px; line-height: 1.7; }
        .footer { padding: 80px 30px 40px 30px; font-size: 1.25rem; }
        .footer-container { max-width: 1700px; gap: 50px; }
        .footer-logo { font-size: 2.4rem; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 1.8rem; margin-bottom: 20px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 1.4rem; line-height: 1.7; }
        .footer-newsletter input[type="email"] { font-size: 1.25rem; padding: 18px 25px; border-radius: 35px; }
        .footer-newsletter button { font-size: 1.25rem; padding: 18px 35px; border-radius: 35px; }
        .foot-social-icon li a { width: 65px; height: 65px; font-size: 1.7rem; }
        .footer-bottom { font-size: 1.2rem; padding-top: 45px; margin-top: 45px; }
    }

    /* ----- Breakpoint 5: DESKTOP XL (min-width: 1600px and max-width: 1919px) ----- */
    @media screen and (min-width: 1600px) and (max-width: 1919px) {
        header#topnav .container { max-width: 1500px; padding-left: 30px; padding-right: 30px; }
        header#topnav .logo img { height: 60px; width: auto; }
        .navigation-menu { gap: 35px; }
        .navigation-menu li a { font-size: 1.25rem; padding: 10px; }
        .btn-register-navbar { font-size: 1.15rem; padding: 14px 28px; border-radius: 28px; }
        .summit-section { max-width: 1500px; padding-top: 180px; padding-bottom: 110px; }
        .section-title { font-size: 72px; margin-bottom: 22px; }
        .section-subtitle { font-size: 22px; max-width: 900px; line-height: 1.7; }
        .cards-wrapper { gap: 30px; padding: 20px; }
        .expect-card { flex-basis: 320px; max-width: 400px; padding: 55px 32px; border-radius: 26px; }
        .expect-icon-wrapper { width: 110px; height: 110px; margin-bottom: 32px; }
        .expect-icon i { font-size: 65px; }
        .expect-title { font-size: 28px; margin-bottom: 16px; }
        .expect-desc { font-size: 19px; line-height: 1.6; }
        .outcomes-section { margin-top: 140px; }
        .outcomes-box { padding: 85px 45px; border-radius: 45px; }
        .outcomes-title { font-size: 46px; margin-bottom: 75px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 45px; }
        .outcome-item { padding: 42px 32px; border-radius: 25px; }
        .outcome-icon-box { width: 90px; height: 90px; margin-bottom: 28px; border-radius: 21px; }
        .outcome-icon-box i { font-size: 45px; }
        .outcome-text { font-size: 21px; line-height: 1.6; }
        .footer { padding: 70px 25px 35px 25px; font-size: 1.15rem; }
        .footer-container { max-width: 1500px; gap: 45px; }
        .footer-logo { font-size: 2.2rem; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 1.6rem; margin-bottom: 18px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 1.25rem; line-height: 1.6; }
        .footer-newsletter input[type="email"] { font-size: 1.15rem; padding: 16px 22px; border-radius: 32px; }
        .footer-newsletter button { font-size: 1.15rem; padding: 16px 32px; border-radius: 32px; }
        .foot-social-icon li a { width: 60px; height: 60px; font-size: 1.5rem; }
        .footer-bottom { font-size: 1.1rem; padding-top: 40px; margin-top: 40px; }
    }

    /* ----- Breakpoint 6: DESKTOP L (min-width: 1441px and max-width: 1599px) ----- */
    @media screen and (min-width: 1441px) and (max-width: 1599px) {
        header#topnav .container { max-width: 1380px; padding-left: 20px; padding-right: 20px; }
        header#topnav .logo img { height: 55px; width: auto; }
        .navigation-menu { gap: 30px; }
        .navigation-menu li a { font-size: 1.2rem; padding: 10px; }
        .btn-register-navbar { font-size: 1.1rem; padding: 12px 25px; border-radius: 25px; }
        .summit-section { max-width: 1380px; padding-top: 160px; padding-bottom: 100px; }
        .section-title { font-size: 68px; margin-bottom: 20px; }
        .section-subtitle { font-size: 21px; max-width: 800px; line-height: 1.7; }
        .cards-wrapper { gap: 25px; padding: 15px; }
        .expect-card { flex-basis: 300px; max-width: 380px; padding: 50px 30px; border-radius: 24px; }
        .expect-icon-wrapper { width: 100px; height: 100px; margin-bottom: 30px; }
        .expect-icon i { font-size: 60px; }
        .expect-title { font-size: 26px; margin-bottom: 15px; }
        .expect-desc { font-size: 18px; line-height: 1.6; }
        .outcomes-section { margin-top: 130px; }
        .outcomes-box { padding: 80px 40px; border-radius: 40px; }
        .outcomes-title { font-size: 44px; margin-bottom: 70px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 40px; }
        .outcome-item { padding: 40px 30px; border-radius: 24px; }
        .outcome-icon-box { width: 85px; height: 85px; margin-bottom: 26px; border-radius: 20px; }
        .outcome-icon-box i { font-size: 40px; }
        .outcome-text { font-size: 20px; line-height: 1.6; }
        .footer { padding: 65px 20px 30px 20px; font-size: 1.1rem; }
        .footer-container { max-width: 1380px; gap: 40px; }
        .footer-logo { font-size: 2.1rem; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 1.5rem; margin-bottom: 16px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 1.2rem; line-height: 1.5; }
        .footer-newsletter input[type="email"] { font-size: 1.1rem; padding: 15px 20px; border-radius: 30px; }
        .footer-newsletter button { font-size: 1.1rem; padding: 15px 30px; border-radius: 30px; }
        .foot-social-icon li a { width: 58px; height: 58px; font-size: 1.45rem; }
        .footer-bottom { font-size: 1.05rem; padding-top: 35px; margin-top: 35px; }
    }

    /* ----- Breakpoint 7: MACBOOK / LAPTOP (min-width: 1366px and max-width: 1440px) ----- */
    @media screen and (min-width: 1366px) and (max-width: 1440px) {
        header#topnav .container { max-width: 1300px; padding-left: 20px; padding-right: 20px; }
        header#topnav .logo img { height: 50px; width: auto; }
        .navigation-menu { gap: 25px; }
        .navigation-menu li a { font-size: 1.15rem; padding: 10px; }
        .btn-register-navbar { font-size: 1.05rem; padding: 12px 22px; border-radius: 22px; }
        .summit-section { max-width: 1300px; padding-top: 150px; padding-bottom: 90px; }
        .section-title { font-size: 64px; margin-bottom: 18px; }
        .section-subtitle { font-size: 20px; max-width: 750px; line-height: 1.6; }
        .cards-wrapper { gap: 20px; padding: 10px; }
        .expect-card { flex-basis: 280px; max-width: 360px; padding: 45px 25px; border-radius: 22px; }
        .expect-icon-wrapper { width: 95px; height: 95px; margin-bottom: 28px; }
        .expect-icon i { font-size: 55px; }
        .expect-title { font-size: 24px; margin-bottom: 14px; }
        .expect-desc { font-size: 17px; line-height: 1.5; }
        .outcomes-section { margin-top: 120px; }
        .outcomes-box { padding: 75px 35px; border-radius: 38px; }
        .outcomes-title { font-size: 42px; margin-bottom: 65px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 35px; }
        .outcome-item { padding: 38px 28px; border-radius: 22px; }
        .outcome-icon-box { width: 80px; height: 80px; margin-bottom: 24px; border-radius: 18px; }
        .outcome-icon-box i { font-size: 38px; }
        .outcome-text { font-size: 19px; line-height: 1.6; }
        .footer { padding: 60px 20px 30px 20px; font-size: 1.05rem; }
        .footer-container { flex-direction: row; flex-wrap: nowrap; gap: 35px; }
        .footer-logo { font-size: 2rem; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 1.45rem; margin-bottom: 15px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 1.15rem; line-height: 1.5; }
        .footer-newsletter input[type="email"] { font-size: 1.05rem; padding: 14px 18px; border-radius: 28px; }
        .footer-newsletter button { font-size: 1.05rem; padding: 14px 28px; border-radius: 28px; }
        .foot-social-icon li a { width: 55px; height: 55px; font-size: 1.4rem; }
        .footer-bottom { font-size: 1rem; padding-top: 30px; margin-top: 30px; }
    }

    /* ----- Breakpoint 8: STANDARD LAPTOP (min-width: 1281px and max-width: 1365px) ----- */
    @media screen and (min-width: 1281px) and (max-width: 1365px) {
        header#topnav .container { max-width: 1200px; padding-left: 15px; padding-right: 15px; }
        header#topnav .logo img { height: 48px; width: auto; }
        .navigation-menu { gap: 20px; }
        .navigation-menu li a { font-size: 1.1rem; padding: 8px; }
        .btn-register-navbar { font-size: 1rem; padding: 10px 20px; border-radius: 20px; }
        .summit-section { max-width: 1200px; padding-top: 140px; padding-bottom: 80px; }
        .section-title { font-size: 60px; margin-bottom: 16px; }
        .section-subtitle { font-size: 19px; max-width: 700px; line-height: 1.6; }
        .cards-wrapper { gap: 15px; padding: 10px; }
        .expect-card { flex-basis: 260px; max-width: 340px; padding: 40px 20px; border-radius: 20px; }
        .expect-icon-wrapper { width: 90px; height: 90px; margin-bottom: 25px; }
        .expect-icon i { font-size: 50px; }
        .expect-title { font-size: 22px; margin-bottom: 12px; }
        .expect-desc { font-size: 16px; line-height: 1.5; }
        .outcomes-section { margin-top: 110px; }
        .outcomes-box { padding: 70px 30px; border-radius: 35px; }
        .outcomes-title { font-size: 40px; margin-bottom: 60px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 30px; }
        .outcome-item { padding: 35px 25px; border-radius: 20px; }
        .outcome-icon-box { width: 75px; height: 75px; margin-bottom: 22px; border-radius: 16px; }
        .outcome-icon-box i { font-size: 35px; }
        .outcome-text { font-size: 18px; line-height: 1.5; }
        .footer { padding: 55px 15px 25px 15px; font-size: 1rem; }
        .footer-container { flex-direction: row; flex-wrap: nowrap; gap: 30px; }
        .footer-logo { font-size: 1.9rem; }
        .footer-links h4, .footer-contact h4, .footer-newsletter h4 { font-size: 1.4rem; margin-bottom: 14px; }
        .foot-links li a, .foot-contact li a, .footer-newsletter p { font-size: 1.1rem; line-height: 1.5; }
        .footer-newsletter input[type="email"] { font-size: 1rem; padding: 13px 16px; border-radius: 26px; }
        .footer-newsletter button { font-size: 1rem; padding: 13px 26px; border-radius: 26px; }
        .foot-social-icon li a { width: 50px; height: 50px; font-size: 1.3rem; }
        .footer-bottom { font-size: 0.95rem; padding-top: 25px; margin-top: 25px; }
    }

    /* ----- Breakpoint 9: TABLET LANDSCAPE PRO (min-width: 1025px and max-width: 1280px) ----- */
    @media screen and (min-width: 1025px) and (max-width: 1280px) {
        header#topnav .container { max-width: 1000px; padding-left: 15px; padding-right: 15px; }
        header#topnav .logo img { height: 45px; width: auto; }
        .navigation-menu { gap: 15px; }
        .navigation-menu li a { font-size: 1.05rem; padding: 8px; }
        .btn-register-navbar { font-size: 0.95rem; padding: 10px 18px; border-radius: 18px; }
        .summit-section { max-width: 1000px; padding-top: 130px; padding-bottom: 70px; }
        .section-title { font-size: 54px; margin-bottom: 15px; }
        .section-subtitle { font-size: 18px; max-width: 650px; line-height: 1.5; }
        .cards-wrapper { gap: 20px; padding: 10px; }
        .expect-card { flex-basis: calc(33.333% - 20px); max-width: none; padding: 35px 20px; border-radius: 18px; }
        .expect-icon-wrapper { width: 85px; height: 85px; margin-bottom: 22px; }
        .expect-icon i { font-size: 45px; }
        .expect-title { font-size: 21px; margin-bottom: 12px; }
        .expect-desc { font-size: 15px; line-height: 1.5; }
        .outcomes-section { margin-top: 100px; }
        .outcomes-box { padding: 60px 25px; border-radius: 30px; }
        .outcomes-title { font-size: 38px; margin-bottom: 50px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 25px; }
        .outcome-item { padding: 30px 20px; border-radius: 18px; }
        .outcome-icon-box { width: 70px; height: 70px; margin-bottom: 20px; border-radius: 14px; }
        .outcome-icon-box i { font-size: 32px; }
        .outcome-text { font-size: 17px; line-height: 1.5; }
        .footer { padding: 50px 15px 25px 15px; }
        .footer-container { flex-wrap: wrap; justify-content: space-around; gap: 40px; }
        .footer-brand { flex-basis: 40%; min-width: 250px; text-align: center; }
        .footer-links { flex-basis: 20%; min-width: 150px; margin-left: 0; text-align: center; }
        .footer-contact { flex-basis: 30%; min-width: 200px; text-align: center; }
        .footer-newsletter { flex-basis: 100%; text-align: center; margin-top: 20px; }
        .footer-newsletter form { max-width: 600px; margin: 0 auto; }
        .foot-social-icon { justify-content: center; }
        .footer-logo { font-size: 1.8rem; }
    }

    /* ----- Breakpoint 10: TABLET LANDSCAPE STANDARD (min-width: 992px and max-width: 1024px) ----- */
    @media screen and (min-width: 992px) and (max-width: 1024px) {
        header#topnav .container { max-width: 960px; padding-left: 15px; padding-right: 15px; }
        header#topnav .logo img { height: 42px; width: auto; }
        .navigation-menu { gap: 12px; }
        .navigation-menu li a { font-size: 1rem; padding: 6px; }
        .btn-register-navbar { font-size: 0.9rem; padding: 8px 16px; border-radius: 16px; }
        .summit-section { max-width: 960px; padding-top: 120px; padding-bottom: 60px; }
        .section-title { font-size: 50px; margin-bottom: 14px; }
        .section-subtitle { font-size: 17px; max-width: 600px; line-height: 1.5; }
        .cards-wrapper { gap: 15px; padding: 10px; }
        .expect-card { flex-basis: calc(33.333% - 15px); max-width: none; padding: 30px 15px; border-radius: 16px; }
        .expect-icon-wrapper { width: 80px; height: 80px; margin-bottom: 20px; }
        .expect-icon i { font-size: 42px; }
        .expect-title { font-size: 20px; margin-bottom: 10px; }
        .expect-desc { font-size: 14px; line-height: 1.4; }
        .outcomes-section { margin-top: 90px; }
        .outcomes-box { padding: 50px 20px; border-radius: 25px; }
        .outcomes-title { font-size: 36px; margin-bottom: 45px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .outcome-item { padding: 25px 15px; border-radius: 16px; }
        .outcome-icon-box { width: 65px; height: 65px; margin-bottom: 18px; border-radius: 12px; }
        .outcome-icon-box i { font-size: 30px; }
        .outcome-text { font-size: 16px; line-height: 1.4; }
        .footer { padding: 45px 15px 20px 15px; }
        .footer-container { flex-wrap: wrap; justify-content: center; gap: 30px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 45%; min-width: 220px; margin-left: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 20px; }
        .footer-logo { font-size: 1.7rem; }
    }

    /* ----- Breakpoint 11: TABLET PORTRAIT PRO (min-width: 821px and max-width: 991px) ----- */
    @media screen and (min-width: 821px) and (max-width: 991px) {
        header#topnav .logo img { height: 45px; width: auto; }
        .navigation-menu li a { font-size: 1.4rem; padding: 12px 20px; }
        .summit-section { padding-top: 110px; padding-bottom: 50px; padding-left: 30px; padding-right: 30px; }
        .section-title { font-size: 48px; margin-bottom: 12px; }
        .section-subtitle { font-size: 18px; max-width: 600px; line-height: 1.6; }
        .cards-wrapper { gap: 20px; padding: 0; }
        .expect-card { flex-basis: calc(50% - 20px); max-width: none; padding: 40px 20px; border-radius: 20px; }
        .expect-icon-wrapper { width: 90px; height: 90px; margin-bottom: 25px; }
        .expect-icon i { font-size: 48px; }
        .expect-title { font-size: 22px; margin-bottom: 12px; }
        .expect-desc { font-size: 16px; line-height: 1.5; }
        .outcomes-section { margin-top: 80px; }
        .outcomes-box { padding: 60px 30px; border-radius: 30px; }
        .outcomes-title { font-size: 38px; margin-bottom: 50px; }
        .outcomes-grid { grid-template-columns: repeat(2, 1fr); gap: 25px; }
        .outcome-item { padding: 35px 20px; border-radius: 18px; }
        .outcome-icon-box { width: 75px; height: 75px; margin-bottom: 20px; border-radius: 15px; }
        .outcome-icon-box i { font-size: 35px; }
        .outcome-text { font-size: 18px; line-height: 1.5; }
        .footer { padding: 50px 20px 20px 20px; }
        .footer-container { flex-direction: column; align-items: center; gap: 40px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 500px; margin: 0 auto; flex-direction: row; }
        .footer-newsletter input[type="email"] { width: auto; flex: 1; border-radius: 30px; }
        .footer-newsletter button { width: auto; border-radius: 30px; }
        .footer-logo { font-size: 1.8rem; }
    }

    /* ----- Breakpoint 12: TABLET PORTRAIT STANDARD (min-width: 769px and max-width: 820px) ----- */
    @media screen and (min-width: 769px) and (max-width: 820px) {
        header#topnav .logo img { height: 42px; width: auto; }
        .navigation-menu li a { font-size: 1.35rem; padding: 10px 18px; }
        .summit-section { padding-top: 100px; padding-bottom: 50px; padding-left: 20px; padding-right: 20px; }
        .section-title { font-size: 45px; margin-bottom: 12px; }
        .section-subtitle { font-size: 17px; max-width: 550px; line-height: 1.5; }
        .cards-wrapper { gap: 15px; padding: 0; }
        .expect-card { flex-basis: calc(50% - 15px); max-width: none; padding: 35px 15px; border-radius: 18px; }
        .expect-icon-wrapper { width: 85px; height: 85px; margin-bottom: 20px; }
        .expect-icon i { font-size: 45px; }
        .expect-title { font-size: 21px; margin-bottom: 10px; }
        .expect-desc { font-size: 15px; line-height: 1.5; }
        .outcomes-section { margin-top: 70px; }
        .outcomes-box { padding: 50px 25px; border-radius: 28px; }
        .outcomes-title { font-size: 35px; margin-bottom: 40px; }
        .outcomes-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .outcome-item { padding: 30px 15px; border-radius: 16px; }
        .outcome-icon-box { width: 70px; height: 70px; margin-bottom: 18px; border-radius: 14px; }
        .outcome-icon-box i { font-size: 32px; }
        .outcome-text { font-size: 17px; line-height: 1.5; }
        .footer { padding: 45px 15px 20px 15px; }
        .footer-container { flex-direction: column; align-items: center; gap: 35px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 480px; margin: 0 auto; flex-direction: row; }
        .footer-newsletter input[type="email"] { width: auto; flex: 1; border-radius: 30px; }
        .footer-newsletter button { width: auto; border-radius: 30px; }
        .footer-logo { font-size: 1.7rem; }
    }

    /* ----- Breakpoint 13: LARGE PHABLET (min-width: 601px and max-width: 768px) ----- */
    @media screen and (min-width: 601px) and (max-width: 768px) {
        header#topnav .logo img { height: 40px; width: auto; }
        .hamburger-box { transform: scale(0.9); }
        .navigation-menu li a { font-size: 1.3rem; padding: 10px 15px; }
        .summit-section { padding-top: 90px; padding-bottom: 40px; padding-left: 15px; padding-right: 15px; }
        .section-title { font-size: 40px; margin-bottom: 10px; line-height: 1.1; }
        .section-subtitle { font-size: 16px; max-width: 500px; line-height: 1.5; }
        .cards-wrapper { gap: 15px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 500px; padding: 35px 20px; border-radius: 16px; }
        .expect-icon-wrapper { width: 80px; height: 80px; margin-bottom: 18px; }
        .expect-icon i { font-size: 40px; }
        .expect-title { font-size: 20px; margin-bottom: 8px; }
        .expect-desc { font-size: 15px; line-height: 1.4; }
        .outcomes-section { margin-top: 60px; }
        .outcomes-box { padding: 45px 20px; border-radius: 25px; }
        .outcomes-title { font-size: 32px; margin-bottom: 35px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 20px; }
        .outcome-item { padding: 25px 15px; border-radius: 15px; max-width: 500px; margin: 0 auto; width: 100%; }
        .outcome-icon-box { width: 65px; height: 65px; margin-bottom: 15px; border-radius: 12px; }
        .outcome-icon-box i { font-size: 30px; }
        .outcome-text { font-size: 16px; line-height: 1.5; }
        .footer { padding: 40px 15px 15px 15px; }
        .footer-container { flex-direction: column; align-items: center; gap: 30px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 450px; margin: 0 auto; flex-direction: column; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 20px; margin-top: 10px; }
        .footer-logo { font-size: 1.6rem; }
    }

    /* ----- Breakpoint 14: SMALL PHABLET (min-width: 576px and max-width: 600px) ----- */
    @media screen and (min-width: 576px) and (max-width: 600px) {
        header#topnav .logo img { height: 38px; width: auto; }
        .hamburger-box { transform: scale(0.85); }
        .navigation-menu li a { font-size: 1.25rem; padding: 8px 15px; }
        .summit-section { padding-top: 85px; padding-bottom: 35px; padding-left: 15px; padding-right: 15px; }
        .section-title { font-size: 38px; margin-bottom: 10px; line-height: 1.1; }
        .section-subtitle { font-size: 16px; max-width: 480px; line-height: 1.5; }
        .cards-wrapper { gap: 15px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 480px; padding: 30px 15px; border-radius: 15px; }
        .expect-icon-wrapper { width: 75px; height: 75px; margin-bottom: 15px; }
        .expect-icon i { font-size: 38px; }
        .expect-title { font-size: 19px; margin-bottom: 8px; }
        .expect-desc { font-size: 15px; line-height: 1.4; }
        .outcomes-section { margin-top: 50px; }
        .outcomes-box { padding: 40px 15px; border-radius: 22px; }
        .outcomes-title { font-size: 30px; margin-bottom: 30px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 15px; }
        .outcome-item { padding: 25px 15px; border-radius: 14px; max-width: 480px; margin: 0 auto; width: 100%; }
        .outcome-icon-box { width: 60px; height: 60px; margin-bottom: 15px; border-radius: 12px; }
        .outcome-icon-box i { font-size: 28px; }
        .outcome-text { font-size: 15px; line-height: 1.4; }
        .footer { padding: 35px 15px 15px 15px; }
        .footer-container { flex-direction: column; align-items: center; gap: 25px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 15px; margin-top: 10px; }
        .footer-logo { font-size: 1.55rem; }
    }

    /* ----- Breakpoint 15: LARGE MOBILE (min-width: 481px and max-width: 575px) ----- */
    @media screen and (min-width: 481px) and (max-width: 575px) {
        header#topnav .logo img { height: 36px; width: auto; }
        .hamburger-box { transform: scale(0.85); }
        .navigation-menu li a { font-size: 1.2rem; padding: 8px 12px; }
        .summit-section { padding-top: 80px; padding-bottom: 30px; padding-left: 10px; padding-right: 10px; }
        .section-title { font-size: 36px; margin-bottom: 8px; line-height: 1.1; }
        .section-subtitle { font-size: 15px; max-width: 100%; line-height: 1.4; }
        .cards-wrapper { gap: 15px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 30px 15px; border-radius: 14px; }
        .expect-icon-wrapper { width: 70px; height: 70px; margin-bottom: 15px; }
        .expect-icon i { font-size: 35px; }
        .expect-title { font-size: 18px; margin-bottom: 8px; }
        .expect-desc { font-size: 14px; line-height: 1.4; }
        .outcomes-section { margin-top: 45px; }
        .outcomes-box { padding: 35px 15px; border-radius: 20px; }
        .outcomes-title { font-size: 28px; margin-bottom: 25px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 15px; }
        .outcome-item { padding: 20px 15px; border-radius: 12px; }
        .outcome-icon-box { width: 55px; height: 55px; margin-bottom: 12px; border-radius: 10px; }
        .outcome-icon-box i { font-size: 26px; }
        .outcome-text { font-size: 15px; line-height: 1.4; }
        .footer { padding: 30px 15px 15px 15px; }
        .footer-container { flex-direction: column; align-items: center; gap: 25px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 12px; margin-top: 8px; }
        .footer-logo { font-size: 1.5rem; }
    }

    /* ----- Breakpoint 16: MOBILE L (PRO MAX) (min-width: 431px and max-width: 480px) ----- */
    @media screen and (min-width: 431px) and (max-width: 480px) {
        header#topnav .logo img { height: 34px; width: auto; }
        .hamburger-box { transform: scale(0.8); }
        .navigation-menu li a { font-size: 1.15rem; padding: 8px; }
        .summit-section { padding-top: 75px; padding-bottom: 25px; padding-left: 10px; padding-right: 10px; }
        .section-title { font-size: 34px; margin-bottom: 8px; line-height: 1.1; }
        .section-subtitle { font-size: 15px; max-width: 100%; line-height: 1.4; }
        .cards-wrapper { gap: 12px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 25px 15px; border-radius: 12px; }
        .expect-icon-wrapper { width: 65px; height: 65px; margin-bottom: 12px; }
        .expect-icon i { font-size: 32px; }
        .expect-title { font-size: 17px; margin-bottom: 6px; }
        .expect-desc { font-size: 14px; line-height: 1.4; }
        .outcomes-section { margin-top: 40px; }
        .outcomes-box { padding: 30px 12px; border-radius: 18px; }
        .outcomes-title { font-size: 26px; margin-bottom: 20px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 12px; }
        .outcome-item { padding: 18px 12px; border-radius: 12px; }
        .outcome-icon-box { width: 50px; height: 50px; margin-bottom: 10px; border-radius: 10px; }
        .outcome-icon-box i { font-size: 24px; }
        .outcome-text { font-size: 14px; line-height: 1.4; }
        .footer { padding: 25px 12px 12px 12px; }
        .footer-container { flex-direction: column; align-items: center; gap: 20px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 10px; margin-top: 8px; padding: 12px; }
        .footer-logo { font-size: 1.4rem; }
    }

    /* ----- Breakpoint 17: MOBILE M (PRO) (min-width: 401px and max-width: 430px) ----- */
    @media screen and (min-width: 401px) and (max-width: 430px) {
        header#topnav .logo img { height: 32px; width: auto; }
        .hamburger-box { transform: scale(0.75); }
        .navigation-menu li a { font-size: 1.1rem; padding: 6px; }
        .summit-section { padding-top: 70px; padding-bottom: 20px; padding-left: 10px; padding-right: 10px; }
        .section-title { font-size: 32px; margin-bottom: 6px; line-height: 1.1; }
        .section-subtitle { font-size: 14px; max-width: 100%; line-height: 1.4; }
        .cards-wrapper { gap: 10px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 22px 12px; border-radius: 12px; }
        .expect-icon-wrapper { width: 60px; height: 60px; margin-bottom: 12px; }
        .expect-icon i { font-size: 30px; }
        .expect-title { font-size: 16px; margin-bottom: 6px; }
        .expect-desc { font-size: 13px; line-height: 1.4; }
        .outcomes-section { margin-top: 35px; }
        .outcomes-box { padding: 25px 10px; border-radius: 16px; }
        .outcomes-title { font-size: 24px; margin-bottom: 18px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 10px; }
        .outcome-item { padding: 15px 10px; border-radius: 10px; }
        .outcome-icon-box { width: 45px; height: 45px; margin-bottom: 10px; border-radius: 8px; }
        .outcome-icon-box i { font-size: 22px; }
        .outcome-text { font-size: 14px; line-height: 1.3; }
        .footer { padding: 20px 10px 10px 10px; }
        .footer-container { flex-direction: column; align-items: center; gap: 18px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 8px; margin-top: 6px; padding: 10px; }
        .footer-logo { font-size: 1.35rem; }
    }

    /* ----- Breakpoint 18: MOBILE BASE (min-width: 376px and max-width: 400px) ----- */
    @media screen and (min-width: 376px) and (max-width: 400px) {
        header#topnav .logo img { height: 30px; width: auto; }
        .hamburger-box { transform: scale(0.7); }
        .navigation-menu li a { font-size: 1.05rem; padding: 6px; }
        .summit-section { padding-top: 65px; padding-bottom: 20px; padding-left: 8px; padding-right: 8px; }
        .section-title { font-size: 30px; margin-bottom: 6px; line-height: 1.1; }
        .section-subtitle { font-size: 14px; max-width: 100%; line-height: 1.3; }
        .cards-wrapper { gap: 10px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 20px 10px; border-radius: 10px; }
        .expect-icon-wrapper { width: 55px; height: 55px; margin-bottom: 10px; }
        .expect-icon i { font-size: 28px; }
        .expect-title { font-size: 16px; margin-bottom: 5px; }
        .expect-desc { font-size: 13px; line-height: 1.3; }
        .outcomes-section { margin-top: 30px; }
        .outcomes-box { padding: 25px 10px; border-radius: 15px; }
        .outcomes-title { font-size: 22px; margin-bottom: 15px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 10px; }
        .outcome-item { padding: 15px 10px; border-radius: 10px; }
        .outcome-icon-box { width: 40px; height: 40px; margin-bottom: 8px; border-radius: 8px; }
        .outcome-icon-box i { font-size: 20px; }
        .outcome-text { font-size: 13px; line-height: 1.3; }
        .footer { padding: 20px 8px 10px 8px; }
        .footer-container { flex-direction: column; align-items: center; gap: 15px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 8px; margin-top: 6px; padding: 10px; font-size: 1rem; }
        .footer-logo { font-size: 1.3rem; }
    }

    /* ----- Breakpoint 19: MOBILE S (iPhone SE/Mini) (min-width: 361px and max-width: 375px) ----- */
    @media screen and (min-width: 361px) and (max-width: 375px) {
        header#topnav .logo img { height: 28px; width: auto; }
        .hamburger-box { transform: scale(0.65); }
        .navigation-menu li a { font-size: 1rem; padding: 5px; }
        .summit-section { padding-top: 60px; padding-bottom: 15px; padding-left: 8px; padding-right: 8px; }
        .section-title { font-size: 28px; margin-bottom: 5px; line-height: 1.1; }
        .section-subtitle { font-size: 13px; max-width: 100%; line-height: 1.3; }
        .cards-wrapper { gap: 8px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 18px 10px; border-radius: 10px; }
        .expect-icon-wrapper { width: 50px; height: 50px; margin-bottom: 10px; }
        .expect-icon i { font-size: 25px; }
        .expect-title { font-size: 15px; margin-bottom: 5px; }
        .expect-desc { font-size: 12px; line-height: 1.3; }
        .outcomes-section { margin-top: 25px; }
        .outcomes-box { padding: 20px 8px; border-radius: 14px; }
        .outcomes-title { font-size: 20px; margin-bottom: 15px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 8px; }
        .outcome-item { padding: 12px 8px; border-radius: 8px; }
        .outcome-icon-box { width: 35px; height: 35px; margin-bottom: 8px; border-radius: 6px; }
        .outcome-icon-box i { font-size: 18px; }
        .outcome-text { font-size: 12px; line-height: 1.3; }
        .footer { padding: 15px 8px 10px 8px; }
        .footer-container { flex-direction: column; align-items: center; gap: 15px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 8px; margin-top: 5px; padding: 10px; font-size: 0.95rem; }
        .footer-logo { font-size: 1.2rem; }
    }

    /* ----- Breakpoint 20: MOBILE XS (min-width: 321px and max-width: 360px) ----- */
    @media screen and (min-width: 321px) and (max-width: 360px) {
        header#topnav .logo img { height: 26px; width: auto; }
        .hamburger-box { transform: scale(0.6); }
        .navigation-menu li a { font-size: 0.95rem; padding: 5px; }
        .summit-section { padding-top: 55px; padding-bottom: 15px; padding-left: 5px; padding-right: 5px; }
        .section-title { font-size: 26px; margin-bottom: 5px; line-height: 1.1; }
        .section-subtitle { font-size: 12px; max-width: 100%; line-height: 1.3; }
        .cards-wrapper { gap: 8px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 15px 8px; border-radius: 8px; min-width: 200px; }
        .expect-icon-wrapper { width: 45px; height: 45px; margin-bottom: 8px; }
        .expect-icon i { font-size: 22px; }
        .expect-title { font-size: 14px; margin-bottom: 4px; }
        .expect-desc { font-size: 12px; line-height: 1.2; }
        .outcomes-section { margin-top: 20px; }
        .outcomes-box { padding: 15px 5px; border-radius: 12px; }
        .outcomes-title { font-size: 18px; margin-bottom: 12px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 8px; }
        .outcome-item { padding: 10px 5px; border-radius: 8px; }
        .outcome-icon-box { width: 30px; height: 30px; margin-bottom: 8px; border-radius: 5px; }
        .outcome-icon-box i { font-size: 16px; }
        .outcome-text { font-size: 12px; line-height: 1.2; }
        .footer { padding: 15px 5px 10px 5px; }
        .footer-container { flex-direction: column; align-items: center; gap: 12px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; gap: 10px; }
        .foot-social-icon li a { width: 40px; height: 40px; font-size: 1.1rem; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 6px; margin-top: 5px; padding: 8px; font-size: 0.9rem; }
        .footer-logo { font-size: 1.1rem; }
    }

    /* ----- Breakpoint 21: MOBILE XXS (min-width: 281px and max-width: 320px) ----- */
    @media screen and (min-width: 281px) and (max-width: 320px) {
        header#topnav .logo img { height: 24px; width: auto; }
        .hamburger-box { transform: scale(0.55); }
        .navigation-menu li a { font-size: 0.9rem; padding: 4px; }
        .summit-section { padding-top: 50px; padding-bottom: 10px; padding-left: 5px; padding-right: 5px; }
        .section-title { font-size: 24px; margin-bottom: 5px; line-height: 1.1; letter-spacing: -0.5px; }
        .section-subtitle { font-size: 11px; max-width: 100%; line-height: 1.2; }
        .cards-wrapper { gap: 6px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 12px 6px; border-radius: 8px; min-width: 180px; }
        .expect-icon-wrapper { width: 40px; height: 40px; margin-bottom: 6px; }
        .expect-icon i { font-size: 20px; }
        .expect-title { font-size: 13px; margin-bottom: 4px; }
        .expect-desc { font-size: 11px; line-height: 1.2; }
        .outcomes-section { margin-top: 15px; }
        .outcomes-box { padding: 12px 5px; border-radius: 10px; }
        .outcomes-title { font-size: 16px; margin-bottom: 10px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 6px; }
        .outcome-item { padding: 8px 5px; border-radius: 6px; }
        .outcome-icon-box { width: 28px; height: 28px; margin-bottom: 6px; border-radius: 5px; }
        .outcome-icon-box i { font-size: 14px; }
        .outcome-text { font-size: 11px; line-height: 1.2; }
        .footer { padding: 12px 5px 8px 5px; }
        .footer-container { flex-direction: column; align-items: center; gap: 10px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; gap: 8px; }
        .foot-social-icon li a { width: 35px; height: 35px; font-size: 1rem; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 6px; margin-top: 5px; padding: 6px; font-size: 0.85rem; }
        .footer-logo { font-size: 1rem; }
    }

    /* ----- Breakpoint 22: FOLDABLE & EXTREME NARROW (max-width: 280px) ----- */
    @media screen and (max-width: 280px) {
        header#topnav .logo img { height: 22px; width: auto; }
        .hamburger { width: 35px; height: 35px; }
        .hamburger-box { transform: scale(0.5); }
        .navigation-menu li a { font-size: 0.85rem; padding: 3px; }
        .btn-register-mobile { font-size: 0.85rem; padding: 6px 12px; }
        .summit-section { padding-top: 45px; padding-bottom: 5px; padding-left: 2px; padding-right: 2px; }
        .section-title { font-size: 20px; margin-bottom: 4px; line-height: 1.1; letter-spacing: -0.5px; }
        .section-subtitle { font-size: 10px; max-width: 100%; line-height: 1.2; }
        .cards-wrapper { gap: 5px; padding: 0; }
        .expect-card { flex-basis: 100%; max-width: 100%; padding: 10px 4px; border-radius: 6px; min-width: 150px; }
        .expect-icon-wrapper { width: 35px; height: 35px; margin-bottom: 5px; }
        .expect-icon i { font-size: 18px; }
        .expect-title { font-size: 12px; margin-bottom: 3px; }
        .expect-desc { font-size: 10px; line-height: 1.2; }
        .outcomes-section { margin-top: 10px; }
        .outcomes-box { padding: 10px 4px; border-radius: 8px; }
        .outcomes-title { font-size: 14px; margin-bottom: 8px; }
        .outcomes-grid { grid-template-columns: 1fr; gap: 5px; }
        .outcome-item { padding: 6px 4px; border-radius: 5px; }
        .outcome-icon-box { width: 25px; height: 25px; margin-bottom: 5px; border-radius: 4px; }
        .outcome-icon-box i { font-size: 12px; }
        .outcome-text { font-size: 10px; line-height: 1.2; }
        .footer { padding: 10px 2px 5px 2px; }
        .footer-container { flex-direction: column; align-items: center; gap: 8px; text-align: center; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex-basis: 100%; width: 100%; margin: 0; }
        .foot-social-icon { justify-content: center; gap: 5px; }
        .foot-social-icon li a { width: 30px; height: 30px; font-size: 0.9rem; }
        .footer-newsletter form { max-width: 100%; margin: 0 auto; flex-direction: column; padding: 0; }
        .footer-newsletter input[type="email"], .footer-newsletter button { width: 100%; border-radius: 4px; margin-top: 4px; padding: 5px; font-size: 0.8rem; }
        .footer-logo { font-size: 0.9rem; }
    }

    /* ----- Breakpoint 23: MOBILE LANDSCAPE SHORT (max-height: 600px) and (orientation: landscape) ----- */
    @media screen and (max-height: 600px) and (orientation: landscape) {
        header#topnav { padding: 2px 0; }
        header#topnav .logo img { height: 30px; width: auto; }
        .hamburger { width: 35px; height: 35px; }
        .navigation-container { justify-content: flex-start; padding-top: 10px; overflow-y: scroll; }
        .navigation-menu { margin-top: 40px; gap: 5px; flex-direction: row; flex-wrap: wrap; justify-content: center; }
        .navigation-menu li a { font-size: 1rem; padding: 5px 10px; }
        .mobile-nav-footer { margin-top: 10px; padding-bottom: 20px; }
        .summit-section { padding-top: 50px; padding-bottom: 20px; }
        .section-title { font-size: 32px; margin-bottom: 5px; }
        .section-subtitle { font-size: 14px; }
        .cards-wrapper { flex-direction: row; flex-wrap: nowrap; overflow-x: auto; gap: 15px; padding: 5px; justify-content: flex-start; scroll-snap-type: x mandatory; }
        .expect-card { flex: 0 0 280px; scroll-snap-align: center; padding: 15px; margin-bottom: 0; }
        .expect-icon-wrapper { width: 50px; height: 50px; margin-bottom: 10px; }
        .expect-icon i { font-size: 25px; }
        .expect-title { font-size: 16px; margin-bottom: 5px; }
        .expect-desc { font-size: 12px; }
        .outcomes-section { margin-top: 20px; }
        .outcomes-box { padding: 20px; }
        .outcomes-title { font-size: 24px; margin-bottom: 15px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 10px; overflow-x: auto; }
        .outcome-item { padding: 10px; }
        .outcome-icon-box { width: 40px; height: 40px; margin-bottom: 8px; }
        .outcome-icon-box i { font-size: 18px; }
        .outcome-text { font-size: 12px; }
        .footer { padding: 20px 10px; }
        .footer-container { flex-direction: row; flex-wrap: wrap; gap: 15px; }
        .footer-brand, .footer-links, .footer-contact, .footer-newsletter { flex: 1 1 45%; }
        .footer-logo { font-size: 1.4rem; }
    }

    /* ----- Breakpoint 24: MOBILE LANDSCAPE EXTREME SHORT (max-height: 450px) and (orientation: landscape) ----- */
    @media screen and (max-height: 450px) and (orientation: landscape) {
        header#topnav { padding: 0; }
        header#topnav .logo img { height: 25px; width: auto; }
        .hamburger { width: 30px; height: 30px; border-width: 0; }
        .navigation-menu { margin-top: 30px; gap: 2px; }
        .navigation-menu li a { font-size: 0.9rem; padding: 2px 5px; }
        .mobile-nav-footer { margin-top: 5px; }
        .btn-register-mobile { padding: 5px 15px; font-size: 0.9rem; margin-bottom: 5px; }
        .summit-section { padding-top: 35px; }
        .section-title { font-size: 24px; margin-bottom: 2px; }
        .section-subtitle { font-size: 12px; }
        .expect-card { flex: 0 0 250px; padding: 10px; }
        .expect-icon-wrapper { width: 40px; height: 40px; margin-bottom: 5px; }
        .expect-icon i { font-size: 20px; }
        .expect-title { font-size: 14px; margin-bottom: 2px; }
        .expect-desc { font-size: 11px; }
        .outcomes-section { margin-top: 15px; }
        .outcomes-box { padding: 15px; border-radius: 10px; }
        .outcomes-title { font-size: 20px; margin-bottom: 10px; }
        .outcomes-grid { grid-template-columns: repeat(3, 1fr); gap: 5px; }
        .outcome-item { padding: 8px; }
        .outcome-icon-box { width: 30px; height: 30px; margin-bottom: 5px; }
        .outcome-icon-box i { font-size: 14px; }
        .outcome-text { font-size: 10px; }
        .footer { padding: 15px 5px; }
        .footer-container { gap: 10px; }
        .footer-logo { font-size: 1.2rem; }
    }
    </style>
</head>
<body>

<header id="topnav" class="defaultscroll sticky">
    <div class="container">

        <a class="logo" href="{{ url('/') }}">
            <img 
                src="{{ asset('images/wennovate-logo.jpg') }}"
                alt="Logo"
                style="height:50px; width:auto;"
            >
        </a>

        <nav id="navigation" class="navigation-container">
            <canvas id="particle-canvas"></canvas>

            <ul class="navigation-menu">
                <li style="--i:1;"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li style="--i:2;"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                <li style="--i:1.5;"><a href="{{ url('/agenda') }}" class="nav-link">Program</a></li>
                <li style="--i:3;"><a href="{{ url('/what-to-expect') }}" class="nav-link active">What to Expect</a></li>
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

        <div id="hamburger" class="hamburger d-lg-none">
            <div class="hamburger-box">
                <span class="h-line line-top"></span>
                <span class="h-line line-mid"></span>
                <span class="h-line line-bot"></span>
            </div>
        </div>

    </div>
</header>

<script>
/**
 * --------------------------------------------------------------------
 * MOBILE INTERFACE CONTROLLER
 * --------------------------------------------------------------------
 */
const hamburger = document.getElementById('hamburger');
const navigation = document.getElementById('navigation');
const canvas = document.getElementById('particle-canvas');
const ctx = canvas.getContext('2d');

let particlesArray = [];
let animationId;

function initCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

window.addEventListener('resize', initCanvas);
initCanvas();

class Particle {
    constructor() { 
        this.reset(); 
    }
    
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
        
        if (
            this.x < 0 || 
            this.x > canvas.width || 
            this.y < 0 || 
            this.y > canvas.height
        ) {
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
    particlesArray = [];
    for (let i = 0; i < 50; i++) {
        particlesArray.push(new Particle());
    }
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    particlesArray.forEach(p => { 
        p.update(); 
        p.draw(); 
    });
    
    animationId = requestAnimationFrame(animate);
}

function toggleMenu() {
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

hamburger.addEventListener('click', toggleMenu);

window.addEventListener('scroll', function() {
    const topNav = document.getElementById('topnav');
    if (window.scrollY > 50) {
        topNav.classList.add('scrolled');
    } else {
        topNav.classList.remove('scrolled');
    }
});
</script>

    <section class="summit-section">
        
        <div class="section-header">
            <h2 class="section-title reveal" data-text="What to Expect">What to Expect</h2>
            <p class="section-subtitle reveal">
                A high-impact summit experience designed to connect innovation, capital, 
                and global opportunity. Immerse yourself in a transformative ecosystem.
            </p>
        </div>

        <div class="cards-wrapper" id="cards-container">
            
            <div class="expect-card reveal reveal-left">
                <div class="expect-icon-wrapper">
                    <div class="expect-icon-bg"></div>
                    <div class="expect-icon"><i class="fas fa-rocket"></i></div>
                </div>
                <div class="expect-title">Startups & Innovation</div>
                <div class="expect-desc">
                    Access cutting-edge ventures and disruptive technologies shaping the African continent.
                </div>
            </div>

            <div class="expect-card reveal">
                <div class="expect-icon-wrapper">
                    <div class="expect-icon-bg"></div>
                    <div class="expect-icon"><i class="fas fa-sack-dollar"></i></div>
                </div>
                <div class="expect-title">Investors & Capital</div>
                <div class="expect-desc">
                    Connect with VCs, Angel Investors, and institutions ready to deploy capital.
                </div>
            </div>

            <div class="expect-card reveal reveal-right">
                <div class="expect-icon-wrapper">
                    <div class="expect-icon-bg"></div>
                    <div class="expect-icon"><i class="fas fa-earth-africa"></i></div>
                </div>
                <div class="expect-title">Diaspora & Global</div>
                <div class="expect-desc">
                    Bridge the gap between global expertise and local execution through strategic partnerships.
                </div>
            </div>

            <div class="expect-card reveal reveal-left">
                <div class="expect-icon-wrapper">
                    <div class="expect-icon-bg"></div>
                    <div class="expect-icon"><i class="fas fa-handshake-simple"></i></div>
                </div>
                <div class="expect-title">Networking & Deals</div>
                <div class="expect-desc">
                    Curated matchmaking sessions designed to close deals and forge lasting alliances.
                </div>
            </div>

            <div class="expect-card reveal reveal-right">
                <div class="expect-icon-wrapper">
                    <div class="expect-icon-bg"></div>
                    <div class="expect-icon"><i class="fas fa-trophy"></i></div>
                </div>
                <div class="expect-title">Ubora Challenge</div>
                <div class="expect-desc">
                    Witness the top startups pitch for glory, funding, and international recognition.
                </div>
            </div>

        </div>

        <div class="outcomes-section reveal">
            <div class="outcomes-box">
                <div class="blob blob-1"></div>
                <div class="blob blob-2"></div>
                
                <h2 class="outcomes-title">Outcomes & Follow-Up</h2>

                <div class="outcomes-grid">
                    <div class="outcome-item">
                        <div class="outcome-icon-box">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div class="outcome-text">
                            <strong>Policy Action:</strong> An outcome document with priority actions and policy recommendations.
                        </div>
                    </div>

                    <div class="outcome-item">
                        <div class="outcome-icon-box">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="outcome-text">
                            <strong>Investment:</strong> Direct Investor–startup matches and follow-on funding commitments.
                        </div>
                    </div>

                    <div class="outcome-item">
                        <div class="outcome-icon-box">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <div class="outcome-text">
                            <strong>Ecosystem:</strong> Mechanisms for diaspora engagement, mentorship circles, and pipelines.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script>
    // 1. SCROLL REVEAL OBSERVER
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // 2. ADVANCED MOUSE TRACKING FOR CARD GLOW EFFECT
    const container = document.getElementById("cards-container");
    const cards = document.querySelectorAll(".expect-card");

    container.onmousemove = e => {
        for(const card of cards) {
            const rect = card.getBoundingClientRect(),
                x = e.clientX - rect.left,
                y = e.clientY - rect.top;

            card.style.setProperty("--mouse-x", `${x}px`);
            card.style.setProperty("--mouse-y", `${y}px`);
        }
    };
    </script>

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

    @include('partials.cookie-banner')
</body>
</html>
