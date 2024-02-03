<?php
// TODO: check admin permissions
// TODO: add bootstrap classes
$realty_types  = get_realty_types_select();
$realty_cities = get_city_select();

acf_form( [
	'html_before_fields' => '<h2>' . __( 'Add New Realty', THEME_TEXTDOMAIN ) . '</h2>',
	'post_id'           => 'new_post',
	'post_title'        => true,
	'post_content'      => true,
	'post_type'         => 'realty',
	'new_post'          => array(
		'post_status' => 'publish',
		'post_type'   => 'realty'
	),
	// TODO: move field_groups to constants
	'field_groups'      => [ 6 ],
	'submit_value'      => __( 'Submit' ),
	'uploader'          => 'basic',
	'return'            => home_url(),
	'html_after_fields' => $realty_types . $realty_cities,
] );
