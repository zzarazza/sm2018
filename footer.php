<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->
		<div class="footer-extra">
			<div class="wrap">
				<?php the_systemorph_footer_extra(); ?>
			</div>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php if ( has_nav_menu( 'bottom' ) ) : ?>
					<?php get_template_part( 'template-parts/navigation/navigation', 'bottom' ); ?>
				<?php endif; ?>

				<?php
					get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
