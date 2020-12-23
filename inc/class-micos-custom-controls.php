<?php
/**
 * Additional customizer controls
 */
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

    $wp_customize->add_setting('header_logo_size',array(
        'default' => 8
    ));

    $wp_customize->add_control( 'header_logo_size', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __( 'Logo Size' ),
        'description' => __( 'Slide to change logo size' ),
        'input_attrs' => array(
          'min' => 5,
          'max' => 15,
          'step' => 1,
        ),
        'priority' => 8,
      ) );
};

add_action('customize_register','theme_header_customizer');

/** Footer Customizer */
function theme_footer_customizer($wp_customize){
    // Footer Credit
    $wp_customize->add_setting('footer_credit_text',array(
        'default' => __('&copy; Copyright ' . get_bloginfo('name') . ' credit-links','micos-footer-credit-text')
    ));

    $wp_customize->add_control('footer_credit_text',array(
        'type'      => 'textarea',
        'section'   => 'storefront_footer',
        'label'     => __('Footer Credit'),
        'description'=> __("Enter text to appear in the Footer Credits. <br><br> To set the placement of the footer links, add the 'credit-links' keyword in the text. <br><br> To set footer credit links please go to Customize -> Menus -> View All Locations and choose a menu in the Footer Credit Links dropdown."),
        'settings'  => 'footer_credit_text',
        'priority'  => 80
    ));

    $wp_customize->selective_refresh->add_partial('footer_credit_text',array('selector' => '.footer-credits .footer-credit-text'));

    // Social Media Icons
    $wp_customize->add_setting('social_media_text', array(
        'default'   => __('Social Media', 'micos-footer-social-media'),
    ));

    $wp_customize->add_control('social_media_text', array(
        'type'      =>  'text',
        'section'   => 'storefront_footer',
        'label'     => __('Social Media Icons Title','micos-footer-social-media'),
        'description' => __('Enter text to appear before the social media icons. <br><br> To modify the links please go to Customize -> Menus -> View All Locations and change the links under the Social Media Links menu. <br><br> Note: Only the icons for the following are available: Facebook, Instagram, Youtube, Twitter, Google, LinkedIn. Set the name of the link in the menu to the those mentioned so that the apprioriate icon would appear.','micos-footer-social-media'),
        'settings'  => 'social_media_text',
        'priority'  => 81,
    ));

    $wp_customize->selective_refresh->add_partial('social_media_text',array('selector' => '.site-footer .social-media-menu .social-media-title'));

    // Social Media Icons and Text Color
    $wp_customize->add_setting(
        'social_media_color',
        array(
            'default'           => __('#dd3333', 'micos-footer-social-media'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'social_media_color',
            array(
                'label'    => __( 'Social Media Text and Icons Color', 'micos-footer-social-media' ),
                'section'  => 'storefront_footer',
                'settings' => 'social_media_color',
                'priority' => 82,
            )
        )
    );

}
add_action('customize_register','theme_footer_customizer');

function theme_typography_customizer($wp_customize){
    $wp_customize->add_setting('sub_heading_color',array(
        'default'           => __('#000000', 'micos-typograpy-control'),
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sub_heading_color',
            array(
                'label'    => __( 'Sub Heading Color', 'micos-typograpy-control' ),
                'section'  => 'storefront_typography',
                'settings' => 'sub_heading_color',
                'priority' => 21,
            )
        )
    );
}
add_action('customize_register','theme_typography_customizer');
?>