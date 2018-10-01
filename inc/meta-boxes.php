<?php

function the_systemorph_address() {
	$rwmbMeta = rwmb_meta( 'sm_address_group', array( 'object_type' => 'setting' ), 'sm_preferences' );
	$address = join(' ', $rwmbMeta);

	echo "<address>$address</address>";
}

function the_systemorph_contact_phone() {
	$rwmbMeta = rwmb_meta( 'sm_contact_info', array( 'object_type' => 'setting' ), 'sm_preferences' );
 	echo "<span class=\"tel\">" . $rwmbMeta["sm_contact_phone"] . "</span> ";
}

function the_systemorph_contact_email() {
	$rwmbMeta = rwmb_meta( 'sm_contact_info', array( 'object_type' => 'setting' ), 'sm_preferences' );
 	echo "<a class=\"email\" href=\"mailto:\"" . $rwmbMeta["sm_contact_email"] . "\">"  . $rwmbMeta["sm_contact_email"] . "</a> ";
}

function the_systemorph_contact_info() {
	the_systemorph_contact_phone();
	the_systemorph_contact_email();
}

function the_systemorph_page_subtitle() {
	$rwmbMeta = rwmb_meta( 'page_settings_subtitle');
	if ($rwmbMeta) :
 		echo "<h2 class=\"page-subtitle\">$rwmbMeta</h2>";
 	endif;
}