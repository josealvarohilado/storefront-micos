<?php
/**
 * Plugged functions
 * Any functions declared here are overwriting counterparts from a plugin or Storefront core.
 *
 * @package storechild
 */

/**
 * Cart Link
 * @since  1.0.0
 */

/**
 * NextJump Modifications
 * JAJH 12/05/2020
 */

 if ( ! function_exists( 'storefront_header_cart' ) ) {
	/**
	 * Display Header Cart
	 * Micos customization: Added set-inline class
	 *
	 * @since  1.0.0
	 * @uses  storefront_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function storefront_header_cart() {
		if ( storefront_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			?>
		<ul id="site-header-cart" class="site-header-cart menu set-inline">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php storefront_cart_link(); ?>
			</li>
			<li>
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
			</li>
		</ul>
			<?php
		}
	}
}

if ( ! function_exists( 'storefront_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_cart_link() {
		if ( ! storefront_woo_cart_available() ) {
			return;
		}
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
				<?php /* translators: %d: number of items in cart */ ?>
				<?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> 
				<span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count()); ?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'storefront_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 * Micos customization: Added tagline description below logo
	 *
	 * @since 2.1.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function storefront_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;

			/** Added Tagline Description under logo icon */
			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		} else {
			$tag = is_home() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) . '>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'storefront_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_credit() {
		$footer_text = get_theme_mod('credits_text');
		?>
		<div class="site-info">
			<div class="footer-credits">
				&copy; Copyright <?php echo get_bloginfo('name') . '. ' . $footer_text;?>
			</div>
			<!-- <?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . gmdate( 'Y' ) ) ); ?>

			<?php if ( ! empty( $links_output ) ) { ?>
				<br />
				<?php echo wp_kses_post( $links_output ); ?>
			<?php } ?> -->
		</div><!-- .site-info -->
		<?php
	}
}
