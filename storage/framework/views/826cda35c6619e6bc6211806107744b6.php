<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Romdul Delivery'); ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================================================
           VARIABLES — PREMIUM MODERN PALETTE
        ========================================================= */

        :root {
            --primary: #365bff;
            --primary-dark: #1c28d6;
            --primary-light: #628eff;

            --gold: #d4af37;
            --gold-light: #f2d891;

            --orange: #ff9f43;
            --yellow: #2903ff;

            --dark: #0d59f2;
            --dark-2: #135ff8;
            --dark-3: #085bf6;

            --text: #2b2f38;
            --muted: #6b7280;

            --bg: #cfd9df9c;
            --white: #ffffff;

            --border: rgba(17, 24, 39, .08);
            --border-gold: rgba(240, 186, 9, 0.35);

            --radius-sm: 12px;
            --radius-md: 20px;
            --radius-lg: 32px;

            --shadow-sm:
                0 6px 22px rgba(17, 24, 39, .06);

            --shadow-md:
                0 18px 45px rgba(6, 84, 253, 0.1);

            --shadow-lg:
                0 30px 80px rgba(17, 24, 39, .18);

            --shadow-gold:
                0 12px 34px rgba(212, 175, 55, .25);
        }


        /* =========================================================
           GLOBAL
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;

            font-family: 'Poppins', sans-serif;

            color: var(--dark);

            background:
                radial-gradient(
                    circle at 5% 10%,
                    rgba(237, 232, 232, 0.83),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 95% 20%,
                    rgba(212, 175, 55, .07),
                    transparent 28%
                ),
                var(--bg);

            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        /* =========================================================
           LIVE TOP BAR — refined dark glass strip
        ========================================================= */

        .live-bar {
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(90deg, #243562, #10152a 55%, #0a0e18);
            color: #e7e9ee;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .3px;
            border-bottom: 1px solid rgba(212, 175, 55, .18);
        }
        .live-bar-content {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .live-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .live-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #2822c5;

            box-shadow:
                0 0 0 4px rgba(7, 240, 92, 0.12);

            animation: livePulse 1.6s infinite;
        }

        @keyframes livePulse {

            0% {
                box-shadow:
                    0 0 0 0 rgba(230, 234, 231, 0.85);
            }

            70% {
                box-shadow:  0 0 0 7px rgba(34, 197, 94, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(17, 221, 92, 0);
            }

        }

        .live-time {
            color: var(--gold-light);
            font-weight: 600;
        }

        /* =========================================================
           NAVBAR — premium glass
        ========================================================= */

        .nav-glass {

            position: sticky;
            top: 0;
            z-index: 800;
            background:  rgba(229, 231, 237, 0.67);
            backdrop-filter: blur(20px) saturate(160%);
            -webkit-backdrop-filter: blur(20px) saturate(160%);
            border-bottom:  1px solid rgba(21, 83, 215, 0.06);
            box-shadow:
                0 8px 30px rgba(17, 24, 39, .05);

            transition: .3s ease;
        }

        .navbar {
            min-height: 78px;
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .navbar-brand {

            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--dark) !important;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.6px;
            font-family: 'Playfair Display', serif;
        }

        .brand-icon {

            width: 44px;
            height: 44px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 15px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    var(--primary),
                    var(--gold)
                );

            box-shadow:
                0 10px 28px
                rgba(255, 90, 54, .30);

            font-size: 20px;

            transition: .35s cubic-bezier(.4,0,.2,1);
        }

        .navbar-brand:hover .brand-icon {

            transform:
                rotate(-6deg)
                scale(1.08);

            box-shadow:
                0 14px 34px
                rgba(212, 175, 55, .35);
        }

        .brand-text span {
            color: var(--primary);
            font-style: italic;
        }


        /* =========================================================
           NAV LINKS
        ========================================================= */

        .navbar-nav {
            gap: 4px;
        }

        .nav-link {

            position: relative;

            padding:
                9px 15px !important;

            border-radius: 11px;

            color: var(--text) !important;

            font-size: 13px;

            font-weight: 500;

            letter-spacing: .2px;

            transition: .25s ease;
        }

        .nav-link:hover {

            color:
                var(--primary) !important;

            background:
                rgba(255, 90, 54, .07);

            transform:
                translateY(-1px);
        }

        .nav-link.active {

            color:
                var(--primary) !important;

            font-weight: 600;
            background: rgba(212, 175, 55, .08);
        }

        .nav-link.active::after {

            content: "";

            position: absolute;

            left: 50%;

            bottom: 2px;

            width: 5px;
            height: 5px;

            transform:
                translateX(-50%);

            border-radius: 50%;

            background:
                var(--gold);
        }


        /* =========================================================
           SEARCH
        ========================================================= */

        .search-box {
            position: relative;
            width: 240px;
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            pointer-events: none;
            transition: .2s;
        }
        .search-box input {
            width: 100%;
            height: 44px;
            padding:  0 16px 0 43px;
            border: 1px solid var(--border);
            border-radius:
                999px;

            background:
                #ffffff;

            font-size: 12px;

            outline: none;

            box-shadow: inset 0 1px 2px rgba(17,24,39,.03);

            transition: .25s;
        }

        .search-box input:focus {

            background: white;

            border-color:
                var(--border-gold);

            box-shadow:
                0 0 0 4px
                rgba(212, 175, 55, .12);
        }

        .search-box input:focus + i {
            color: var(--gold);
        }


        /* =========================================================
           BUTTONS — premium gradient + gold hover glow
        ========================================================= */

        .btn-modern {

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            min-height: 44px;

            padding:
                9px 20px;

            border: none;

            border-radius: 999px;

            background:
                linear-gradient(
                    135deg,
                    var(--primary),
                    var(--primary-light)
                );

            color: white !important;

            font-size: 12.5px;

            font-weight: 600;

            letter-spacing: .2px;

            box-shadow:
                0 10px 24px
                rgba(255, 90, 54, .25);

            transition: .3s cubic-bezier(.4,0,.2,1);
        }

        .btn-modern:hover {

            color: white !important;

            transform:
                translateY(-2px);

            box-shadow:
                0 14px 32px
                rgba(255, 90, 54, .35);
        }

        .btn-gold {

            background:
                linear-gradient(
                    135deg,
                    var(--gold),
                    var(--gold-light)
                );

            color: var(--dark) !important;

            box-shadow: var(--shadow-gold);
        }

        .btn-gold:hover {
            color: var(--dark) !important;
            box-shadow: 0 16px 38px rgba(212, 175, 55, .4);
        }

        .btn-outline-modern {

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 6px;

            min-height: 44px;

            padding:
                8px 18px;

            border:
                1.5px solid
                rgba(255, 90, 54, .25);

            border-radius: 999px;

            background: white;

            color:
                var(--primary) !important;

            font-size: 12.5px;

            font-weight: 600;

            transition: .3s;
        }

        .btn-outline-modern:hover {

            background:
                var(--primary);

            border-color:
                var(--primary);

            color:
                white !important;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 24px
                rgba(255, 90, 54, .22);
        }


        /* =========================================================
           CART
        ========================================================= */

        .cart-button {
            position: relative;
        }

        .cart-badge {

            position: absolute;

            top: -7px;
            right: -5px;

            min-width: 20px;
            height: 20px;

            display: flex;

            align-items: center;
            justify-content: center;

            padding:
                0 5px;

            border-radius: 999px;

            background:
                var(--gold);

            color: var(--dark);

            border:
                2px solid white;

            font-size: 9px;

            font-weight: 800;

            animation:
                badgePop .3s ease;
        }

        @keyframes badgePop {

            from {
                transform: scale(.5);
            }

            to {
                transform: scale(1);
            }

        }


        /* =========================================================
           ADMIN
        ========================================================= */

        .admin-icon {

            width: 42px;
            height: 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 13px;

            color:
                var(--dark);

            background:
                #f3f1ec;

            transition: .3s;
        }

        .admin-icon:hover {

            color: var(--dark);

            background:
                var(--gold-light);

            transform:
                translateY(-2px);
        }


        /* =========================================================
           DROPDOWN
        ========================================================= */

        .dropdown-menu {

            margin-top:
                12px !important;

            padding: 8px;

            border:
                1px solid var(--border);

            border-radius: 18px;

            background:
                rgba(255, 255, 255, .98);

            backdrop-filter:
                blur(16px);

            box-shadow:
                var(--shadow-lg);

            animation:
                dropdown .2s ease;
        }

        @keyframes dropdown {

            from {
                opacity: 0;
                transform:
                    translateY(-5px);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0);
            }

        }

        .dropdown-item {

            padding:
                10px 13px;

            border-radius:
                10px;

            font-size: 12px;

            transition: .2s;
        }

        .dropdown-item:hover {

            background:
                rgba(212, 175, 55, .1);

            color:
                var(--primary-dark);
        }


        /* =========================================================
           HERO — deep premium gradient with gold trim
        ========================================================= */

        .hero {

            position: relative;

            overflow: hidden;

            min-height: 300px;

            padding: 58px;

            border-radius:
                var(--radius-lg);

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #863dcf8e 0%,
                    #c65640 30%,
                    #f2ff36 68%,
                    #d4b537 100%
                );

            box-shadow:
                0 30px 70px
                rgba(17, 10, 8, .35);
        }

        .hero::before {

            content: "";

            position: absolute;

            width: 380px;
            height: 380px;

            right: -130px;
            top: -190px;

            border-radius: 50%;

            background:
                rgba(212, 175, 55, .15);
        }

        .hero::after {

            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            right: 150px;
            bottom: -180px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, .08);
        }

        .hero-content {

            position: relative;

            z-index: 2;
        }

        .hero-badge {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                7px 14px;

            margin-bottom:
                18px;

            border-radius: 999px;

            background:
                rgba(212, 175, 55, .18);

            border:
                1px solid
                rgba(212, 175, 55, .4);

            backdrop-filter:
                blur(10px);

            font-size: 10px;

            font-weight: 700;

            letter-spacing:
                .8px;

            color: var(--gold-light);
        }

        .hero h1 {

            margin-bottom:
                14px;

            font-size:
                clamp(32px, 4vw, 48px);

            line-height:
                1.15;

            font-weight:
                800;

            letter-spacing:
                -1.2px;

            font-family: 'Playfair Display', serif;

            text-shadow: 0 4px 20px rgba(0,0,0,.2);
        }

        .hero p {

            max-width:
                600px;

            margin-bottom:
                22px;

            color:
                rgba(255, 255, 255, .90);

            font-size:
                14px;

            line-height:
                1.85;
        }

        .live-slider {
            position: relative;
            margin-top: 26px;
            margin-bottom: 18px;
            border: 2px solid rgba(212, 175, 55, .5);
            border-radius: 20px;
            background: #14171f;
            box-shadow: 0 18px 40px rgba(17, 24, 39, .14);
            overflow: hidden;
            padding: 8px 8px 18px;
        }

        .live-slider-viewport {
            overflow: hidden;
            border-radius: 14px;
            background: #ffffff;
        }

        .live-slider-track {
            display: flex;
            width: max-content;
            animation: liveSlide 24s linear infinite;
        }

        .live-slide {
            position: relative;
            flex: 0 0 auto;
            width: 280px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            border-radius: 14px;
            margin-right: 12px;
        }

        .live-slide:last-child {
            margin-right: 0;
        }

        .live-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(11, 14, 20, .45), rgba(11, 14, 20, .2), rgba(11, 14, 20, .5));
        }

        .live-slide-content {
            position: relative;
            z-index: 1;
            font-size: 1.2rem;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -0.04em;
            color: #ffffff;
            text-shadow: 0 6px 24px rgba(0, 0, 0, .4);
            text-transform: uppercase;
            font-family: 'Playfair Display', serif;
        }

        .live-slider::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 16px;
            background: linear-gradient(90deg, #d4af37 0%, #ff5a36 55%, #f2d891 100%);
            border-top: 2px solid rgba(11, 14, 20, .9);
        }

        @keyframes liveSlide {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }


        /* =========================================================
           HERO LIVE CARD
        ========================================================= */

        .live-delivery-card {

            position: relative;

            width: 224px;

            padding: 20px;

            border-radius:
                22px;

            background:
                rgba(11, 14, 20, .35);

            border:
                1px solid
                rgba(212, 175, 55, .3);

            backdrop-filter:
                blur(18px);

            box-shadow:
                0 18px 45px
                rgba(0, 0, 0, .18);

            animation:
                floatCard 4s ease-in-out infinite;
        }

        @keyframes floatCard {

            0%, 100% {
                transform:
                    translateY(0);
            }

            50% {
                transform:
                    translateY(-8px);
            }

        }

        .delivery-icon {

            width: 50px;
            height: 50px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 16px;

            background:
                rgba(212, 175, 55, .25);

            font-size: 24px;
        }

        .delivery-title {

            margin-top: 13px;

            font-size: 12px;

            font-weight: 600;

            letter-spacing: .3px;
        }

        .delivery-status {

            display: flex;

            align-items: center;

            gap: 6px;

            margin-top: 5px;

            color:
                rgba(234, 7, 7, 0.82);

            font-size: 10px;
        }


        /* =========================================================
           SECTION
        ========================================================= */

        .section-title {

            font-size: 24px;
            font-weight: 700;
            letter-spacing:
                -.5px;
            font-family: 'Playfair Display', serif;
        }

        .section-subtitle {

            color:
                var(--muted);

            font-size: 12.5px;
        }


        /* =========================================================
           CARDS — premium elevation
        ========================================================= */

        .soft-card {
            overflow: hidden;
            border:1px solid rgba(37, 71, 144, 0.5);
            border-radius: var(--radius-md);
            background: white;

            box-shadow:
                var(--shadow-sm);

            transition:
                transform .35s cubic-bezier(.4,0,.2,1),
                box-shadow .35s cubic-bezier(.4,0,.2,1),
                border-color .35s;
        }

        .soft-card:hover {

            transform:
                translateY(-8px);

            box-shadow:
                var(--shadow-md);

            border-color: var(--border-gold);
        }

        .soft-card .card-body {
            padding: 22px;
        }

        .js-heart-add-to-cart {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, color .2s ease, border-color .2s ease;
            z-index: 2;
        }

        .js-heart-add-to-cart.theme-light {
            background: rgba(255, 255, 255, 0.9);
            color: #111827;
            border: 1px solid rgba(17, 24, 39, 0.08);
            box-shadow: 0 14px 26px rgba(15, 23, 42, 0.12);
        }

        .js-heart-add-to-cart.theme-dark {
            background: rgba(15, 23, 42, 0.76);
            color: #f8fafc;
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 12px 22px rgba(2, 6, 23, 0.45);
        }

        .js-heart-add-to-cart:hover {
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 18px 28px rgba(239, 71, 111, 0.18);
        }

        .js-heart-add-to-cart.theme-light:hover {
            background: #ffffff;
            color: #ef476f;
        }

        .js-heart-add-to-cart.theme-dark:hover {
            background: rgba(17, 24, 39, 0.9);
            color: #ff8caf;
        }

        .js-heart-add-to-cart:focus-visible {
            outline: 2px solid rgba(59, 130, 246, 0.7);
            outline-offset: 2px;
        }

        .js-heart-add-to-cart .bi {
            font-size: 1.15rem;
            line-height: 1;
        }

        .js-heart-add-to-cart.active,
        .js-heart-add-to-cart .bi-heart-fill {
            color: #ef476f;
        }

        .js-heart-add-to-cart.theme-dark.active,
        .js-heart-add-to-cart.theme-dark .bi-heart-fill {
            color: #ff6b9a;
        }

        @media (prefers-color-scheme: dark) {
            .js-heart-add-to-cart:not(.theme-light):not(.theme-dark) {
                background: rgba(15, 23, 42, 0.76);
                color: #f8fafc;
                border: 1px solid rgba(255, 255, 255, 0.12);
                box-shadow: 0 12px 22px rgba(2, 6, 23, 0.45);
            }
        }


        /* =========================================================
           PRODUCT IMAGE
        ========================================================= */

        .image-wrapper {

            position: relative;

            overflow: hidden;
        }

        .thumb {

            display: block;

            width: 100%;

            height: 210px;

            object-fit: cover;

            transition:
                transform .6s cubic-bezier(.4,0,.2,1);
        }

        .soft-card:hover .thumb {

            transform:
                scale(1.08);
        }

        .image-overlay {

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(255, 254, 254, 0.91),
                    transparent 55%
                );

            pointer-events:
                none;
        }

        .noimg {

            height: 210px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #70b0da,
                    #e6e1d6
                );

            color:
                #9ca3af;

            font-size: 30px;
        }


        /* =========================================================
           PRICE
        ========================================================= */

        .price {

            color:
                var(--primary-dark);

            font-size:
                18px;

            font-weight:
                700;

            letter-spacing: -.2px;
        }


        /* =========================================================
           FORMS
        ========================================================= */

        input.form-control,
        textarea.form-control,
        select.form-select {

            min-height:
                46px;

            border:
                1px solid #df9f09;

            border-radius:
                13px;

            background:
                white;

            font-size:
                13px;

            box-shadow:
                none;

            transition:
                .25s;
        }

        input.form-control:focus,
        textarea.form-control:focus,
        select.form-select:focus {

            border-color:
                var(--border-gold);

            box-shadow:
                0 0 0 4px
                rgba(212, 175, 55, .12);
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert {

            border: none;

            border-radius: var(--radius-sm);

            box-shadow:
                var(--shadow-sm);
        }


        /* =========================================================
           FOOTER — deep premium navy-black
        ========================================================= */

        .footer {

            position: relative;

            overflow: hidden;

            margin-top:
                75px;

            background:
                linear-gradient(
                    135deg,
                    #031fd4,
                    #7182b5
                );

            color:
                #cbd0d9;

            border-top: 1px solid rgba(212, 175, 55, 0.55);
        }

        .footer::before {

            content: "";

            position: absolute;

            width: 380px;
            height: 380px;

            right: -160px;
            top: -210px;

            border-radius: 50%;

            background:
                rgba(212, 175, 55, .08);
        }

        .footer-content {

            position: relative;

            z-index: 2;
        }

        .footer-brand {

            color: white;

            font-size: 21px;

            font-weight: 700;

            font-family: 'Playfair Display', serif;
        }

        .footer-brand span {
            color: var(--gold);
            font-style: italic;
        }

        .footer p {

            color:
                #9ca3af;

            font-size:
                12px;
        }

        .footer-link {

            color:
                #9ca3af !important;

            font-size:
                12px;

            transition:
                .2s;
        }

        .footer-link:hover {
            color: var(--gold-light) !important;
        }

        .footer-divider {

            height: 1px;

            margin:
                26px 0;

            background:
                rgba(212, 175, 55, .12);
        }


        /* =========================================================
           FLOATING LIVE BUTTON
        ========================================================= */

        .floating-live {
            position: fixed;
            right: 22px;
            bottom: 22px;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 9px;
            padding:
                12px 16px;

            border-radius:
                999px;

            background:
                linear-gradient(135deg, #1e58cc, #1e2532);

            color: white;

            border: 1px solid rgba(55, 102, 212, 0.35);

            box-shadow:
                0 18px 45px
                rgba(61, 102, 185, 0.58);

            backdrop-filter:
                blur(16px);

            font-size:
                11px;

            font-weight:
                600;

            letter-spacing: .3px;
        }

        .floating-live .live-dot {
            width: 8px;
            height: 8px;
        }

        .mobile-bottom-nav {
            display: none;
        }


        /* =========================================================
           TOAST
        ========================================================= */

        .toast {

            border-radius:
                16px !important;

            box-shadow:
                var(--shadow-lg);

            background:
                rgba(11, 14, 20, .96) !important;

            border: 1px solid rgba(212, 175, 55, .25) !important;

            color:
                #ffffff !important;

            backdrop-filter:
                blur(12px);
        }

        .location-capture {
            color: var(--primary);
            border-color: var(--primary);
            white-space: nowrap;
        }

        .location-capture:hover,
        .location-capture:focus {
            color: #ffffff;
            background: var(--primary);
            border-color: var(--primary);
        }


        /* =========================================================
           SCROLLBAR
        ========================================================= */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1efe9;
        }

        ::-webkit-scrollbar-thumb {

            border-radius: 999px;

            background:
                #d8d2c4;
        }

        ::-webkit-scrollbar-thumb:hover {
            background:
                var(--gold);
        }

        /* =========================================================
           ANIMATION
        ========================================================= */

        @keyframes fadeUp {

            from {
                opacity: 0;
                transform:
                    translateY(15px);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0);
            }

        }

        .fade-up {
            animation:
                fadeUp .6s ease both;
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 991px) {

            .navbar {
                min-height: 68px;
            }

            .navbar-collapse {

                margin-top: 12px;

                padding: 15px;

                border-radius: 18px;

                background:
                    rgba(255, 255, 255, .98);

                box-shadow:
                    var(--shadow-md);
            }

            .search-box {

                width: 100%;

                margin:
                    12px 0;
            }

            .hero {

                padding:
                    35px 25px;
            }

            .live-delivery-card {

                margin-top:
                    25px;
            }

        }


        .mobile-search-toggle,
        .mobile-search-form {
            display: none;
        }

        @media (max-width: 576px) {

            .mobile-search-toggle {
                width: 34px;
                height: 34px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-left: auto;
                margin-right: 4px;
                border: 0;
                border-radius: 10px;
                background: rgba(54, 91, 255, .1);
                color: var(--primary);
                font-size: 14px;
            }

            .mobile-search-form {
                position: absolute;
                z-index: 10;
                top: calc(100% + 8px);
                left: 12px;
                right: 12px;
                align-items: center;
                padding: 6px 12px;
                border: 1px solid var(--border);
                border-radius: 14px;
                background: #ffffff;
                box-shadow: var(--shadow-md);
            }

            .mobile-search-form:not([hidden]) {
                display: flex;
            }

            .mobile-search-form i {
                color: var(--muted);
            }

            .mobile-search-form input {
                width: 100%;
                min-width: 0;
                height: 34px;
                padding: 0 8px;
                border: 0;
                outline: 0;
                color: var(--text);
                font-size: 12px;
            }

            .search-box {
                display: none;
            }

            .live-bar {
                font-size: 9px;
            }

            .live-bar-content {
                gap: 10px;
            }

            .hero {

                min-height: auto;

                padding:
                    30px 22px;

                border-radius:
                    22px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .hero p {
                font-size: 13px;
            }

            .live-delivery-card {
                width: 100%;
            }

            .thumb,
            .noimg {
                height: 190px;
            }

            .footer {
                margin-top:
                    45px;
            }

            .floating-live {
                right: 15px;
                bottom: 62px;
                padding:
                    10px 13px;
                border: 1px solid rgba(255, 255, 255, .24);
                background: linear-gradient(135deg, #365bff, #2435c9);
                box-shadow: 0 10px 24px rgba(36, 53, 201, .3);
            }

            body {
                padding-bottom: 82px;
            }

            .mobile-bottom-nav {
                position: fixed;
                right: 10px;
                bottom: 10px;
                left: 10px;
                z-index: 1000;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                align-items: center;
                min-height: 76px;
                padding: 10px 12px;
                border-radius: 28px;
                background: linear-gradient(135deg, #ff9ec0, #f298b7 35%, #ef8ca1 100%);
                box-shadow: 0 12px 28px rgba(255, 123, 167, .24);
                border: 1px solid rgba(255, 255, 255, .22);
            }

            .mobile-bottom-nav a {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 4px;
                min-width: 0;
                border-radius: 18px;
                color: rgba(255, 255, 255, .96);
                font-size: 8px;
                font-weight: 700;
                letter-spacing: .04em;
                line-height: 1.1;
                text-align: center;
                text-transform: lowercase;
                transition: transform .2s ease, opacity .2s ease;
            }

            .mobile-bottom-nav a i {
                display: grid;
                place-items: center;
                width: 52px;
                height: 52px;
                border-radius: 50%;
                background: transparent;
                font-size: 26px;
                line-height: 1;
                color: #ffffff;
                border: 2px solid rgba(255, 255, 255, .25);
            }

            .mobile-bottom-nav a:hover,
            .mobile-bottom-nav a.active {
                transform: translateY(-1px);
            }

            .mobile-bottom-nav a.active i {
                background: #1db2b8;
                border-color: rgba(255, 255, 255, .8);
                box-shadow: 0 8px 18px rgba(29, 178, 184, .28);
            }

        }

    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<div class="live-bar">
    <div class="live-bar-content">
        <span class="live-status">
            <span class="live-dot"></span>
            <span id="storeStatus">Checking...
            </span>
        </span>
        <span>
            •
        </span>
        <span>
            <i class="bi bi-clock me-1"></i>
            <span id="liveClock">
                --:--:--
            </span>
        </span>
        <span class="d-none d-md-inline">
            • Fast delivery in Phnom Penh
        </span>
    </div>
</div>



<nav class="navbar navbar-expand-lg nav-glass">
    <div class="container">
        
        <a class="navbar-brand"
           href="<?php echo e(url('products')); ?>">
            <div class="brand-icon">
                <i class="bi bi-flower1"></i>
            </div>
            <div class="brand-text"> Romdul <span>Delivery</span>
            </div>
        </a>
        <button
            class="mobile-search-toggle"
            type="button"
            aria-label="Search food"
            aria-expanded="false"
            aria-controls="mobileSearchForm">
            <i class="bi bi-search"></i>
        </button>
        <form
            id="mobileSearchForm"
            class="mobile-search-form"
            action="<?php echo e(route('products.index')); ?>"
            method="GET"
            hidden>
            <i class="bi bi-search"></i>
            <input
                type="search"
                name="q"
                value="<?php echo e(request('q', request('search'))); ?>"
                placeholder="Search food..."
                autocomplete="off">
        </form>
        

        <button
            class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#topNav">

            <i class="bi bi-list fs-2"></i>

        </button>
        <div
            class="collapse navbar-collapse"id="topNav">
           <ul class="navbar-nav me-auto ms-lg-4">
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('front.categories.index') ? 'active' : ''); ?>"
           href="<?php echo e(route('front.categories.index')); ?>">
            <i class="bi bi-grid me-1"></i>
            Categories
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('front.new-arrivals') ? 'active' : ''); ?>"
           href="<?php echo e(route('front.new-arrivals')); ?>">
            <i class="bi bi-stars me-1"></i>
            New Arrival
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('front.about') ? 'active' : ''); ?>"
           href="<?php echo e(route('front.about')); ?>">
            <i class="bi bi-info-circle me-1"></i>
            About
        </a>
    </li>

