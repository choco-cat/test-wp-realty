<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( have_posts() ) {
	the_post();
}

$post_id = get_the_ID();
?>
    <div class="wrapper" id="single-wrapper">
        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
            <main id="main">
                <div class="row">
					<?php if ( $post_id ) {
						$realty = get_realty_object( $post_id ); ?>
                        <div class="entry-header">
                            <h1 class="entry-title text-center">
								<?php the_title(); ?>
                            </h1>
                        </div><!-- .entry-header -->
                        <div class="col-md-9">
							<?php
							get_template_part( 'template-parts/realty-content', 'single-realty' );
							?>
                        </div>
                        <div class="col-md-3">
                            <ul class="list-group list-group-flush">
                                <h4>
	                                <?= __( 'Realty Attributes', THEME_TEXTDOMAIN ) ?>
                                </h4>
                                <li class="list-group-item"><span
                                            class="fw-bold me-2"><?= __( 'Realty Type', THEME_TEXTDOMAIN ) ?></span><span><?= $realty['type'] ?></span>
                                </li>
								<?php if ( $realty['city'] ) : ?>
                                    <li class="list-group-item"><span
                                                class="fw-bold me-2"><?= __( 'City', THEME_TEXTDOMAIN ) ?></span><span><?= $realty['city'] ?></span>
                                    </li>
								<?php endif ?>
                                <li class="list-group-item overflow-hidden text-truncate"><span
                                            class="fw-bold me-2"><?= __( 'Address', THEME_TEXTDOMAIN ) ?></span><span><?= $realty['address'] ?></span>
                                </li>
                                <li class="list-group-item"><span
                                            class="fw-bold me-2"><?= __( 'Price', THEME_TEXTDOMAIN ) ?></span><span><?= $realty['price'] ?></span>
                                </li>
                                <li class="list-group-item"><span
                                            class="fw-bold me-2"><?= __( 'Square', THEME_TEXTDOMAIN ) ?></span><span><?= $realty['square'] ?></span>
                                </li>
                            </ul>
                        </div>
						<?php
						understrap_child_post_nav();
					}
					?>
                </div><!-- .row -->
            </main>
        </div><!-- #content -->

    </div><!-- #single-wrapper -->

<?php
get_footer();
