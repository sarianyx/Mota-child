<?php

get_header();
?>
<?php get_template_part('template-parts/hero-header'); ?>

<?php
    $page_content = get_the_content();
    echo $page_content;
?>

<div class="accueil-contenu">
    <section class="options-catalogue">
        <div class="categorie-et-format">
            <select name="categorie"
                    id="categorie-select"
                    class="selector"
                    data-type="photo"
                    data-nonce="<?php echo wp_create_nonce('mota_load_more'); ?>"
                    data-action="mota_load_more"
                    data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
            >
                <option value="">Catégories</option>
                <?php
                    $categories = get_terms( 'categorie', array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ) );
                    $nb_c = count($categories);
                    $c = 0;
                    if ( $c < $nb_c ) {
                        while ( $c < $nb_c) {
                                ?><option value="<?php echo $categories[$c]->name; ?>"><?php echo $categories[$c]->name; ?></option><?php
                                $c++;
                        };
                    };
                ?>
            </select>
            <select name="format"
                    id="format-select"
                    class="selector"
                    data-type="photo"
                    data-nonce="<?php echo wp_create_nonce('mota_load_more'); ?>"
                    data-action="mota_load_more"
                    data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">
                <option value="">Formats</option>
                <?php
                    $formats = get_terms( 'format', array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ) );
                    $nb_f = count($formats);
                    $f = 0;
                    if ( $f < $nb_f ) {
                        while ( $f < $nb_f) {
                                ?><option value="<?php echo $formats[$f]->name; ?>"><?php echo $formats[$f]->name; ?></option><?php
                                $f++;
                        };
                    };
                ?>
            </select>
        </div>
        <div class="trier-par">
            <select name="tri"
                    id="tri-select"
                    class="selector"
                    data-type="photo"
                    data-nonce="<?php echo wp_create_nonce('mota_load_more'); ?>"
                    data-action="mota_load_more"
                    data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">
                <option value="">Trier par</option>
                <option value="ASC">Date croissante</option>
                <option value="DESC">Date décroissante</option>
            </select>
        </div>
    </section>
    <section class="catalogue" id="catalogue-initial">
        <?php
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 8,
                'orderby' => 'annee',
                'order' => 'DESC'
            );
            $the_query = new WP_Query( $args );
            $quota = 0;
        ?>

        <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php include(get_template_directory() . './template-parts/bloc-photo.php') ?>
                <?php $quota = $quota+1; ?>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </section>
    <section class="catalogue catalogue-more">

    </section>
    <div class="charger-plus-btn">
        <button
            class="load-more-btn"
            data-type="photo"
            data-nonce="<?php echo wp_create_nonce('mota_load_more'); ?>"
            data-action="mota_load_more"
            data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
        >Charger plus</button>
    </div>
</div>

<?php

get_footer();
?>