</ul>
            
            <form
                class="search-box me-lg-3"
                action="<?php echo e(route('products.index')); ?>"
                method="GET">
                <i class="bi bi-search"></i>

                <input
                    type="search"
                    name="q"
                    value="<?php echo e(request('q', request('search'))); ?>"
                    placeholder="Search food..."
                    autocomplete="off">
            </form>
            <a
                href="<?php echo e(route('cart.index')); ?>"class="btn btn-modern cart-button me-lg-2">
                <i class="bi bi-bag"></i>
                <span>Cart</span>
                <span
                    id="cartBadge" class="cart-badge d-none">
                    0
                </span>
            </a>

            
            <?php if(auth()->guard()->check()): ?>
             <div class="dropdown">
                    <button
                        class="btn btn-outline-modern dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> <?php echo e(auth()->user()->name); ?>

                    </button>
                    <ul
                        class="dropdown-menu dropdown-menu-end">
                        <?php if(auth()->user()->isAdmin()): ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Admin Dashboard
                                </a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    My Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('profile.index')); ?>">
                                    <i class="bi bi-person me-2"></i>
                                    My Profile
                                </a>
                            </li>
                        <?php endif; ?>

                        <li>
                            <a
                                class="dropdown-item"
                                href="<?php echo e(route('orders.history')); ?>">

                                <i class="bi bi-bag-check me-2"></i> My Orders
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form
                                action="<?php echo e(route('logout')); ?>"
                                method="POST">
                                <?php echo csrf_field(); ?>

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    <i
                                        class="bi bi-box-arrow-right me-2">
                                    </i>

                                    Logout

                                </button>

                            </form>
                        </li>
                        </ul>
                </div>

            <?php else: ?>

                <a
                    href="<?php echo e(url('login')); ?>"
                    class="btn btn-outline-modern">

                    <i class="bi bi-person"></i>

                    Login
                </a>

            <?php endif; ?>

            

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->isAdmin()): ?>
                    <a
                        href="<?php echo e(route('admin.dashboard')); ?>"
                        class="admin-icon ms-lg-2"
                        title="Admin Panel">

                        <i class="bi bi-person-lock"></i>

                    </a>
                <?php endif; ?>
            <?php endif; ?>

        </div>

    </div>

