<nav class="footer-menu" role="navigation" aria-label="'Menu footer', 'text-domain'">
            <?php
                wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container'      => false, // On retire le conteneur généré par WP
                    'items_wrap'     => '%3$s'
                ]);
            ?>
        </nav>
</body>