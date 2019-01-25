<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<h1 class="page-title"><?php _e( '404', 'systemorph' ); ?></h1>
				<p><?php _e( 'Hold on, where are we?', 'systemorph' ); ?></p>
				<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php _e( 'Get me out of here!', 'systemorph' ); ?></a>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