</nav>




<header class="container mt-4 fade-up">

    <div class="hero">
        <div class="hero-content">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-badge">
                        <i class="bi bi-lightning-charge-fill"></i>
                        LIVE • FAST • FRESH • DELICIOUS

                    </div>
                    <h1>
                        <?php echo $__env->yieldContent(
                            'hero_title',
                            'Delicious Food 🍔'
                        ); ?>

                    </h1>

                    <p>

                        <?php echo $__env->yieldContent(
                            'hero_subtitle',
                            'Discover delicious food and get it delivered fresh and fast straight to your door.'
                        ); ?>
                    </p>
                    

                    <div class="d-flex flex-wrap gap-2">

                        <?php echo $__env->yieldContent('hero_action'); ?>

                    </div>
                </div>

                

                <div class="col-lg-4">

                    <div class="d-flex justify-content-lg-end">

                        <div class="live-delivery-card">
                            <div class="delivery-icon">
                                🚴
                            </div>
                            <div class="delivery-title">
                                Live Delivery
                            </div>
                            <div class="delivery-status">
                                <span class="live-dot"></span>
                                <span id="deliveryText">
                                    Riders are online
                                </span>
                            </div>
                            <div class="mt-2">
                                <small
                                    class="opacity-75">
                                    Estimated delivery
                                </small>
                                <div class="fw-bold">
                                    25–40 min
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
    $liveImages = [
        asset('img/product/images.jpg'),
        asset('img/product/images (1).jpg'),
        asset('img/product/images (2).jpg'),
        asset('img/product/chicken.jpg'),
    ];
