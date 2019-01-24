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

		if ( ! is_single() ) {
			echo sprintf('<div class="entry-meta"><span class="posted-on"><span class="screen-reader-text">Event date</span> %1$s</span>, <span class="location">%2$s</span></div>',
			the_systemorph_event_dates(),
			the_systemorph_event_location()
			);
		}
		?>
	</header><!-- .entry-header -->

	<div class="blog-content">

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
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
