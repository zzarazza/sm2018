<?php

remove_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts' );

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
    add_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 10, 0 );
}

function oiw_load_recaptcha_badge_page(){
    if ( !is_page( array( 'contact', 'white-paper' ) ) ||
    	 !is_single ( array( 'swiss-re', 'zurich-insurance' ) )
		) {
        wp_dequeue_script('google-recaptcha');
    }
}
add_action( 'wp_enqueue_scripts', 'oiw_load_recaptcha_badge_page' );