?>

<div class="container">
    <div class="live-slider" aria-label="Live bar">
        <div class="live-slider-viewport">
            <div class="live-slider-track">
                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[0]); ?>');">
                    <div class="live-slide-content">Fresh &amp; Fast</div>
                </div>
                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[1]); ?>');">
                    <div class="live-slide-content">Hot Deals</div>
                </div>
                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[2]); ?>');">
                    <div class="live-slide-content">Live Delivery</div>
                </div>
                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[3]); ?>');">
                    <div class="live-slide-content">Order Now</div>
                </div>

                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[0]); ?>');">
                    <div class="live-slide-content">Fresh &amp; Fast</div>
                </div>
                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[1]); ?>');">
                    <div class="live-slide-content">Hot Deals</div>
                </div>
                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[2]); ?>');">
                    <div class="live-slide-content">Live Delivery</div>
                </div>
                <div class="live-slide" style="background-image: url('<?php echo e($liveImages[3]); ?>');">
                    <div class="live-slide-content">Order Now</div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mt-5">

    <?php echo $__env->yieldContent('breadcrumb'); ?>

</div>



<main class="container mt-4">
    

    <?php if(session('success')): ?>
        <div
            class="alert alert-success rounded-4 d-flex align-items-center gap-2 fade-up">
            <i class="bi bi-check-circle-fill"></i>
            <span>

                <?php echo e(session('success')); ?>


            </span>
        </div>

    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>

