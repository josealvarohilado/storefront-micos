<?php
/**
 * The template for displaying full width pages with no breadcrumbs.
 *
 * Template Name: Full width (no breadcrumbs)
 *
 * @package storefront
 */

get_header(); ?>

	<!-- Remove breadcrumbs -->
	<style>.storefront-breadcrumb {display: none;} .entry-header h1.entry-title {text-align:center;}</style>

	<div id="primary" class="content-area" style="margin-top: 6em">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
