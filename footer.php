<div class="footer">
    <div>
        <nav class="footer-menu" role="navigation" aria-label="'Menu footer', 'text-domain'">
            <?php
                wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container'      => false, // On retire le conteneur généré par WP
                    'items_wrap'     => '%3$s'
                ]);
            ?>
        </nav>
    </div>
    <div>
        <p>Tous droits réservés</p>
    </div>
</div>
<?php get_template_part('template-parts/modale'); ?>
</body>
<script src="https://localhost/mota/wp-content/themes/Mota-child/js/scripts1.js"></script>