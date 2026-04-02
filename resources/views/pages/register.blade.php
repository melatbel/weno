<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register / Ticket - Wennovate Africa</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --border-light: #e2e8f0;
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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
         * 3. DESKTOP NAVBAR (STRICT PRESERVATION)
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

        /**
         * ============================================================
         * 4. MOBILE NAVIGATION (GLASSMORPHIC SYSTEM)
         * ============================================================
         */
        @media (max-width: 992px) {
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

            .hamburger-box { width: 24px; height: 18px; position: relative; }
            .h-line {
                display: block; width: 100%; height: 2px;
                background: #000000; border-radius: 4px; position: absolute;
                transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            }
            .line-top { top: 0; }
            .line-mid { top: 50%; transform: translateY(-50%); }
            .line-bot { bottom: 0; }

            .hamburger.active .line-top { top: 50%; transform: translateY(-50%) rotate(45deg); background: var(--secondary); }
            .hamburger.active .line-mid { opacity: 0; transform: translateX(-10px); }
            .hamburger.active .line-bot { bottom: 50%; transform: translateY(50%) rotate(-45deg); background: var(--secondary); }

            .navigation-container {
                position: fixed; top: 0; right: 0; width: 100%; height: 100vh;
                background: radial-gradient(circle at top right, #1a0b2e 0%, #000000 100%);
                z-index: 1500; display: flex; flex-direction: column;
                justify-content: center; align-items: center; padding: 40px;
                opacity: 0; visibility: hidden; clip-path: circle(0% at 90% 5%);
                transition: all 0.8s var(--ease-in-out-cubic); pointer-events: none;
            }

            .navigation-container.show {
                opacity: 1; visibility: visible; clip-path: circle(150% at 90% 5%); pointer-events: auto;
            }

            #particle-canvas { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; pointer-events: none; }

            .navigation-menu { flex-direction: column; gap: 12px; width: 100%; text-align: center; z-index: 2; }
            .navigation-menu li { opacity: 0; transform: translateY(30px); transition: all 0.5s var(--ease-in-out-cubic); }
            .navigation-container.show .navigation-menu li {
                opacity: 1; transform: translateY(0); transition-delay: calc(0.1s + (var(--i) * 0.08s));
            }

            .navigation-menu li a { font-size: 1.35rem; font-weight: 700; color: rgba(255, 255, 255, 0.8); padding: 12px 20px; display: inline-block; }
            .navigation-menu li a:hover { color: #fff; transform: scale(1.05); }

            .mobile-nav-footer { margin-top: 40px; text-align: center; opacity: 0; transform: translateY(20px); transition: 0.5s ease 0.6s; z-index: 2; }
            .navigation-container.show .mobile-nav-footer { opacity: 1; transform: translateY(0); }

            .mob-socials { display: flex; justify-content: center; gap: 20px; margin-top: 15px; }
            .mob-socials a {
                width: 45px; height: 45px; border-radius: 50%;
                background: rgba(255,255,255,0.05); display: flex;
                align-items: center; justify-content: center; color: #fff;
                transition: 0.3s; border: 1px solid rgba(255,255,255,0.1);
                text-decoration: none;
            }
            .mob-socials a:hover, .mob-socials a:active {
                background: var(--secondary);
                color: var(--dark);
                box-shadow: 0 0 15px var(--secondary);
                transform: translateY(-5px);
            }
        }

        /**
         * ============================================================
         * 5. RESPONSIVE EARLY BIRD BADGE
         * ============================================================
         */
        .early-bird-hero { 
            position: absolute; top: -40px; left: -60px; display: flex; align-items: center; justify-content: center;
            width: 150px; height: 150px; background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff; font-weight: 800; border-radius: 50%; text-align: center; text-decoration: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2); animation: float 3s ease-in-out infinite; z-index: 5;
            font-size: 1.2rem; line-height: 1.3;
        }

        @media (max-width: 992px) {
            .early-bird-hero {
                width: 110px; height: 110px; font-size: 0.9rem;
                left: -20px; top: -30px;
            }
        }

        @media (max-width: 550px) {
            .early-bird-hero {
                width: 90px; height: 90px; font-size: 0.75rem;
                left: -10px; top: -40px;
            }
        }

        /**
         * ============================================================
         * 6. PHOTO UPLOAD CUSTOM UI (ADJUSTED FOR UNIFORM GRID)
         * ============================================================
         */
        .photo-input-container {
            margin-bottom: 15px;
            width: 100%;
            height: 49px; 
        }
        
        .custom-photo-btn {
            display: flex; 
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
            width: 100%; 
            height: 100%; 
            padding: 0 14px; 
            background: #fcfcfd; 
            border: 1px solid var(--border-light);
            border-radius: 12px; 
            color: #94a3b8; 
            font-weight: 500;
            font-family: inherit;
            font-size: 15px;
            text-align: left; 
            cursor: pointer; 
            transition: 0.3s;
            box-sizing: border-box;
        }
        
        .custom-photo-btn i {
            color: #94a3b8;
            font-size: 14px;
            width: 19px; 
            text-align: center;
        }

        .custom-photo-btn:hover { 
            border-color: var(--primary); 
            background: #fff; 
            color: var(--primary); 
        }
        
        .photo-input-container.has-file .custom-photo-btn {
            display: none !important;
        }

        .file-info-bar {
            display: none; 
            width: 100%; 
            height: 100%;
            padding: 0 14px;
            background: #ecfdf5; 
            border: 1px solid #10b981;
            border-radius: 12px; 
            color: #065f46; 
            font-size: 0.9rem;
            font-weight: 700; 
            align-items: center; 
            gap: 10px;
            box-sizing: border-box;
        }

        .photo-input-container.has-file .file-info-bar {
            display: flex;
        }

        /**
         * ============================================================
         * 7. CORE TICKETING UI (PRESERVED)
         * ============================================================
         */
        .page-wrapper { display: flex; justify-content: center; padding: 160px 15px 50px; }
        .ticket-card { 
            background: white; border-radius: 30px; padding: 40px 30px; width: 100%; max-width: 550px; 
            box-shadow: 0 20px 50px rgba(0,0,0,0.1); position: relative; border: 1px solid rgba(255,255,255,0.6);
        }

        .ticket-option { 
            display: flex; align-items: center; justify-content: space-between; 
            padding: 18px; border-radius: 20px; background: var(--soft-bg); margin-bottom: 15px; border: 1px solid var(--border-light); 
        }

        .qty-btn { width: 35px; height: 35px; border-radius: 8px; border: none; cursor: pointer; font-size: 1.4rem; font-weight: 700; background: var(--border-light); display: flex; align-items: center; justify-content: center; }
        .qty-input { width: 45px; text-align: center; border: none; font-weight: 800; font-size: 1.3rem; background: transparent; }

        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.85); backdrop-filter: blur(12px); display: none; justify-content: center; align-items: center; z-index: 10000; padding: 20px; }
        .modal-content { background: #ffffff; width: 100%; max-width: 680px; border-radius: 35px; padding: 40px; position: relative; max-height: 85vh; overflow-y: auto; box-shadow: 0 30px 60px rgba(0,0,0,0.4); }

        .attendee-box { background: #fff; border: 1px solid #eef2f6; border-radius: 24px; padding: 25px; margin-bottom: 25px; box-shadow: 0 10px 20px rgba(0,0,0,0.03); border-left: 6px solid var(--primary); }
        .attendee-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .attendee-title { font-weight: 800; color: var(--dark); font-size: 1rem; display: flex; align-items: center; gap: 8px; }
        .attendee-badge { font-size: 0.7rem; font-weight: 800; background: #f0e6ff; color: var(--primary); padding: 4px 12px; border-radius: 50px; text-transform: uppercase; }

        .input-wrapper { position: relative; margin-bottom: 15px; }
        .input-wrapper i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 14px; pointer-events: none; }
        .input-field { width: 100%; height: 49px; padding: 0 14px 0 45px; border-radius: 12px; border: 1px solid var(--border-light); font-family: inherit; font-size: 15px; background: #fcfcfd; transition: 0.3s; box-sizing: border-box; }
        .input-field:focus { border-color: var(--primary); background: #fff; outline: none; }

        .input-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }

        @media (max-width: 768px) {
            .modal-content { padding: 30px 20px; border-radius: 25px; }
            .input-grid { grid-template-columns: 1fr !important; }
        }

        .buy-btn { width: 100%; padding: 18px; border-radius: 18px; background: linear-gradient(135deg, #22c55e, #16a34a); color: white; border: none; font-weight: 700; font-size: 1.1rem; cursor: pointer; margin-top: 15px; transition: 0.3s; }
        .buy-btn:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(22, 163, 74, 0.3); }

        @keyframes float { 0%,100%{transform:translateY(0);} 50%{transform:translateY(-10px);} }

        /**
         * ============================================================
         * 8. DYNAMIC CART & SELECTED TICKETS UI (NEW)
         * ============================================================
         */
        #cart-wrapper {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px dashed var(--border-light);
            display: none; /* Hidden by default, shown via JS */
            animation: fadeIn 0.4s var(--ease-in-out-cubic);
        }

        .cart-header {
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .selected-item-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-left: 4px solid var(--primary);
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 12px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            animation: slideInUp 0.3s var(--ease-in-out-cubic);
        }

        .selected-item-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
            border-color: #cbd5e1;
        }

        .item-info-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .item-title-qty {
            font-weight: 800;
            font-size: 1.05rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .item-qty-badge {
            background: #f1f5f9;
            color: var(--primary);
            padding: 2px 8px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            border: 1px solid var(--border-light);
        }

        .item-price-unit {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .item-action-group {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .item-subtotal {
            font-weight: 800;
            color: var(--primary);
            font-size: 1.15rem;
        }

        .remove-ticket-btn {
            background: #fee2e2;
            color: var(--error-color);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .remove-ticket-btn:hover {
            background: var(--error-color);
            color: #ffffff;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
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
    
    </style>
</head>
<body>

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
                <p style="color:var(--secondary); font-size:0.8rem; letter-spacing:2px; text-transform:uppercase; font-weight:700;">
                    Secure Your Spot
                </p>
                <div class="mob-socials">
                    <a href="https://www.facebook.com/share/14aF1GGHqLB/"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/wennovate.africa?igsh=NHg2bjJ0N3hod2oy"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </nav>

        <div id="hamburger" class="hamburger d-lg-none">
            <div class="hamburger-box">
                <span class="h-line line-top"></span>
                <span class="h-line line-mid"></span>
                <span class="h-line line-bot"></span>
            </div>
        </div>

    </div>
</header>

<div class="page-wrapper">
    <div class="ticket-card">
        <a href="#" class="early-bird-hero">Early Bird<br>30% Off</a>
        
        <div style="text-align:center; font-weight:600; color:var(--primary); background:rgba(255,215,0,0.15); padding: 10px; border-radius:3px; margin-bottom:20px; font-size: 1.1rem;">
            Limited-time offer for founders, students & diaspora
        </div>

        <h2 style="text-align:center; font-weight:800; margin-bottom: 5px;">Get Your Tickets</h2>
        <p style="text-align:center; color:#64748b; margin-bottom: 25px;">Select quantity for each ticket type</p>

        @php 
        /**
         * Ticket Configuration Array
         * Format: [Ticket Name, Price in USD, Optional Subtitle/Description]
         */
        $tickets = [
            ['Day 1', 50, ''], 
            ['Day 2', 60, ''], 
            ['Day 3', 70, ''], 
            ['Full Pass', 150, 'Includes Day 1, Day 2 & Day 3'] // Added description here
        ];
        @endphp

        @foreach($tickets as $index => $t)
        @php
            $ticket_id = 'ticket-' . strtolower(str_replace(' ', '-', $t[0])) . '-' . $index;
        @endphp
        <div class="ticket-option">
            <div>
                <div style="font-weight:700; font-size: 1.1rem;">{{ $t[0] }}</div>
                
                @if(!empty($t[2]))
                    <div style="font-size: 0.8rem; color: #64748b; margin-top: 2px; margin-bottom: 4px; font-weight: 500;">
                        <i class="fas fa-layer-group" style="color:var(--primary); opacity:0.7;"></i> {{ $t[2] }}
                    </div>
                @endif

                <div style="color:var(--primary); font-weight:800;">
                    ${{ $t[1] }} <small style="color:#94a3b8; font-weight:500; font-size:0.8rem;">/ ≈ {{ $t[1]*125 }} ETB</small>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap:12px;">
                <button onclick="changeQty(this, -1)" class="qty-btn">−</button>
                <input type="number" readonly value="0" class="qty-input" id="{{ $ticket_id }}" data-price="{{ $t[1] }}" data-name="{{ $t[0] }}">
                <button onclick="changeQty(this, 1)" class="qty-btn">+</button>
            </div>
        </div>
        @endforeach

        <div id="cart-wrapper">
            <div class="cart-header">
                <i class="fas fa-shopping-cart" style="color:var(--primary);"></i> Your Selections
            </div>
            <div id="cart-items-container">
                </div>
        </div>
        <div class="summary-row" style="display:grid; grid-template-columns: 1fr 2fr; gap:15px; margin-top:25px;">
            <div class="stat-box" style="background:#f1f5f9; padding:15px; border-radius:15px; text-align:center; border:1px solid var(--border-light);">
                <div style="font-size:0.7rem; font-weight:700; color:#64748b;">TICKETS</div>
                <div id="display-qty" style="font-size:1.4rem; font-weight:800;">0</div>
            </div>
            <div class="stat-box" style="background:#f1f5f9; padding:15px; border-radius:15px; text-align:center; border:1px solid var(--border-light);">
                <div style="font-size:0.7rem; font-weight:700; color:#64748b;">TOTAL PAYABLE</div>
                <div style="font-size:1.3rem; font-weight:800; color:var(--primary);">$<span id="display-usd">0</span> / <span id="display-etb">0 ETB</span></div>
            </div>
        </div>
        <button class="buy-btn" onclick="openCheckout()">Checkout Now &rarr;</button>
    </div>
</div>

<div class="modal-overlay" id="modal">
    <div class="modal-content">
        <button class="close-btn" style="position:absolute; top:25px; right:25px; font-size:2rem; color:#94a3b8; border:none; background:none; cursor:pointer;" onclick="closeModal()">&times;</button>

        <div id="step1" class="step-ui active">
            <div style="margin-bottom:30px;">
                <h3 style="font-weight:800; margin-bottom:5px; font-size: 1.6rem;">Attendee Details</h3>
                <p style="color:#64748b; font-size:0.95rem;">Enter information for each ticket holder.</p>
            </div>
            <div id="attendee-container"></div>
            <button class="buy-btn" onclick="validateStep1()">Continue to Payment &rarr;</button>
        </div>

        <div id="step2" class="step-ui" style="display:none;">
            <h3 style="font-weight:800; margin-bottom:5px; font-size: 1.6rem;">Review & Pay</h3>
            <p style="color:#64748b; margin-bottom:20px; font-size:0.95rem;">Verify details before completing purchase.</p>
            <div id="review-info" style="margin-bottom:20px;"></div>

            <!-- Chapa Redirect Notice -->
            <div id="chapa-redirect-notice" style="display:none; text-align:center; padding:30px 20px; background:linear-gradient(135deg, #f0fdf4, #ecfdf5); border:2px solid #22c55e; border-radius:20px; margin-bottom:20px;">
                <div style="margin-bottom:15px;">
                    <i class="fas fa-spinner fa-spin" style="font-size:2.5rem; color:#22c55e;"></i>
                </div>
                <h4 style="font-weight:800; color:var(--dark); margin-bottom:8px; font-size:1.2rem;">Redirecting to Chapa...</h4>
                <p style="color:#64748b; font-size:0.95rem; margin:0;">We are redirecting you to Chapa for secure payment. Please wait...</p>
            </div>

            <button class="buy-btn" id="finalBtn" onclick="submitOrder()">Confirm & Place Order</button>
            <button onclick="toggleStep(1)" style="width:100%; border:none; background:none; margin-top:15px; cursor:pointer; color:#64748b; font-weight:600; text-decoration: underline;">&larr; Back to Attendee Info</button>
        </div>
    </div>
</div>

<script>
/**
 * --------------------------------------------------------------------
 * MOBILE INTERFACE CONTROLLER & PARTICLES
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
        if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) this.reset();
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
    for (let i = 0; i < 50; i++) particlesArray.push(new Particle());
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particlesArray.forEach(p => { p.update(); p.draw(); });
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

/**
 * --------------------------------------------------------------------
 * TICKET, PRICE, AND ADVANCED CART LOGIC
 * --------------------------------------------------------------------
 */
const RATE = 125;
let orderData = { usd: 0, qty: 0, attendees: [] };

window.addEventListener('scroll', function() {
    const topNav = document.getElementById('topnav');
    if (window.scrollY > 50) topNav.classList.add('scrolled');
    else topNav.classList.remove('scrolled');
});

/**
 * Primary Quantity Change Handler
 * Triggered by the + / - buttons on the ticket list.
 */
function changeQty(btn, delta) {
    const input = btn.parentElement.querySelector('input');
    input.value = Math.max(0, parseInt(input.value) + delta);
    
    // Call the centralized cart sync engine
    syncCartState();
}

/**
 * Advanced Cart System Core
 * Calculates totals, updates summary, and manages the dynamic UI wrapper.
 */
function syncCartState() {
    let usd = 0;
    let qty = 0;
    let cartHasItems = false;
    
    const cartWrapper = document.getElementById('cart-wrapper');
    const cartContainer = document.getElementById('cart-items-container');
    
    // Clear current rendering
    cartContainer.innerHTML = '';

    document.querySelectorAll('input.qty-input').forEach(input => {
        const val = parseInt(input.value);
        const price = parseInt(input.dataset.price);
        const name = input.dataset.name;
        const id = input.id;

        if (val > 0) {
            cartHasItems = true;
            usd += (val * price);
            qty += val;
            
            const itemSubtotalUSD = val * price;
            const itemSubtotalETB = itemSubtotalUSD * RATE;

            // Generate Cart UI Item
            cartContainer.innerHTML += `
                <div class="selected-item-card" id="cart-node-${id}">
                    <div class="item-info-group">
                        <div class="item-title-qty">
                            ${name} <span class="item-qty-badge">x${val}</span>
                        </div>
                        <div class="item-price-unit">
                            $${price} / ≈ ${price * RATE} ETB each
                        </div>
                    </div>
                    <div class="item-action-group">
                        <div class="item-subtotal">
                            $${itemSubtotalUSD}
                        </div>
                        <button class="remove-ticket-btn" onclick="removeTicketFromCart('${id}')" title="Remove Ticket">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;
        }
    });

    // Toggle Cart Visibility
    cartWrapper.style.display = cartHasItems ? 'block' : 'none';
    
    // Update Global State
    orderData.usd = usd;
    orderData.qty = qty;
    
    // Update Static UI
    document.getElementById('display-qty').textContent = qty;
    document.getElementById('display-usd').textContent = usd;
    document.getElementById('display-etb').textContent = (usd * RATE).toLocaleString() + ' ETB';
}

/**
 * Remove Ticket Handler
 * Triggered by the 'X' button inside the dynamic cart wrapper.
 */
function removeTicketFromCart(inputId) {
    const targetInput = document.getElementById(inputId);
    if(targetInput) {
        targetInput.value = 0;
        syncCartState(); // Re-render everything
    }
}

/**
 * --------------------------------------------------------------------
 * REGISTRATION MODAL & FORM LOGIC
 * --------------------------------------------------------------------
 */
function handlePhotoInsertion(input) {
    const container = input.closest('.photo-input-container');
    const nameLabel = container.querySelector('.file-name-text');
    
    if(input.files && input.files[0]) {
        container.classList.add('has-file');
        nameLabel.textContent = input.files[0].name;
    } else {
        container.classList.remove('has-file');
    }
}

function openCheckout() {
    if(orderData.qty === 0) return alert("Please select at least one ticket.");
    const container = document.getElementById('attendee-container');
    container.innerHTML = '';
    let count = 1;
    
    document.querySelectorAll('input.qty-input').forEach(input => {
        for(let i=0; i < input.value; i++) {
            container.innerHTML += `
                <div class="attendee-box" data-ticket="${input.dataset.name}">
                    <div class="attendee-header">
                        <span class="attendee-title"><i class="fas fa-user"></i> Attendee ${count}</span>
                        <span class="attendee-badge">${input.dataset.name}</span>
                    </div>
                    <div class="input-grid">
                        <div class="input-wrapper"><i class="fas fa-user"></i><input type="text" placeholder="First Name*" class="input-field fname" required pattern="[A-Za-z\s]+" title="First name should only contain letters and spaces" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"></div>
                        <div class="input-wrapper"><i class="fas fa-signature"></i><input type="text" placeholder="Last Name*" class="input-field lname" required pattern="[A-Za-z\s]+" title="Last name should only contain letters and spaces" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"></div>
                    </div>
                    <div class="input-wrapper"><i class="fas fa-envelope"></i><input type="email" placeholder="Email Address*" class="input-field email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address" onblur="verifyAttendeeEmail(this)"></div>
                    <div class="email-error-msg" style="color:#ef4444;font-size:0.8rem;display:none;margin-top:-10px;margin-bottom:10px;margin-left:10px;"></div>
                    <div class="input-wrapper"><i class="fas fa-phone"></i><input type="tel" placeholder="Phone Number*" class="input-field phone" required pattern="[\+\s0-9]{10,14}" maxlength="14" title="Phone number should be 10-12 digits, allowing '+' and spaces" oninput="this.value = this.value.replace(/[^\+\s0-9]/g, '')"></div>
                    <div class="input-grid">
                        <div class="input-wrapper"><i class="fas fa-building"></i><input type="text" placeholder="Company Name*" class="input-field company" required></div>
                        <div class="input-wrapper"><i class="fas fa-briefcase"></i><input type="text" placeholder="Position*" class="input-field position" required></div>
                    </div>
                </div>`;
            count++;
        }
    });

    document.querySelectorAll('.custom-photo-btn').forEach(lbl => {
        lbl.onclick = () => lbl.nextElementSibling.nextElementSibling.click();
    });
    
    document.getElementById('modal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeModal() { 
    document.getElementById('modal').style.display = 'none'; 
    document.body.style.overflow = 'auto';
}

async function verifyAttendeeEmail(inputEl) {
    const val = inputEl.value;
    const errorEl = inputEl.closest('.attendee-box').querySelector('.email-error-msg');
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
        } else {
            errorEl.style.display = 'none';
            inputEl.style.borderColor = '#22c55e';
        }
    } catch(e) {
        console.error('Check failed', e);
    }
}

async function validateStep1() {
    const boxes = document.querySelectorAll('.attendee-box');
    orderData.attendees = [];
    let allFilled = true;
    
    for (const box of boxes) {
        const fn = box.querySelector('.fname').value.trim();
        const ln = box.querySelector('.lname').value.trim();
        const em = box.querySelector('.email').value.trim();
        const ph = box.querySelector('.phone').value.trim();
        const comp = box.querySelector('.company').value.trim();
        const pos = box.querySelector('.position').value.trim();
        
        if(!fn || !ln || !em || !ph || !comp || !pos) {
            allFilled = false;
            alert("Please fill in all required fields for each attendee.");
            return;
        }

        // 1. Name Validation (Letters and spaces only)
        const nameRegex = /^[A-Za-z\s]+$/;
        if (!nameRegex.test(fn)) {
            alert(`First Name for Attendee ${orderData.attendees.length + 1} should only contain letters and spaces.`);
            return;
        }
        if (!nameRegex.test(ln)) {
            alert(`Last Name for Attendee ${orderData.attendees.length + 1} should only contain letters and spaces.`);
            return;
        }

        // 2. Email Validation (Strict format & logic)
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(em)) {
            alert(`Please enter a valid email address for Attendee ${orderData.attendees.length + 1} (e.g., name@domain.com).`);
            return;
        }
        const errorDiv = box.querySelector('.email-error-msg');
        if (errorDiv && errorDiv.style.display === 'block') {
            alert(`Please resolve the invalid email for Attendee ${orderData.attendees.length + 1} before proceeding.`);
            return;
        }

        // 3. Phone Validation (10-14 chars, digits/+/spaces)
        const phoneRegex = /^[\+\s0-9]{10,14}$/;
        if (!phoneRegex.test(ph)) {
            alert(`Phone number for Attendee ${orderData.attendees.length + 1} should be 10-12 digits, allowing '+' and spaces (e.g., 0909090909 or +251 945659565).`);
            return;
        }

        orderData.attendees.push({ 
            name: fn + ' ' + ln, 
            email: em, 
            phone: ph, 
            ticket: box.dataset.ticket,
            photo: '',
            company: comp,
            position: pos
        });
    }

    if(!allFilled) return alert("Please fill in all required fields for each attendee.");
    
    let html = '';
    orderData.attendees.forEach(a => {
        const firstLetter = a.name && a.name.length > 0 ? a.name.charAt(0).toUpperCase() : '?';
        const placeholderSvg = `data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'><rect width='48' height='48' x='1' y='1' rx='10' fill='%23f1f5f9' stroke='%23e2e8f0' stroke-width='1'/><text x='50%' y='54%' dominant-baseline='middle' text-anchor='middle' font-family='system-ui, sans-serif' font-weight='900' font-size='22' fill='%2394a3b8'>${firstLetter}</text></svg>`;
        const photoSrc = a.photo ? a.photo : placeholderSvg;
        html += `
            <div class="review-card" style="background:#fdfdfd; border:1px solid #edf2f7; border-radius:15px; padding:15px; margin-bottom:10px;">
                <div style="display:flex; gap:15px; align-items:center; margin-bottom:10px;">
                    <img src="${photoSrc}" style="width:50px; height:50px; border-radius:10px; object-fit:cover;">
                    <div>
                        <div class="review-tag" style="font-size:0.7rem; font-weight:800; background:var(--primary); color:white; padding:2px 8px; border-radius:5px; width:fit-content;">${a.ticket}</div>
                        <div class="review-item" style="display:flex; align-items:center; gap:8px; color:#4a5568; font-size:0.95rem;"><i class="fas fa-user" style="color:var(--primary);"></i> <strong>${a.name}</strong></div>
                    </div>
                </div>
                <div class="review-item" style="color:#4a5568; font-size:0.9rem; margin-top:5px;"><i class="fas fa-envelope" style="color:var(--primary);"></i> ${a.email}</div>
                <div class="review-item" style="color:#4a5568; font-size:0.9rem;"><i class="fas fa-phone" style="color:var(--primary);"></i> ${a.phone}</div>
            </div>`;
    });
    
    html += `<div style="background:var(--primary); color:white; padding:18px; border-radius:18px; margin-top:20px; text-align:center;">
                <div style="font-size:0.8rem; text-transform:uppercase; opacity:0.8;">Total Amount Due</div>
                <div style="font-size:1.6rem; font-weight:800;">$${orderData.usd} / ${(orderData.usd * RATE).toLocaleString()} ETB</div>
              </div>`;
              
    document.getElementById('review-info').innerHTML = html;
    toggleStep(2);
}

function toggleStep(s) {
    document.getElementById('step1').style.display = (s === 1) ? 'block' : 'none';
    document.getElementById('step2').style.display = (s === 2) ? 'block' : 'none';
    document.querySelector('.modal-content').scrollTop = 0;
}

function submitOrder() {
    const btn = document.getElementById('finalBtn');
    btn.disabled = true;
    btn.innerText = "Processing...";

    // Show Chapa redirect notice
    document.getElementById('chapa-redirect-notice').style.display = 'block';

    // Prepare payload for Chapa
    const payload = {
        amount: orderData.usd * {{ 125 }},  // Convert to ETB
        attendees: orderData.attendees,
        tickets_qty: orderData.qty,
        total_usd: orderData.usd
    };

    fetch('/chapa/pay', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success && data.checkout_url) {
            // Redirect to Chapa checkout
            window.location.href = data.checkout_url;
        } else {
            alert(data.message || 'Payment initialization failed. Please try again.');
            btn.disabled = false;
            btn.innerText = 'Confirm & Place Order';
            document.getElementById('chapa-redirect-notice').style.display = 'none';
        }
    })
    .catch(err => {
        console.error('Chapa Error:', err);
        alert('Something went wrong. Please try again.');
        btn.disabled = false;
        btn.innerText = 'Confirm & Place Order';
        document.getElementById('chapa-redirect-notice').style.display = 'none';
    });
}
</script>


</body>
</html>
