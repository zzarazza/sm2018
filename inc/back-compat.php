<?php
/**
 * Systemorph 2018 back compat functionality
 *
 * Prevents Systemorph 2018 from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since Systemorph 2018 1.0
 */

/**
 * Prevent switching to Systemorph 2018 on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Systemorph 2018 1.0
 */
function systemorph_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'systemorph_upgrade_notice' );
}
add_action( 'after_switch_theme', 'systemorph_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Systemorph 2018 on WordPress versions prior to 4.7.
 *
 * @since Systemorph 2018 1.0
 *
 * @global string $wp_version WordPress version.
 */
function systemorph_upgrade_notice() {
	$message = sprintf( __( 'Systemorph 2018 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'systemorph' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Systemorph 2018 1.0
 *
 * @global string $wp_version WordPress version.
 */
function systemorph_customize() {
	wp_die(
		sprintf( __( 'Systemorph 2018 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'systemorph' ), $GLOBALS['wp_version'] ), '', array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'systemorph_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Systemorph 2018 1.0
 *
 * @global string $wp_version WordPress version.
 */
function systemorph_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Systemorph 2018 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'systemorph' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'systemorph_preview' );
