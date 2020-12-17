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
 * Javascript for search
 */
wp_enqueue_script( 'micos', get_stylesheet_directory_uri() . '/assets/js/micos.js', array( 'jquery' ), "1", true );

/**
 * Additional customizer controls
 */
add_action('customize_register','theme_header_customizer');
function theme_header_customizer ($wp_customize) {
    $wp_customize->add_setting('tagline_font_size',array(
        'default' =>20
    ));

    $wp_customize->add_control( 'tagline_font_size', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __( 'Tagline Font Size' ),
        'description' => __( 'Slide to change tagline font size' ),
        'input_attrs' => array(
          'min' => 15,
          'max' => 30,
          'step' => 1,
        ),
      ) );
    
    $wp_customize->add_setting('my_account_page', array(
        'default' => 'my-account'
    ));

    $wp_customize->add_control('my_account_page',array(
        'label' => 'Select My Account Page',
        'type'  => 'dropdown-pages',
        'section' => 'title_tagline',
        'settings' => 'my_account_page'
    ));
};

?>