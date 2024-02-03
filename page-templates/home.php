<?php
/**
 * Template Name: Home Page
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
acf_form_head();
get_header();

$container = get_theme_mod( 'understrap_container_type' );
$wrapper_id = 'full-width-page-wrapper';

$posts_per_page = get_field( 'count_realty', get_queried_object() ) ?: COUNT_HOME_REALTY_OBJECTS;
$vars = array(
	'posts_per_page' => $posts_per_page,
);
?>
    <div class="wrapper"
         id="<?php echo $wrapper_id; ?>">
        <div class="<?php echo esc_attr( $container ); ?>" id="content">
            <div class="row">
                <div class="col-md-12 content-area" id="primary">
                    <main class="site-main" id="main" role="main">
                        <?php get_template_part_with_params( 'template-parts/realty-slider-section/slider', ['vars' => $vars] ); ?>
                        <?php get_template_part( 'template-parts/cities-section' ) ?>
                        <?php get_template_part( 'template-parts/realty-form' ) ?>
                        <?php get_template_part( 'template-parts/modal' ) ?>
                    </main>
                </div><!-- #primary -->
            </div><!-- .row -->
        </div><!-- #content -->
    </div><!-- #<?php echo $wrapper_id; ?> -->

<?php
get_footer();
