<?php
/**
 * Template Name: Home Page
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$obj = get_queried_object();
$wrapper_id = 'full-width-page-wrapper';
?>
    <div class="wrapper"
         id="<?php echo $wrapper_id; ?>">
        <div class="<?php echo esc_attr( $container ); ?>" id="content">
            <div class="row">
                <div class="col-md-12 content-area" id="primary">
                    <main class="site-main" id="main" role="main">
                        <?php get_template_part( 'template-parts/realty-slider-section' ) ?>
                    </main>
                </div><!-- #primary -->
            </div><!-- .row -->
        </div><!-- #content -->
    </div><!-- #<?php echo $wrapper_id; ?> -->

<?php
get_footer();
