<?php
$posts_per_page = get_field( 'count_realty', get_queried_object() ) ?: COUNT_HOME_REALTY_OBJECTS;

$args = array(
	'post_type'      => 'realty',
	'posts_per_page' => $posts_per_page,
	'orderby'        => 'date',
	'order'          => 'DESC'
);

$realty_query = new WP_Query( $args );
?>

<?php
if ( $realty_query->have_posts() ) { ?>
    <div id="carouselExample" class="carousel several-elements" data-ride="carousel">
        <div class="carousel-inner p-0">
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

                <div class="carousel-item <?= $active ? 'active' : '' ?>">
                    <div class="card">
						<?php if ( $thumbnail ): ?>
                            <div class="img-wrapper">
                                <img src="<?= $thumbnail ?>" class="card-img-top" alt="...">
                            </div>
						<?php endif ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $title ?></h5>
                            <div class="card-text text-truncate"><?= $content; ?></div>
                        </div>
                        <ul class="list-group list-group-flush">
							<?php if ( $selected_city_title ) : ?>
                                <li class="list-group-item"><span
                                            class="fw-bold me-2"><?= __( 'City', THEME_TEXTDOMAIN ) ?></span><span><?= $selected_city_title ?></span>
                                </li>
							<?php endif ?>
                            <li class="list-group-item overflow-hidden"><span
                                        class="fw-bold me-2"><?= __( 'Address', THEME_TEXTDOMAIN ) ?></span><span
                                        class="text-truncate"><?= $address ?></span>
                            </li>
                            <li class="list-group-item"><span
                                        class="fw-bold me-2"><?= __( 'Price', THEME_TEXTDOMAIN ) ?></span><span><?= $price ?></span>
                            </li>
                            <li class="list-group-item"><span
                                        class="fw-bold me-2"><?= __( 'Square', THEME_TEXTDOMAIN ) ?></span><span><?= $square ?></span>
                            </li>
                        </ul>
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
	<?php
} else {
	echo __( 'No realty posts found.', THEME_TEXTDOMAIN );
}
?>



