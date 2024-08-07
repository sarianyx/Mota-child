
                <div data-q="<?php echo $quota; ?>" class="one-photo one-photo-<?php echo $quota ?>"><?php echo the_content(); ?></div>
                <?php $its_ref = get_field('reference'); ?>
                <?php $its_cat = get_the_terms ( $post->ID, 'categorie'); ?>
                <div data-q="<?php echo $quota; ?>" class="masque-conteneur masque-conteneur-<?php echo $quota ?>">
                    <div class="masque">
                        <?php $imageURL = get_the_post_thumbnail_url(); ?>
                        <div data-image="<?php echo $imageURL; ?>" data-ref="<?php echo $its_ref; ?>" data-cat="<?php echo $its_cat[0]->name; ?>" class="elargir">
                            <img src= "<?php echo get_stylesheet_directory_uri(); ?> . /images/Icon_fullscreen.png" alt="icon fullsreen">
                        </div>
                        <div class="voir">
                            <?php 
                                echo '<a href="' . get_permalink($post->ID) . '" title="' . $post->post_title . '">' ?> <img src="<?php echo get_stylesheet_directory_uri(). '/images/Icon_eye.png' ?>" alt="icon voir"> <?php '</a>';
                            ?>
                        </div>
                        <div class="masque-bottom">
                            <div class="masque-bottom-element">
                                <p><?php echo $its_ref; ?></p>
                            </div>
                            <div class="masque-bottom-element">
                                <p><?php echo $its_cat[0]->name; ?></p>
                            </div>
                        </div>
                    </div>
                </div>