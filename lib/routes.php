<?php
// create routes
add_action( 'rest_api_init', function () {
	$namespace = 'api';

	register_rest_route( $namespace, '/save_realty', [
		'methods'  => 'POST',
		'callback' => 'save_realty',
	] );
} );

function save_realty( WP_REST_Request $request ) {
	$acf_array = $request->get_param( 'acf' );

	$save      = array(
		'ID'          => 0,
		'post_type'   => 'realty',
		'post_status' => 'publish',
	);

	if ( isset( $acf_array['_post_title'] ) ) {
		$save['post_title'] = acf_extract_var( $acf_array, '_post_title' );
	}

	if ( isset( $acf_array['_post_content'] ) ) {
		$save['post_content'] = acf_extract_var( $acf_array, '_post_content' );
	}

	$post_id = wp_insert_post( $save );
	acf_save_post( $post_id );

	$realty_data = get_realty_object( $post_id );

	ob_start();
	get_template_part_with_params( 'template-parts/realty-slider-section/item', ['vars' => $realty_data] );
	$content = ob_get_clean();

	wp_send_json( [
		'message' => 'success',
		'post'    => $content,
	] );
}
