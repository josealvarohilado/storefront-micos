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
			// add_action( 'customize_register',                  array( $this, 'edit_settings' ),      99 );
			add_filter( 'storefront_setting_default_values',   array( $this, 'micos_defaults' ) );
			// add_filter( 'storefront_default_background_color', array( $this, 'default_background_color' ) );
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
			p.site-description, .site-header, .storefront-handheld-footer-bar {
				color: ' . $header_link_color . ' !important;
			}';

			wp_add_inline_style( 'storefront-child-style', $style );
		}
	}
}

return new Micos_Customizer();
