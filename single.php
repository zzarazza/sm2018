<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'systemorph' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'systemorph' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'systemorph' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'systemorph' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php
get_footer();
