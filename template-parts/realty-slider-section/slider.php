<?php
extract( $vars );

$args = array(
	'post_type'      => 'realty',
	'posts_per_page' => $posts_per_page,
	'orderby'        => 'date',
	'order'          => 'DESC'
);

if ( isset( $city_id ) ) {
	$args['meta_query'] = array(
		array(
			'key'     => '_selected_city',
			'value'   => $city_id,
			'compare' => '=',
		),
	);
}
$realty_query = new WP_Query( $args );

if ( $realty_query->have_posts() ) { ?>
    <h2><?= __( 'Last Realty', THEME_TEXTDOMAIN ) ?></h2>
    <div id="carouselRealty" class="carousel several-elements" data-ride="carousel">
        <div class="carousel-inner py-4">
			<?php
			while ( $realty_query->have_posts() ) {
				$realty_query->the_post();
				$vars = get_realty_object( get_the_ID() );
				$vars['active'] = $realty_query->current_post === 0;
				get_template_part_with_params( 'template-parts/realty-slider-section/item', [ 'vars' => $vars ] );
			}
			wp_reset_postdata();
			?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRealty" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?= __( 'Previous' ) ?></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselRealty" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?= __( 'Next' ) ?></span>
        </button>
    </div>
	<?php
} else {
	echo __( 'No Realty Found', THEME_TEXTDOMAIN );
}
?>
