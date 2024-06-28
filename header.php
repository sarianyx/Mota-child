<!doctype html>
<head>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="wp-content\themes\Mota-child\style.css">
    
</head>
<body>
<div class="header-top">
    <div class="header-top-logo">
        <img src="https://localhost/mota/wp-content/uploads/2024/06/Logo.png" alt="logo site">
    </div>
    <div>
        <nav class="header-top-menu" role="navigation" aria-label="'Menu principal', 'text-domain'">
            <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container'      => false, // On retire le conteneur généré par WP
                    'items_wrap'     => '%3$s'
                ]);
            ?>
            <div class="contact-btn">
                <p>Contact</p>
            </div>
        </nav>
    </div>
    <!--<button class="header-top-menu-mobile-btn">
        <span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
    </button>-->
    <button class="header-top-menu-mobile-btn" aria-controls="primary-menu" aria-expanded="false">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </button>
</div>
<div class="menu-mobile">
    <p>LE MENU MOBILE</p>
</div>
<div class="header-hero">
    <img src="https://localhost/mota/wp-content/uploads/2024/06/nathalie-11-scaled.jpeg" alt="Une des photo du catalogue">
</div>

