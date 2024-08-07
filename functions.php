<?php

//Application des règles CSS du thème parent au thème enfant
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

//Application ds règles CSS du thème enfant
add_action( 'wp_enqueue_style', 'mota_child_theme' );
function mota_child_theme() {
    wp_enqueue_style( 'mota_child_theme', get_stylesheet_directory_uri() . '/style.css' );
}

wp_enqueue_script('jquery');
add_action('wp_enqueue_scripts','jquery');

//Enregistrement d'emplacements de menu
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
    register_nav_menu( 'footer-menu', __('Menu footer', 'tex-domain'));
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Utiliser un nouveau script
function script1() {
    wp_register_script('script1', get_stylesheet_directory_uri() . '/js/scripts1.js', array( 'acf-input' ), false, true );
    wp_enqueue_script('script1', get_stylesheet_directory_uri() . '/js/scripts1.js', array('acf-input'), false, true);
}
add_action('wp_enqueue_scripts', 'script1');

// Utiliser un nouveau script
function script2() {
    wp_register_script('script2', get_stylesheet_directory_uri() . '/js/scripts-load-more.js', array('jquery'), false, true );
    wp_enqueue_script('script2', get_stylesheet_directory_uri() . '/js/scripts-load-more.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'script2');

// Utiliser un nouveau script
function script3() {
    wp_register_script('script3', get_stylesheet_directory_uri() . '/js/script-lightbox.js', array('jquery'), false, true);
    wp_enqueue_script('script3', get_stylesheet_directory_uri() . '/js/script-lightbox.js', array('jquery'), false, true);
};
add_action('wp_enqueue_scripts', 'script3');

function twentytwentytwo_styles() {
    // Register theme stylesheet.
    $theme_version = wp_get_theme()->get( 'Version' );

    $version_string = is_string( $theme_version ) ? $theme_version : false;
    wp_register_style(
        'twentytwentytwo-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        $version_string
    );

    // Enqueue theme stylesheet.
    wp_enqueue_style( 'twentytwentytwo-style' );
}

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

//  AJAX AJAX AJAX AJAX  //

add_action('wp_ajax_mota_load_more', 'mota_load_more');
add_action('wp_ajax_nopriv_mota_load_more', 'mota_load_more');

function mota_load_more() {

    // Vérification de sécurité
  	if( 
		! isset( $_REQUEST['nonce'] ) or 
       	! wp_verify_nonce( $_REQUEST['nonce'], 'mota_load_more' ) 
    ) {
    	wp_send_json_error( "Vous n’avez pas l’autorisation d’effectuer cette action.", 403 );
  	}

  	// Récupération des données du formulaire
  	$type =  $_POST['type'];
    $cat = isset($_POST['cat']) ? $cat = $_POST['cat'] : $cat = null;
    $format = isset($_POST['format']) ? $format = $_POST['format'] : $format = null;
    $tri = isset($_POST['tri']) ? $tri = $_POST['tri'] : $tri = 'DESC';
    $pppAdded = isset($_POST['pppAdded']) ? $pppAdded = $_POST['pppAdded'] : $pppAdded = 0;
    
    // Requête des commentaires

    $args_next_pics = array(
        'post_type' => $type,
        'categorie' => $cat,
        'format' => $format,
        'posts_per_page' => 8 + $pppAdded,
        'orderby' => 'annee',
        'order' => $tri
    );

    $the_query_next_pics = new WP_Query( $args_next_pics );
    $quota = 0;

    ob_start();
    if ( $the_query_next_pics->have_posts() ) : ?>
        <?php while ( $the_query_next_pics->have_posts() ) : $the_query_next_pics->the_post(); ?>
            <?php include(get_template_directory() . './template-parts/bloc-photo.php') ?>
            <?php $quota = $quota+1; ?>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php endif; ?><?php

    $html = ob_get_clean();

  	// Envoyer les données au navigateur
	wp_send_json_success( $html );
    
};