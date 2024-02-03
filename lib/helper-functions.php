<?php

function create_select_html( $field_name, $label, $options ) {
	$html = '<div class="acf-field">';
	$html .= '<div class="acf-label" >
<label for="' . $field_name . '">' . $label . '</label>
</div >';
	$html .= '<div class="acf-input" >';
	$html .= '<select id="' . $field_name . '" name="' . $field_name . '" class="form-select form-control-lg">';

	foreach ( $options as $option ) {
		$html .= '<option value="' . $option['value'] . '">' . $option['text'] . '</option>';
	}

	$html .= '</select>';
	$html .= '</div>
</div>';

	return $html;
}

function get_city_select() {
	$field_name = 'selected_city';
	$args       = array( 'post_type' => 'city', 'posts_per_page' => - 1 );
	$cities     = get_posts( $args );
	$options    = array_map( fn( $item ) => [
		'value' => $item->ID,
		'text'  => esc_html( $item->post_title )
	], $cities );
	$label      = __( 'City', THEME_TEXTDOMAIN );

	return create_select_html( $field_name, $label, $options );
}

function get_realty_types_select() {
	$field_name = 'realty_type';

	$args = array(
		'taxonomy'   => 'realty_type',
		'hide_empty' => false,
		'orderby'    => 'name',
		'order'      => 'ASC',
	);

	$terms   = get_terms( $args );
	$options = array_map( fn( $item ) => [ 'value' => $item->term_id, 'text' => esc_html( $item->name ) ], $terms );
	$label   = __( 'Realty Type', THEME_TEXTDOMAIN );

	return create_select_html( $field_name, $label, $options );
}

function get_realty_object($post_id) {
	$thumbnail_id = get_post_thumbnail_id($post_id);
	$thumbnail = null;

	if ( $thumbnail_id ) {
		$image_url = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
		$thumbnail = $image_url[0];
	}

	$city_id = get_post_meta( $post_id, '_selected_city', true );
	$selected_city_title = $city_id ? get_the_title( $city_id ) : null;

	return array(
		'selected_city_title' => $selected_city_title,
		'title'               => get_the_title($post_id),
		'address'             => get_field( 'address', $post_id ),
		'price'               => get_field( 'price', $post_id ),
		'square'              => get_field( 'square', $post_id ),
		'link'                => get_permalink($post_id),
		'content'             => get_the_content($post_id),
		'thumbnail'           => $thumbnail,
	);
}

function get_template_part_with_params($path, array $params = array()) {
	extract( $params );
	include( locate_template( $path . '.php' ) );
}
