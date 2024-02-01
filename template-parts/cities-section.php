<?php
$posts_per_page = get_field( 'count_cities', get_queried_object() ) ?: COUNT_HOME_CITIES;

$args = array(
	'post_type'      => 'city',
	'posts_per_page' => $posts_per_page,
	'orderby'        => 'date',
	'order'          => 'DESC'
);

$realty_query = new WP_Query( $args );
?>

<?php
if ( $realty_query->have_posts() ) { ?>
    <h2><?= __( 'Cities', THEME_TEXTDOMAIN ) ?></h2>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
		<?php
		while ( $realty_query->have_posts() ) {
			$realty_query->the_post();
			$city_id             = get_post_meta( get_the_ID(), '_selected_city', true );
			$selected_city_title = $city_id ? get_the_title( $city_id ) : null;
			$active              = $realty_query->current_post === 0;
			$title               = get_the_title();
			$address             = get_field( 'address' );
			$price               = get_field( 'price' );
			$square              = get_field( 'square' );
			$link                = get_permalink();
			$content             = get_the_content();
			$thumbnail_id        = get_post_thumbnail_id();
			$thumbnail           = null;

			if ( $thumbnail_id ) {
				$image_url = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
				$thumbnail = $image_url[0];
			}
			?>

            <div class="col">
                <div class="card h-100">
                    <img src="<?= $thumbnail ?>" class="card-img-top" alt="<?= $title ?>">
                    <div class="card-body pb-0">
                        <h5 class="card-title"><?= $title ?></h5>
                        <div class="card-text"><?= $content ?></div>
                    </div>
                    <div class="p-2 d-flex justify-content-center">
                        <a href="<?= $link ?>"
                           class="btn btn-primary"><?= __( 'Read more', THEME_TEXTDOMAIN ) ?></a>
                    </div>
                </div>
            </div>
			<?php
		}
		wp_reset_postdata();
		?>
    </div>
	<?php
} else {
	echo __( 'No realty posts found.', THEME_TEXTDOMAIN );
}
?>
