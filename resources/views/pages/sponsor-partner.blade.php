

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >
    
    <title>Become a Partner | Wennovate Africa</title>
    
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
         * 6. SPONSOR FORM SECTION STYLES
         * ============================================================
         */
        .sponsor-section {
            padding: 120px 20px 80px;
            position: relative;
            z-index: 1;
        }

        h2 {
            text-align:center;
            font-size:2.5rem;
            font-weight:700;
            background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;
            -webkit-text-fill-color:transparent;
            margin-bottom:15px;
        }

        p.intro {
            text-align:center;
            color:#555;
            max-width:700px;
            margin:0 auto 50px;
            font-size:1.1rem;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(18px);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.12);
            max-width:900px;
            margin:0 auto;
            border:1px solid rgba(255,255,255,0.4);
        }

        .form-control {
            border-radius:12px;
            padding:14px 16px;
            background:#fff;
            border:1px solid #d0d5dd;
            color:#333;
            width: 100%;
            box-sizing: border-box;
            font-size: 1rem;
            font-family: inherit;
        }

        .form-control:focus {
            border-color:#6a0dad;
            box-shadow:0 0 0 3px rgba(106,13,173,0.15);
            outline: none;
        }

        label {
            font-weight:500;
            margin-bottom:6px;
            display: block;
            color: #1e293b;
        }

        .btn-gradient {
            background: linear-gradient(135deg,#6a0dad,#FFD700);
            color:#fff;
            font-weight:700;
            border:none;
            border-radius:25px;
            padding:15px;
            width:100%;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(106,13,173,0.3);
        }

        .alert {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 12px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #34d399;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #f87171;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
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

        /**
         * ============================================================
         * 8. RESPONSIVE PATCHES 
         * ============================================================
         */
        @media (max-width: 992px) {
            .footer-container { 
                flex-direction: column; 
                align-items: center; 
                text-align: center; 
                flex-wrap: wrap; 
            }
            .footer-links { 
                margin-left: 0; 
                margin-top: 30px; 
            }
            .foot-social-icon { 
                justify-content: center; 
            }
            .footer-newsletter form { 
                flex-direction: column; 
                border-radius: 20px; 
            }
        }

        @media (max-width: 768px) {
            .form-container { 
                padding: 30px 20px; 
            }
            h2 { 
                font-size: 2rem; 
            }
            p.intro { 
                font-size: 1rem; 
            }
        }

        @media (max-width: 480px) {
            .footer-newsletter button { 
                width: 100%; 
            }
        }
        .partner-hero {
            position: relative;
            padding: 160px 20px 40px;
            background: #ffffff;
            text-align: center;
        }
        .partner-hero-title {
            font-size: 3.0rem;
            font-weight: 900;
            color: #000000;
            margin-bottom: 25px;
            line-height: 1.2;
        }
        .partner-hero-desc {
            max-width: 850px;
            margin: 0 auto;
            font-size: 1.25rem;
            line-height: 1.8;
            color: #475569;
        }
        .partner-grid-section {
            background: #ffffff;
            padding: 40px 20px 0;
        }
        .partner-grid-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: stretch;
        }
        .partner-box {
            background: #f8fafc;
            border-radius: 20px;
            padding: 45px 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            border: 1px solid #e2e8f0;
            transition: transform 0.3s;
        }
        .partner-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(106, 13, 173, 0.08);
            border-color: rgba(106, 13, 173, 0.2);
        }
        .partner-box-title {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: 30px;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 15px;
        }
        .partner-box-title i {
            color: var(--primary);
            font-size: 1.8rem;
        }
        .partner-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .partner-list.bullets li {
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            color: #334155;
            font-size: 1.15rem;
            line-height: 1.6;
        }
        .partner-list.bullets li::before {
            content: '\f058';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--success-color);
            font-size: 1.3rem;
        }
        .partner-list.diamonds li {
            background: white;
            padding: 18px 25px;
            border-radius: 12px;
            margin-bottom: 15px;
            font-weight: 700;
            color: #1e3a8a;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
            font-size: 1.15rem;
            transition: all 0.3s ease;
        }
        .partner-list.diamonds li:hover {
            transform: scale(1.02) translateX(5px);
            border-color: #FFD700;
            box-shadow: 0 8px 15px rgba(255, 215, 0, 0.15);
        }
        .partner-list.diamonds li i {
            color: #FFD700;
            font-size: 1.4rem;
        }
        .partner-contact-box {
            text-align: center;
            margin: 60px auto 0;
            max-width: 900px;
            padding: 40px;
            background: linear-gradient(135deg, rgba(106, 13, 173, 0.04), rgba(30, 58, 138, 0.04));
            border-radius: 20px;
            border: 1px dashed rgba(106, 13, 173, 0.3);
        }
        .partner-contact-box h3 {
            font-size: 1.6rem;
            color: #1e293b;
            margin-bottom: 15px;
            font-weight: 800;
        }
        .partner-contact-box a {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            transition: color 0.3s;
        }
        .partner-contact-box a:hover {
            color: #1e3a8a;
            text-decoration: underline;
        }
        @media (max-width: 992px) {
            .partner-grid-container {
                grid-template-columns: 1fr;
            }
            .partner-hero-title { font-size: 2.6rem; }
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

        <div id="hamburger" class="hamburger d-lg-none">
            <div class="hamburger-box">
                <span class="h-line line-top"></span>
                <span class="h-line line-mid"></span>
                <span class="h-line line-bot"></span>
            </div>
        </div>

    </div>
</header>


<div style="background-color: #ffffff;">

<div class="partner-hero">
    <h1 class="partner-hero-title">Partner with the Wennovate Africa Summit 2026</h1>
    <p class="partner-hero-desc">
        The Wennovate Africa Summit 2026 brings together founders, investors, policymakers and diaspora leaders to accelerate Africa’s innovation economy. Hosted in Addis Ababa, the summit creates a platform where capital, ideas and partnerships converge to support scalable African ventures.
    </p>
    <div style="margin-top: 30px;">
        <a href="{{ url('/detailed-partner') }}" class="btn-gradient" style="display: inline-block; width: auto; padding: 12px 30px; text-decoration: none;">More Details</a>
    </div>
</div>

<div class="partner-grid-section">
    <div class="partner-grid-container">
        
        <div class="partner-box">
            <div class="partner-box-title"><i class="fas fa-handshake"></i> Why Partner</div>
            <ul class="partner-list bullets">
                <li>Access high-potential startups through curated pitch sessions and the Ubora Challenge</li>
                <li>Connect with investors and decision-makers across Africa’s innovation ecosystem</li>
                <li>Position your organisation as a leader in African innovation and entrepreneurship</li>
                <li>Engage Africa’s global diaspora networks of founders, investors and experts</li>
                <li>Shape policy dialogue on innovation, digital markets and startup growth</li>
            </ul>
        </div>

        <div class="partner-box">
            <div class="partner-box-title"><i class="fas fa-gem"></i> Partnership Opportunities</div>
            <ul class="partner-list diamonds">
                <li><i class="fas fa-star"></i> Strategic Partner</li>
                <li><i class="fas fa-chart-line"></i> Investment Partner</li>
                <li><i class="fas fa-lightbulb"></i> Innovation Partner</li>
                <li><i class="fas fa-network-wired"></i> Ecosystem Partner</li>
                <li><i class="fas fa-bullhorn"></i> Media Partner</li>
            </ul>
        </div>
        
    </div>
    
    <div class="partner-contact-box">
        <h3>Join organisations shaping the future of African innovation.</h3>
        <p style="margin-bottom: 0;">Contact: <a href="mailto:partnerships@wennovate.africa">partnerships@wennovate.africa</a></p>
    </div>
</div>

<section class="sponsor-section" style="background-color: #ffffff; padding-top: 80px;">
    <h2>Become a Partner</h2>
    <p class="intro">Fill out the form below to register your interest in partnering with us.</p>

    <div class="form-container">
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('sponsor.store') }}" enctype="multipart/form-data" id="partnerForm" novalidate>
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label for="company_name">Company Name *</label>
                    <input
                        type="text"
                        id="company_name"
                        name="company_name"
                        class="form-control"
                        placeholder="Enter company name"
                        required
                        pattern="[A-Za-z\s]+"
                        title="Company name should only contain letters and spaces"
                        oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                    >
                    <div class="field-error" id="company_name_error" style="color:#ef4444;font-size:0.85rem;margin-top:4px;display:none;">Please enter only letters and spaces.</div>

                    <label class="mt-3" for="email">Email *</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="e.g. name@company.com"
                        required
                        pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}"
                        title="Please enter a valid email address (e.g., name@domain.com)"
                        onblur="verifyPartnerEmail(this)"
                    >
                    <div class="field-error" id="email_error" style="color:#ef4444;font-size:0.85rem;margin-top:4px;display:none;">Please enter a valid email (e.g., name@domain.com).</div>
                </div>

                <div class="col-md-6">
                    <label for="phone">Contact Number *</label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        class="form-control"
                        required
                        pattern="^(0\d{9}|\+251\s?\d{9})$"
                        title="Phone number must be exactly format 0009090909 or +251 965879809"
                    >
                    <div class="field-error" id="phone_error" style="color:#ef4444;font-size:0.85rem;margin-top:4px;display:none;">Enter a valid phone number (10–15 digits, e.g. 0009090909 or +251 965879809).</div>

                    <label class="mt-3" for="company_logo">Company Logo *</label>
                    <input
                        type="file"
                        id="company_logo"
                        name="company_logo"
                        class="form-control"
                        accept="image/*"
                        required
                    >
                    <div class="field-error" id="company_logo_error" style="color:#ef4444;font-size:0.85rem;margin-top:4px;display:none;">Please upload your company logo.</div>
                </div>

            </div>

            <div style="display: flex; justify-content: center; margin-top: 1.5rem;">
                <button type="submit" class="btn btn-gradient" style="padding: 12px 28px; font-size: 1.1rem; width: auto; min-width: 220px;">
                    Submit 
                </button>
            </div>

        </form>
    </div>