</main>



<footer class="footer">
    <div class="container py-5">
        <div class="footer-content">
            <div class="row g-4">
                
                <div class="col-lg-6">
                    <div class="footer-brand mb-2">
                        Romdul
                        <span>Delivery</span>
                    </div>
                    <p class="mb-3">

                        Fresh food, fast delivery,
                        and a better way to enjoy
                        your favorite meals.

                    </p>
                    <div class="d-flex gap-2"> 

                        <a href="https://www.facebook.com/vundara85"
                           class="admin-icon">

                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://t.me/Ra_fit0"
                           class="admin-icon">

                            <i class="bi bi-telegram"></i>
                        </a>
                        <a href="https://www.instagram.com/vundara85"
                           class="admin-icon">

                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
                

                <div class="col-lg-3 col-md-6">

                    <h6 class="text-white fw-semibold mb-3">

                        Quick Links

                    </h6>

                    <div
                        class="d-flex flex-column gap-2">

                        <a
                            href="<?php echo e(url('/')); ?>"
                            class="footer-link">
                            Home

                        </a>
                        <a
                            href="<?php echo e(route('front.categories.index')); ?>"
                            class="footer-link">

                            Categories

                        </a>

                        <a
                            href="<?php echo e(route('front.new-arrivals')); ?>"
                            class="footer-link">

                            New Arrival

                        </a>

                        <a
                            href="<?php echo e(route('front.about')); ?>"
                            class="footer-link">

                            About

                        </a>

                    </div>

                </div>
                

                <div class="col-lg-3 col-md-6">

                    <h6 class="text-white fw-semibold mb-3">

                        Contact

                    </h6>

                    <div
                        class="d-flex flex-column gap-2">

                        <p class="mb-0">

                            <i
                                class="bi bi-geo-alt me-2">
                            </i>

                            Phnom Penh, Cambodia

                        </p>

                        <p class="mb-0">

                            <i
                                class="bi bi-telephone me-2">
                            </i>   +855 10 856 409

                        </p>

                        <p class="mb-0">

                            <i
                                class="bi bi-envelope me-2">
                            </i>

                            romduldelivery@gmail.com

                        </p>

                    </div>

                </div>

            </div>


            <div class="footer-divider"></div>


            <div
                class="d-flex flex-column flex-md-row justify-content-between gap-2">

                <p class="mb-0">

                    © <?php echo e(date('Y')); ?>

                    Romdul Delivery.All rights reserved. Made with ❤️ in Cambodia

                </p>

            </div>

        </div>

    </div>

