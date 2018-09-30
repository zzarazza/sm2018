<?php
	add_filter( 'mb_settings_pages', 'prefix_options_page' );
	function prefix_options_page( $settings_pages ) {
	    $settings_pages[] = array(
	        'id'          => 'sm-preferences',
	        'option_name' => 'sm_preferences',
	        'menu_title'  => 'Preferences',
	        'parent'      => 'options-general.php',
	    );
	    return $settings_pages;
	}