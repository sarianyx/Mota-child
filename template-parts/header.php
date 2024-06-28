<!doctype html>
<head>
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
        </nav>
    </div>
</div>
<div class="header-hero">
    <img src="https://localhost/mota/wp-content/uploads/2024/06/nathalie-11-scaled.jpeg" alt="Une des photo du catalogue">
</div>

