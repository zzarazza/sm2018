<?php
/**
 * Template Name: Child Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
			while ( have_posts() ) :
				the_post();

				if ( $post->post_parent ) { ?>
 				<a class="link-back" href="<?php echo get_permalink( $post->post_parent ); ?>">
    				Back to <?php echo get_the_title( $post->post_parent ); ?>
 				</a>
				<?php }

				get_template_part( 'template-parts/page/content', 'page-child' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
