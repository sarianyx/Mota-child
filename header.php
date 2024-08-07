<!doctype html>
<head>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="wp-content\themes\Mota-child\style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
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
    <button class="header-top-menu-mobile-btn" aria-controls="primary-menu" aria-expanded="false">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </button>
</div>
<div class="menu-mobile">
    <nav class="header-mobile-menu" role="navigation" aria-label="'Menu principal', 'text-domain'">
            <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container'      => false, // On retire le conteneur généré par WP
                    'items_wrap'     => '%3$s'
                ]);
            ?>
            <div class="contact-btn contact-btn-mobile">
                <p>Contact</p>
            </div>
        </nav>
</div>

