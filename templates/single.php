<?php /* 
Template Name: Single photo
Template Post Type: photo */?>
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->
<?php get_header(); ?>

<!-- wp:group {"tagName":"main"} -->
<main class="wp-block-group"><!-- wp:group {"layout":{"inherit":true}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":1,"align":"wide","style":{"spacing":{"margin":{"bottom":"var(--wp--custom--spacing--medium, 6rem)"}}}} /-->

<!-- wp:post-featured-image {"align":"wide","style":{"spacing":{"margin":{"bottom":"var(--wp--custom--spacing--medium, 6rem)"}}}} /-->

<div class="single-contenu">
    <section class="presentation">
        <div class="informations">
            <?php
            ?><h2><?php the_title(); ?></h2><?php
            ?><p class="description-photo single-ref-photo"><?php echo "Référence : ", get_field('reference'); ?></p><?php
            ?><p class="description-photo"><?php the_terms ( $post->ID, 'categorie', 'Catégorie : '); ?></p><?php
            ?><p class="description-photo"><?php the_terms ( $post->ID, 'format', 'Format : '); ?></p><?php
            ?><p class="description-photo"><?php echo "Type : ", get_field('type'); ?></p><?php
            ?><p class="description-photo"><?php the_terms ( $post->ID, 'annee', 'Année : '); ?></p><?php
            ?>
        </div>
        <div class="photographie">
            <?php the_content();?>
        </div>
    </section>
    <div class="separator-line"></div>
    <section class="interaction">
        <div class="interesse">
            <div class="cette-photo">
                <p>Cette photo vous intéresse?</p>
            </div>
            <div>
                <button class="single-contact-btn">Contact</button>
            </div>
        </div>
        <?php
            $args_all = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,
                'orderby' => 'annee',
                'order' => 'DESC'
            );
            $the_query_all = new WP_Query( $args_all );
            $position = 0;
            $the_active_title = get_the_title();
            $reached = false;
            $all_photos = array();
            $first_reached = false;
            $first_post = null;
            $last_post = null;
        ?>
        <div class="photo-nav">
            <div class="next-mini">
                <?php if ( $the_query_all->have_posts() ) : ?>
                    <?php while ( $the_query_all->have_posts() ) : $the_query_all->the_post(); ?>
                        <?php if ($first_reached === false ) : ?>
                            <?php $first_post = $post->ID; ?>
                            <?php $first_reached = true; ?>
                        <?php endif; ?>
                        <?php if ($the_active_title !== get_the_title() && $reached === false ) : ?>
                            <?php $position++; ?>
                            <?php $all_photos[] = get_the_post_thumbnail("", array(81, 71)); ?>
                        <?php else : ?>
                            <?php $reached = true; ?>
                            <?php $all_photos[] = get_the_post_thumbnail("", array(81, 71)); ?>
                        <?php endif; ?>
                        <?php $last_post = null; ?>
                        <?php $last_post = $post->ID; ?>
                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>

                <?php if ( $position < count($all_photos)-1 ) : ?>
                    <?php $next_position = $position+1; ?>
                <?php elseif ( $position === count($all_photos)-1 ) : ?>
                    <?php $next_position = 0; ?>
                <?php endif; ?>

                <?php if ( $position == 0 ) : ?>
                    <?php $prev_position = $position + count($all_photos)-1; ?>
                <?php elseif ( $position != 0 && $position < count($all_photos) ) : ?>
                    <?php $prev_position = $position-1; ?>
                <?php endif; ?>

                <div class="no-thumb"><?php echo $all_photos[$position] ?></div>
                <div class="prev-thumb"><?php echo $all_photos[$prev_position] ?></div>
                <div class="next-thumb"><?php echo $all_photos[$next_position] ?></div>

            </div>
            <div class="nav-arrows">
                <div class="prev-arrow">
                    <?php 
                    $prev_post = get_adjacent_post(false, '', false);
                    if(!empty($prev_post)) {
                        echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . '<span>&#11104;</span>' . '</a>';
                    } else {
                        echo '<a href="' . get_permalink($last_post) . '" title="' . $last_post->post_title . '">' . '<span>&#11104;</span>' . '</a>';
                    }
                    ?>
                </div>
                <div class="next-arrow">
                    <?php 
                    $next_post = get_adjacent_post(false, '', true);
                    if(!empty($next_post)) {
                        echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . '<span>&#11106;</span>' . '</a>';
                    } else {
                        echo '<a href="' . get_permalink($first_post) . '" title="' . $first_post->post_title . '">' . '<span>&#11106;</span>' . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <div class="separator-line"></div>
    <section class="photos-apparentees">
        <div><h3>Vous aimerez aussi</h3></div>
            <div class="images-apparentees">
            <?php
                $the_active_cat = get_the_terms($post->ID, 'categorie');
                $the_cat = $the_active_cat[0]->name;
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => -1,
                    'categorie' => $the_cat,
                    'orderby' => 'annee',
                    'order' => 'DESC'
                );
                $the_query = new WP_Query( $args );
                $the_current_title = get_the_title();
                $quota = 0;
            ?>

            <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php if ( $the_current_title !== get_the_title() && $quota < 2  ) : ?>
                        <?php include(get_template_directory() . './template-parts/bloc-photo.php') ?>
                        <?php $quota = $quota+1; ?>
                    <?php elseif ($the_current_title === get_the_title() ) : ?>
                        <?php $quota = $quota; ?>
                    <?php endif; ?>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>
    </section>
</div>

<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
<!--<hr class="wp-block-separator alignwide is-style-wide"/>-->
<!-- /wp:separator --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":32} -->
<!--<div style="height:32px" aria-hidden="true" class="wp-block-spacer"></div>-->
<!-- /wp:spacer -->

<!-- wp:post-content {"layout":{"inherit":true}} /-->

<!-- wp:spacer {"height":32} -->
<!--<div style="height:32px" aria-hidden="true" class="wp-block-spacer"></div>-->
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"inherit":true}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex"}} -->
<div class="wp-block-group"><!-- wp:post-date {"format":"F j, Y","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}},"fontSize":"small"} /-->

<!-- wp:post-author {"showAvatar":false,"fontSize":"small"} /-->

<!-- wp:post-terms {"term":"category","fontSize":"small"} /-->

<!-- wp:post-terms {"term":"post_tag","fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":32} -->
<div style="height:32px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"className":"is-style-wide"} -->
<!--<hr class="wp-block-separator is-style-wide"/>-->
<!-- /wp:separator -->

<!-- wp:post-comments /--></div>
<!-- /wp:group --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
<?php get_footer(); ?>