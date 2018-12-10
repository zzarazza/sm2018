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
<article id="post-<?php the_ID(); ?>" <?php post_class( 'systemorph-panel ' ); ?> >

	<?php
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'systemorph-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="hero" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="hero-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
			<div class="wrap">
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php
					$subTitle = rwmb_meta( 'home_hero_subtitle' );
					if ($subTitle) :
						echo "<h3 class=\"page-subtitle\">$subTitle</h3>";
					endif;
					$linkTo = rwmb_meta( 'home_hero_link' );
					$buttonCaption = rwmb_meta( 'home_hero_button_caption' );
					if ($linkTo && $buttonCaption) :
						echo '<a class="button" href="' . get_the_permalink($linkTo) . '">' . $buttonCaption . '</a>';
					endif;
				?>
			</div>
		</div><!-- .hero -->

	<?php endif; ?>

	<div class="wrap">
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</div><!-- .wrap -->

</article><!-- #post-## -->
