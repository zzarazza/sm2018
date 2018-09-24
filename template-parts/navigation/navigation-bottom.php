<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="footer-navigation" class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Bottom Menu', 'systemorph' ); ?>">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'bottom',
			'menu_id'        => 'bottom-menu',
		)
	);
	?>
</nav><!-- #site-navigation -->
