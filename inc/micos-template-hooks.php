<?php
/**
 * Micos hooks
 *
 * @package micos
 */

add_action( 'init', 'micos_hooks' );

/**
 * Add and remove Micos/Storefront functions.
 *
 * @return void
 */

 /**
 * NextJump Modifications
 * JAJH 12/05/2020
 */

function micos_hooks() {
	global $storefront_version;

	// Remove cart to add them with a different priority
    remove_action( 'storefront_header', 'storefront_product_search', 40 );
    remove_action( 'storefront_header', 'storefront_header_cart', 60 );

	// Add cart and search with different priority
	add_action( 'storefront_header', 'storefront_icons_start', 36);
	add_action( 'storefront_header', 'storefront_product_search', 37);
	add_action( 'storefront_header', 'storefront_myaccount_link', 38);
	add_action( 'storefront_header', 'storefront_header_cart', 39);
	add_action( 'storefront_header', 'storefront_icons_end', 40);

	// Add footer socials widget
	add_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
	add_action( 'storefront_footer', 'footer_social_icons', 11 );

}