</footer>

<nav class="mobile-bottom-nav" aria-label="Mobile navigation">
    <a href="<?php echo e(route('front.categories.index')); ?>" class="<?php echo e(request()->routeIs('front.categories.index') ? 'active' : ''); ?>">
        <i class="bi bi-house"></i>
        <span>Home</span>
    </a>
    <a href="<?php echo e(route('front.new-arrivals')); ?>" class="<?php echo e(request()->routeIs('front.new-arrivals') ? 'active' : ''); ?>">
        <i class="bi bi-grid"></i>
        <span>Category</span>
    </a>
    <a href="<?php echo e(route('cart.index')); ?>" class="<?php echo e(request()->routeIs('cart.*') ? 'active' : ''); ?>">
        <i class="bi bi-bag"></i>
        <span>Cart</span>
    </a>
    <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(route('profile.index')); ?>" class="<?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>">
            <i class="bi bi-person"></i>
            <span>Account</span>
        </a>
    <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">
            <i class="bi bi-person"></i>
            <span>Account</span>
        </a>
    <?php endif; ?>
</nav>




<div class="floating-live">

    <span class="live-dot"></span>

    <span id="floatingStatus">

        LIVE

    </span>

</div>




<div
    class="toast-container position-fixed bottom-0 end-0 p-4">

    <div
        id="cartToast"
        class="toast border-0"
        role="alert">

        <div class="d-flex align-items-center">
            <div
                class="toast-body d-flex align-items-center gap-2">

                <i
                    class="bi bi-check-circle-fill text-warning">
                </i>

                <span>
                    Added to cart!
                </span>

            </div>

            <button
                class="btn-close btn-close-white me-2"
                data-bs-dismiss="toast">
            </button>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    /* =========================================================
       LIVE CLOCK
    ========================================================= */
    function updateClock() {
        const clock =
            document.getElementById('liveClock');

        if (!clock) return;

        const now = new Date();

        const time =
            now.toLocaleTimeString(
                'en-US',
                {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                }
            );

        clock.innerText = time;

    }

    updateClock();

    setInterval(updateClock, 1000);


    /* =========================================================
       LIVE STORE STATUS
    ========================================================= */

    function updateStoreStatus() {

        const status = document.getElementById('storeStatus');
        const delivery = document.getElementById('deliveryText');
        const floating = document.getElementById('floatingStatus');

        if (!status) return;
        const now = new Date();
        const hour = now.getHours();
        const isOpen =
            hour >= 8 &&
            hour < 24;
        if (isOpen) {
            status.innerText = 'Open Now';
            if (delivery) {
                delivery.innerText =
                    'Riders are online';

            }

            if (floating) {

                floating.innerText = 'LIVE • OPEN';

            }

        } else {

            status.innerText =
                'Closed Now';

            if (delivery) {

                delivery.innerText =
                    'Delivery resumes at 6:00 AM';

            }

            if (floating) {

                floating.innerText =
                    'CLOSED resumes at 12:00AM';

            }

        }

    }

    updateStoreStatus();

    setInterval(
        updateStoreStatus,
        60000
    );
    /* =========================================================
       CART COUNT
    ========================================================= */
    function updateCartBadge(count) {
        const badge = document.getElementById('cartBadge');
        if (!badge) return;
        count = parseInt(count) || 0;
        if (count > 0) {
            badge.innerText = count;

            badge.classList.remove(
                'd-none'
            );

            badge.style.animation =
                'none';

            void badge.offsetWidth;

            badge.style.animation =
                'badgePop .3s ease';

        } else {

            badge.classList.add(
                'd-none'
            );
        }
    }

    async function readCartResponse(response) {
        const contentType = response.headers.get('content-type') || '';
        const isLoginRedirect = response.redirected && response.url.includes('/login');

        if (response.status === 401 || isLoginRedirect || !contentType.includes('application/json')) {
            throw new Error('Please register or log in to add items to your cart.');
        }

        return response.json();
    }

    /* =========================================================
       CART TOAST
    ========================================================= */

    function showCartToast(
        message = "Added to cart!"
    ) {

        const el =
            document.getElementById(
                'cartToast'
            );

        if (!el) return;

        const body =
            el.querySelector(
                '.toast-body span'
            );

        if (body) {

            body.innerText =
                message;

        }

        const toast =
            new bootstrap.Toast(
                el,
                {
                    delay: 2500
                }
            );

        toast.show();

    }

    /* =========================================================
       LIVE SEARCH
    ========================================================= */

    const searchInput =
        document.querySelector(
            '.search-box input'
        );

    if (searchInput) {

        searchInput.addEventListener(
            'keydown',
            function(event) {

                if (
                    event.key === 'Enter' &&
                    this.value.trim() !== ''
                ) {

                    this.closest(
                        'form'
                    ).submit();

                }

            }
        );

    }

    const mobileSearchToggle = document.querySelector('.mobile-search-toggle');
    const mobileSearchForm = document.getElementById('mobileSearchForm');
    const mobileSearchInput = mobileSearchForm?.querySelector('input');

    if (mobileSearchToggle && mobileSearchForm) {
        mobileSearchToggle.addEventListener('click', function () {
            const isHidden = mobileSearchForm.hasAttribute('hidden');

            if (isHidden) {
                mobileSearchForm.removeAttribute('hidden');
                mobileSearchToggle.setAttribute('aria-expanded', 'true');
                mobileSearchInput?.focus();
            } else {
                mobileSearchForm.setAttribute('hidden', '');
                mobileSearchToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }


    /* =========================================================
       NAVBAR SCROLL EFFECT
    ========================================================= */

    window.addEventListener(
        'scroll',
        function() {

            const nav =
                document.querySelector(
                    '.nav-glass'
                );

            if (!nav) return;

            if (window.scrollY > 30) {

                nav.style.boxShadow =
                    '0 14px 40px rgba(17,24,39,.09)';

            } else { nav.style.boxShadow =
                    '0 8px 30px rgba(17,24,39,.05)';

            }

        }
    );


    /* =========================================================
       AUTO FADE ALERT
    ========================================================= */

    setTimeout(
        function() {

            const alert =
                document.querySelector(
                    '.alert'
                );

            if (
                alert &&
                alert.classList.contains(
                    'alert-success'
                )
            ) {

                alert.style.transition =
                    'opacity .5s ease';
                alert.style.opacity = '0';
                setTimeout(
                    () => alert.remove(),  500
                );
            }
        },  4000
    );
</script>
<?php echo $__env->make('components.location-capture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.chat-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/layouts/app.blade.php ENDPATH**/ ?>