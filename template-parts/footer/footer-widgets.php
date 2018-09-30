<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'sidebar-2' ) ) :
?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'systemorph' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) {
		?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php } ?>
	</aside><!-- .widget-area -->

<?php endif; ?>
