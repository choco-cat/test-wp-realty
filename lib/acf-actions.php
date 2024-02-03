<?php

function realty_save_post( $post_id ) {
	if ( get_post_type( $post_id ) !== 'realty' ) {
		return;
	}
	$realty_type_id = isset( $_POST['realty_type'] ) ? absint( $_POST['realty_type'] ) : 0;

	if ( $realty_type_id ) {
		wp_set_object_terms( $post_id, $realty_type_id, 'realty_type', false );
	}

	$realty_city_id = isset( $_POST['selected_city'] ) ? absint( $_POST['realty_type'] ) : 0;

	if ( $realty_city_id ) {
		update_post_meta( $post_id, '_selected_city', sanitize_text_field( $_POST['selected_city'] ) );
	}
}

add_action('acf/save_post', 'realty_set_thumbnail');
add_action('acf/save_post', 'realty_save_post');


function realty_set_thumbnail( $post_id ) {
	if ( has_post_thumbnail( $post_id ) ) {
		return;
	}

	$gallery_images = get_field( 'gallery', $post_id );

	if ( ! empty( $gallery_images ) && is_array( $gallery_images ) ) {
		$first_image = reset( $gallery_images );
		set_post_thumbnail( $post_id, $first_image['ID'] );
	}
}

add_action('save_post_realty', 'realty_set_thumbnail');


function add_class_to_fields( $field ) {
	$field['class'] = 'form-control form-control-lg';
	return $field;
}

add_filter('acf/pre_render_field', 'add_class_to_fields', 10, 2);


function custom_title_label_translation( $field ) {
	if ( '_post_title' === $field['name'] ) {
		$field['label'] = __( 'Title' );
	} elseif('_post_content' === $field['name'] ) {
		$field['label'] = __( 'Content' );
	}

	return $field;
}

add_filter( 'acf/load_field', 'custom_title_label_translation' );