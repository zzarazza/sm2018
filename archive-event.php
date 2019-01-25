<?php
/**
 * The template for displaying archive pages
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

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				$postType = get_archive_post_type();
				echo '<h1 class="page-title">' . $postType . '</h1> ';
				echo '<p class="page-description">' . get_the_post_type_description() . '</p> ';
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
		?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post/content', get_post_type() );

			endwhile;

			the_posts_pagination(
				array(
					'prev_text'          =>  '<span class="screen-reader-text">' . __( 'Previous page', 'systemorph' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'systemorph' ) . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'systemorph' ) . ' </span>',
				)
			);

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
