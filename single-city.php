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
$vars    = array(
	'posts_per_page' => 10,
	'city_id'        => $post_id,
);
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
                        <div class="col-md-12">
                            <div class="float-lg-start text-center me-lg-4">
								<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                            </div>
                            <div class="entry-content my-4 my-lg-0">
								<?php the_content(); ?>
                            </div><!-- .entry-content -->
                        </div>

                        <div class="col-md-12 my-5">
							<?php get_template_part_with_params( 'template-parts/realty-slider-section/slider', [ 'vars' => $vars ] ); ?>
                        </div>
						<?php
					}
					?>
                </div><!-- .row -->
            </main>
        </div><!-- #content -->

    </div><!-- #single-wrapper -->

<?php
get_footer();
