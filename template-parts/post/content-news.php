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
			if ('' !== get_the_post_thumbnail()) :
					the_post_thumbnail( 'systemorph-blog-thumb' );
			else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-news-thumbnail.png" width="70" height="70" alt="<?php the_title() ?>">
			<?php endif;
			the_title( '<h1 class="entry-title">', '</h1>' );
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
		<?php if ( ! is_single() ) { ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php if ('' !== get_the_post_thumbnail()) : ?>
					<?php the_post_thumbnail( 'systemorph-blog-thumb' ); ?>
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-news-thumbnail.png" width="70" height="70" alt="<?php the_title() ?>">
				<?php endif; ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php } ?>

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
