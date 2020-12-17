<?php
/**
 * Micos template functions.
 *
 * @package Micos
 */

/**
 * NextJump Modifications
 * JAJH 12/05/2020
 */

 if ( ! function_exists( 'storefront_myaccount_link' ) ) {
	/**
	 * My Account Link
	 * Displayed a link to the My Account page
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_myaccount_link() {
		?>
			<div class="set-inline">
				<a class="my-account" href="<?php echo esc_url( get_permalink( get_theme_mod('my_account_page')) ); ?>" title="<?php esc_attr_e( 'View your account', 'storefront' ); ?>">
				</a>
			</div>
		<?php
	}
}

if ( ! function_exists( 'storefront_icons_start' ) ) {
	/**
	 * Start tag for Search, My Account and Cart icons container
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_icons_start() {
		?>
			<div class="header-icons-container">
		<?php
	}
}

if ( ! function_exists( 'storefront_icons_end' ) ) {
	/**
	 * End tag for Search, My Account and Cart icons container
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_icons_end() {
		?>
			</div>
		<?php
	}
}