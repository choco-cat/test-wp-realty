<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$gallery = get_field( 'gallery' );
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php if ( $gallery ): ?>
        <div id="carouselRealtyIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
			<?php if ( count( $gallery ) > 1 ) : ?>
                <div class="carousel-indicators">
					<?php for ( $current = 0; $current < count( $gallery ); $current ++ ) : ?>
                        <button type="button" data-bs-target="#carouselRealtyIndicators"
                                data-bs-slide-to="<?= $current ?>" <?= $current === 0 ? 'class="active"' : '' ?>
                                aria-current="true" aria-label="Slide <?= $current + 1 ?>"></button>
					<?php endfor ?>
                </div>
			<?php endif ?>
            <div class="carousel-inner">
				<?php foreach ( $gallery as $key => $image ) : ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                        <img src="<?= $image['url'] ?>" class="d-block w-100">
                    </div>
				<?php endforeach; ?>

            </div>
			<?php if ( count( $gallery ) > 1 ) : ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselRealtyIndicators"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselRealtyIndicators"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
			<?php endif ?>
        </div>
	<?php endif ?>

    <div class="entry-content my-4">
		<?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
