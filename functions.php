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

//Enregistrement d'emplacements de menu
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
    register_nav_menu( 'footer-menu', __('Menu footer', 'tex-domain'));
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Utiliser un nouveau script
add_action('wp_enqueue_scripts', 'script1');
function script1() {
    wp_enqueue_script('script1', get_stylesheet_directory_uri() . '/js/scripts1.js', array(), false, true);
}