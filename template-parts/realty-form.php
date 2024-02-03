<?php
//$current_user = wp_get_current_user();

if ( ! current_user_can( 'administrator' ) ) {
	return;
}

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
	'field_groups'      => [ REALTY_ACF_GROUP_ID ],
	'submit_value'      => __( 'Submit' ),
	'uploader'          => 'basic',
	'return'             => home_url(),
	'html_after_fields'  => $realty_types . $realty_cities,
	'html_submit_button' => '<div class="d-grid gap-2">
		<input type="submit" class="btn btn-outline-primary btn-lg"' .
	                        ' value="' . __( 'Submit' ) . '">
		</div>',
] );
