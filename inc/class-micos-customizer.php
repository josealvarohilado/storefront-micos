<?php
/**
 * Micos_customizer Class
 * Makes adjustments to Storefront cores Customizer implementation.
 *
 * @author   WooThemes
 * @package  Micos
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Micos_Customizer' ) ) {
	/**
	 * The Micos Customizer class
	 */
	class Micos_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			global $storefront_version;

			add_action( 'wp_enqueue_scripts',                  array( $this, 'customizer_css' ), 999 );
			add_filter( 'storefront_setting_default_values',   array( $this, 'micos_defaults' ) );
		}

		/**
		 * Returns an array of the desired default Storefront options
		 *
		 * @param array $args an array of default values.
		 * @return array
		 */
		public function micos_defaults( $args ) {
			// Header cart
			$args['storefront_header_link_color']           = '#000000';

			return apply_filters( 'micos_customizer_defaults', $args );
		}

		/**
		 * Add CSS using settings obtained from the theme options.
		 *
		 * @return void
		 */
		public function customizer_css() {
			$header_link_color = get_theme_mod( 'storefront_header_link_color' );
			$tagline_font_size = get_theme_mod('tagline_font_size');
			$header_logo_size = get_theme_mod('header_logo_size');
			$social_media_color = get_theme_mod('social_media_color');
			$heading_color = get_theme_mod( 'storefront_heading_color' );
			$sub_heading_color = get_theme_mod('sub_heading_color');
			$button_color = get_theme_mod('storefront_button_background_color');
			$button_text_color = get_theme_mod('storefront_button_text_color');

            $style = '
            .site-header-cart, .site-header-cart > li > a {
                color: ' . $header_link_color . ' !important;
            }
            .site-header-cart:focus, .site-header-cart:focus > li > a {
                color: ' . $header_link_color . ' !important;
            }
            
            .site-header-cart:hover > li > a {
                color: ' . $header_link_color . ' !important;
            }
            a.cart-contents:hover  {
				color: ' . $header_link_color . ' !important;
			}
			.site-header .site-search .widget_product_search form label:before {
				color: ' . $header_link_color . ' !important;
			}
			.site-header .header-icons-container .my-account:after {
				color: ' . $header_link_color . ' !important;
			}
			p.site-description{
				font-size: ' . $tagline_font_size . 'px !important;
			}
			.site-header .custom-logo-link img, .site-header .site-logo-anchor img, .site-header .site-logo-link img {
				width: ' . $header_logo_size . 'em;
			}
			.site-footer .social-media-menu{
				color: ' . $social_media_color . ';
			}
			.site-footer .social-media-menu a{
				color: ' . $social_media_color . ' !important;
			}
			.sub-heading, .entry-content .wpforms-title {
				color: ' . $sub_heading_color . ' ;
			}
			.contact-us-form .wpforms-submit-container .contact-us-send {
				background-color: ' . $button_color . ' !important;
				color: ' . $button_text_color . ' !important;
			}
			.contact-us-form .wpforms-head-container, .phone-enquiries-container .phone-enquiries-header-container {
				border-bottom-color: ' . $button_color . ' !important;
				filter:brightness(1.3);
			}
			';

			wp_add_inline_style( 'storefront-child-style', $style );
		}
	}
}

return new Micos_Customizer();
