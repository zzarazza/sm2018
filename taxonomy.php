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

		<a class="back-to-archive-link" href="<?= get_post_type_archive_link( get_post_type() ); ?>">Back</a>

		<header class="page-header">

			<?php
				echo '<h1 class="page-title">' . single_term_title( '', false ) . '</h1>';
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
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