</section>
</div>

<script>
/**
 * Partner Form Validation
 */
(function() {
    const form = document.getElementById('partnerForm');
    if (!form) return;

    // Quick check: strict regex for exact 10 or 13 digits
    function isValidPhone(val) {
        return /^(0\d{9}|\+251\s?\d{9})$/.test(val);
    }

    // Email validation
    function isValidEmail(val) {
        return /^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/.test(val);
    }

    // Company name: only letters and spaces, min 2 chars
    function isValidCompanyName(val) {
        return /^[A-Za-z\s]{2,}$/.test(val.trim());
    }

    function showError(id, show) {
        const el = document.getElementById(id);
        if (el) el.style.display = show ? 'block' : 'none';
    }

    form.addEventListener('submit', function(e) {
        let valid = true;

        const companyName = document.getElementById('company_name').value;
        if (!isValidCompanyName(companyName)) {
            showError('company_name_error', true);
            valid = false;
        } else {
            showError('company_name_error', false);
        }

        const email = document.getElementById('email').value;
        if (!isValidEmail(email)) {
            showError('email_error', true);
            valid = false;
        } else {
            showError('email_error', false);
        }

        const phone = document.getElementById('phone').value;
        if (!isValidPhone(phone)) {
            showError('phone_error', true);
            valid = false;
        } else {
            showError('phone_error', false);
        }

        const logo = document.getElementById('company_logo').files.length;
        if (logo === 0) {
            showError('company_logo_error', true);
            valid = false;
        } else {
            showError('company_logo_error', false);
        }

        if (!valid) {
            e.preventDefault();
        }
    });

    // Real-time validation hints
    document.getElementById('phone').addEventListener('input', function() {
        if (this.value && !isValidPhone(this.value)) {
            showError('phone_error', true);
        } else {
            showError('phone_error', false);
        }
    });

    document.getElementById('email').addEventListener('input', function() {
        if (this.value && !isValidEmail(this.value)) {
            document.getElementById('email_error').innerText = 'Please enter a valid email (e.g., name@domain.com).';
            showError('email_error', true);
            form.querySelector('button[type="submit"]').disabled = true;
        } else {
            showError('email_error', false);
            form.querySelector('button[type="submit"]').disabled = false;
        }
    });

    // Real-world server verification on blur
    document.getElementById('email').addEventListener('blur', function() {
        if (!this.value || !isValidEmail(this.value)) return;
        
        const errorEl = document.getElementById('email_error');
        const submitBtn = form.querySelector('button[type="submit"]');

        const fd = new FormData();
        fd.append('_token', '{{ csrf_token() }}');
        fd.append('email', this.value);

        fetch("{{ url('/verify-email-ajax') }}", { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(!data.success) {
                    errorEl.innerText = data.message;
                    showError('email_error', true);
                    submitBtn.disabled = true;
                } else {
                    showError('email_error', false);
                    submitBtn.disabled = false;
                }
            }).catch(e => console.log(e));
    });
})();
</script>

<script>
/**
 * --------------------------------------------------------------------
 * MOBILE INTERFACE CONTROLLER (Preserved from register.php)
 * --------------------------------------------------------------------
 * Handles the mobile canvas particles, toggle states, and 
 * document scrolling.
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

<footer class="footer">
    <div class="footer-container">
        
        <div class="footer-brand">
            <span class="footer-logo">
                Wennovate Africa<br>Summit 2026
            </span>
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
            <form>
                <input 
                    type="email" 
                    placeholder="Enter your email" 
                    required
                >
                <button type="submit">
                    Subscribe
                </button>
            </form>
        </div>
        
    </div>
    
    <div class="footer-bottom">
        &copy; 2026 Wennovate Africa Summit. All Rights Reserved. 
    </div>
</footer>

<script>
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('topnav');
    if(navbar) navbar.classList.toggle('scrolled', window.scrollY > 80);
});

async function verifyPartnerEmail(inputEl) {
    const val = inputEl.value;
    const errorEl = document.getElementById('email_error');
    const submitBtn = document.querySelector('#partnerForm button[type="submit"]');
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

    @include('partials.cookie-banner')
</body>
</html>