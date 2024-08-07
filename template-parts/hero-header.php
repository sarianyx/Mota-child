<div class="header-hero">
    <?php 
    $args_bg = array(
        'post_type'  => 'photo',
        'posts_per_page' => 1,
        'orderby'        => 'rand'
    );

    $the_query_bg = new WP_Query( $args_bg );
    ?>
    <?php if ( $the_query_bg->have_posts() ) : ?>
        <?php while ( $the_query_bg->have_posts() ) : $the_query_bg->the_post(); ?>
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                <div class="header-hero" style="background-image: url(<?php echo $featured_img_url ;?>)">
                    <h1>Photographe event</h1>
                </div>
            <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php endif; ?>
</div>