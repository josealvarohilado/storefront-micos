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


if ( ! function_exists( 'footer_social_icons' ) ) {
	/**
	 * Social Media Icons
	 * Display Social Media Icons in footer
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function footer_social_icons() {
		$menu_name = 'social-media-menu';
		if ( ($menu = get_nav_menu_locations()) && isset($menu[$menu_name]) ){
			$menu_object = wp_get_nav_menu_object($menu[$menu_name]);
			$menu_items = wp_get_nav_menu_items($menu[$menu_name]);
			
			if (!empty($menu_items)){
				?>
				<div class="<?php echo esc_attr($menu_name);?>">
					<span class="social-media-title"><?php echo(esc_attr(get_theme_mod('social_media_text')))?></span>
					<?php
					$nav_link = '';
					foreach($menu_items as $nav_item){
						echo $nav_link . "<a href='" . esc_url($nav_item->url) . "' class='" . esc_attr(strtolower($nav_item->title)) . "'></a> ";
					}
					?>
				</div> <!-- social media -->
				<?php
			}
		}
		?>
		<?php
	}
}

?>