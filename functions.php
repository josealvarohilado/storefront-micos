<?php

/**
 * NextJump Modifications
 * JAJH 12/05/2020
 */

/**
 * Load the individual classes required by this theme
 */
require_once( 'inc/micos-template-hooks.php' );
require_once( 'inc/micos-template-functions.php' );
require_once( 'inc/plugged.php' );
require_once( 'inc/class-micos-customizer.php' );
require_once( 'inc/class-micos-custom-controls.php');
require_once( 'inc/class-micos-custom-widgets.php');

/**
 * Javascript for search
 */
wp_enqueue_script( 'micos', get_stylesheet_directory_uri() . '/assets/js/micos.js', array( 'jquery' ), "1", true );

add_action( 'after_setup_theme', 'footer_credits_menu_menu' );
function footer_credits_menu_menu() {
  register_nav_menus( array(
    'footer-credits-menu' => __( 'Footer Credits Links', 'micos-theme-menus' ),
    'social-media-menu' => __('Social Media Links', 'micos-theme-menus')
  ));
}

// add_filter( 'body_class', 'custom_class' );
// function custom_class( $classes ) {
//     if ( is_page_template( 'template-fullwidth-centered-heading.php' ) ) {
//         $classes[] = 'fullwidth-center-heading';
//     }
//     return $classes;
// }
?>