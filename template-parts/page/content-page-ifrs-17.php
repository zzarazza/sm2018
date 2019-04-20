<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>">

	<div class="hero">
		<div class="wrap">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_systemorph_page_subtitle(); ?>
		</div>
	</div><!-- .hero -->

	<div class="wrap">
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</div><!-- .wrap -->

</article><!-- #post-## -->
