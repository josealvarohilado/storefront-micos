<?php
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
// Should we change this to a menu for a dynamic approach?
function theme_footer_customizer($wp_customize){
    $wp_customize->add_setting('privacy_policy',array(
        'type' => 'option'
    ));

    $wp_customize->add_control('privacy_policy',array(
        'type'      => 'dropdown-pages',
        'section'   => 'storefront_footer',
        'label'     => __('Privacy Policy'),
        'description'=> __('Choose Privacy Policy page'),
        'settings'  => 'privacy_policy',
        'priority'  => 80
    ));

    $wp_customize->add_setting('terms_and_conditions',array(
        'type' => 'option'
    ));

    $wp_customize->add_control('terms_and_conditions',array(
        'type'      => 'dropdown-pages',
        'section'   => 'storefront_footer',
        'label'     => __('Terms & Conditions'),
        'description'=> __('Choose Terms & Conditions page'),
        'settings'  => 'terms_and_conditions',
        'priority'  => 90
    ));
}
add_action('customize_register','theme_footer_customizer');
?>