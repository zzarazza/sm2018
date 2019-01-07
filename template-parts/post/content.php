<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
			if ( is_single() ) {
				systemorph_posted_on();
			} else {
				systemorph_posted_on();
			};
			echo '</div><!-- .entry-meta -->';
		};
		?>
	</header><!-- .entry-header -->

	<div class="blog-content">
	<?php if ( ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php if ('' !== get_the_post_thumbnail()) : ?>
					<?php the_post_thumbnail( 'systemorph-blog-thumb' ); ?>
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-blog-thumbnail.png" width="217" height="203" alt="<?php the_title() ?>">
				<?php endif; ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

		<?php

		/*
		 * If a regular post or page, and not the front page, show the featured image.
		 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
		 */
		if ( '' !== get_the_post_thumbnail() && is_single() ) :
			echo '<div class="single-featured-image-header wp-block-image alignfull">';
			the_post_thumbnail( 'systemorph-featured-image' );
			echo '</div><!-- .single-featured-image-header -->';
		endif;
		?>

		<div class="entry-content">
			<?php

			if ( is_single() ) {
				the_content(
					sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'systemorph' ),
						get_the_title()
					)
				);
			} else {
				the_excerpt();
			}

			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'systemorph' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>
	<?php
	if ( is_single() ) {
		systemorph_entry_footer();
	}
	?>

</article><!-- #post-## -->
