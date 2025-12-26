<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'StitchIt') }}</title>
    <link rel="icon" type="image/x-icon" href='{{asset("site/assets/image/fav-removebg-preview.png")}}'>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href='{{asset("site/assets/css/style.css")}}' rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* BASE NAVBAR */
        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 12px 42px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* HAMBURGER */
        .menu-toggle {
            display: none;
            font-size: 28px;
            cursor: pointer;
        }

        /* MOBILE PANEL */
        .mobile-panel {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        /* SEARCH BOX */
        .search-box {
            display: flex;
            align-items: center;
            gap: 0px;
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 7px;
        }

        /* PROFILE */
        .profile-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {

            /* Show hamburger */
            .menu-toggle {
                display: block;
            }

            /* Hide everything until toggle opens */
            .mobile-panel {
                display: none;
                flex-direction: column;
                width: 100%;
                background: #fff;
                position: absolute;
                top: 70px;
                left: 0;
                padding: 15px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }

            /* When active class added → show menu */
            .mobile-panel.active {
                display: flex;
            }

            /* Align items vertically */
            .mobile-panel .nav-links {
                display: flex;
                flex-direction: column;
                text-align: left;
                width: 100%;
            }

            .mobile-panel .icons {
                display: flex;
                flex-direction: row;
                margin-top: 20px;
                gap: 15px;
            }

            .search-box {
                width: 100%;
                margin-top: 10px;
            }
        }
        /* ICONS WRAPPER */
        .icons {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        /* ICON LINKS */
        .icon-link {
            position: relative;
            font-size: 22px;
            color: #000;
            text-decoration: none;
        }

        .icon-link i {
            font-size: 24px;
            color: #000;
        }

        /* BADGE */
        .badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: red;
            color: #fff;
            font-size: 11px;
            padding: 2px 5px;
            border-radius: 50%;
        }

        /* CART IMAGE */
        .cart-img {
            width: 24px;
            height: 24px;
        }

        /* PROFILE BOX */
        .profile-box {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            position: relative;
        }

        .profile-img {
            width: 34px;
            height: 34px;
            border-radius: 50%;
        }

        /* PROFILE INFO */
        .profile-info h4 {
            margin: 0;
            font-size: 14px;
        }

        .profile-info a {
            font-size: 12px;
            text-decoration: none;
            color: #555;
        }

        .dropdown-arrow {
            font-size: 20px;
            color: #000;
        }

        /* ------------------------ */
        /* RESPONSIVE MOBILE VIEW   */
        /* ------------------------ */
        @media (max-width: 600px) {

            .icons {
                gap: 12px;
            }

            .icon-link i,
            .cart-img {
                width: 22px;
                height: 22px;
                font-size: 20px;
            }

            /* Hide profile text on mobile */
            .profile-info {
                display: none;
            }

            .profile-box {
                gap: 5px;
            }

            .profile-img {
                width: 30px;
                height: 30px;
            }

            .dropdown-arrow {
                font-size: 18px;
            }
        }

    </style>
</head>

<body>

    @include('site.layout.partials.navbar')

<script>
    const toggleBtn = document.getElementById("menu-toggle");
    const mobilePanel = document.getElementById("mobile-panel");

    toggleBtn.addEventListener("click", () => {
        mobilePanel.classList.toggle("active");
    });
</script>
