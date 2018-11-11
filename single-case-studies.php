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
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			if ( is_sticky() && is_home() ) :
				echo systemorph_get_svg( array( 'icon' => 'thumb-tack' ) );
			endif;
			?>
			<header class="entry-header">
				<?php

				if ( is_single() ) {
					$postType = get_post_type_object(get_post_type());
					$postTypeName = '<strong>' . esc_html($postType->labels->singular_name) . '</strong> ';

					the_title( '<h1 class="entry-title">' . $postTypeName, '</h1>' );
				} elseif ( is_front_page() && is_home() ) {
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
			</header><!-- .entry-header -->

			<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'systemorph-featured-image' ); ?>
					</a>
				</div><!-- .post-thumbnail -->
			<?php endif; ?>

			<div class="entry-content">
				<?php
				/* translators: %s: Name of current post */
				the_content(
					sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'systemorph' ),
						get_the_title()
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php
			if ( is_single() ) {
				systemorph_entry_footer();
			}
			?>

		</article><!-- #post-## -->
			<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'systemorph' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'systemorph' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . systemorph_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'systemorph' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'systemorph' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . systemorph_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					)
				);

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
