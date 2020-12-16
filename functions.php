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

/**
 * 
 * Javascript for search
 */
wp_enqueue_script( 'micos', get_stylesheet_directory_uri() . '/assets/js/micos.js', array( 'jquery' ), "1", true );
?>