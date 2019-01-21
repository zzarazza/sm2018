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

		if ( 'news' === get_post_type() ) {
			echo '<div class="entry-meta">';
				systemorph_posted_on();
			echo '</div><!-- .entry-meta -->';
		};
		?>
	</header><!-- .entry-header -->

	<div class="blog-content">
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php if ('' !== get_the_post_thumbnail()) : ?>
					<?php the_post_thumbnail( 'systemorph-blog-thumb' ); ?>
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-news-thumbnail.png" width="70" height="70" alt="<?php the_title() ?>">
				<?php endif; ?>
			</a>
		</div><!-- .post-thumbnail -->


		<div class="entry-content">
			<?php
				if ( is_single() ) {
					the_content();
				} else {
					the_excerpt();
				}
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
