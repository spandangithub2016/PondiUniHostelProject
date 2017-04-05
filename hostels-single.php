<?php /* Template Name: Hostels Single */ ?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * GOOGLE MAPS API KEY : AIzaSyClyTl5h-vda0EURj_4qYLQmokIjz_nQnE, owner : Shaswata
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

$gmap_api = "AIzaSyClyTl5h-vda0EURj_4qYLQmokIjz_nQnE";

if(!empty(get_field('360_image'))) {

    wp_enqueue_style( 'pannellum-css', get_theme_file_uri( '/assets/css/pannellum.css' ), array( 'pu_hostels_2017-style' ), '1.0' );

    wp_enqueue_script( 'pannellum-js', get_theme_file_uri( '/assets/js/vendors/pannellum.js' ), array( 'jquery' ), '1.0', true );
    // wp_enqueue_script( 'view', get_theme_file_uri( '/assets/js/vendors/view.js' ), array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'viewer_360', get_theme_file_uri( '/assets/js/vendors/view_360.js' ), array( 'jquery' ), '1.0', true );

}

global $post;

$current_post_id = $post->ID;

get_header(); ?>

<div class="container-fluid pu-normal" id="content-body" role="contentinfo" data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">
    <div class="container">
        <div class="row" id="content">
            <div class="col-md-12">
                <header class="text-center">
                    <h1 class="page-heading center-block" data-default-font-size="36"><?php the_title() ?></h1>
                    <?php if(!empty(get_field('360_image'))): ?>
                        <div id="panorama" data-url="<?php echo get_field('360_image')["url"] ?>" data-title="<?php the_title() ?>" data-preview-url="<?php echo get_the_post_thumbnail_url( get_the_ID(), $size = 'full' ) ?>"></div>
                    <?php endif; ?>
                    <hr>
                </header>
                <div class="row">
                    <div class="<?php if ( is_page() && $post->post_parent ): ?>col-md-8 col-sm-8 col-md-push-4 col-sm-push-4<?php else: ?>col-md-12<?php endif ?>" data-default-font-size="16">
                        <?php if(!empty(get_field('quote'))) : ?>
                            <figure id="hostel-page-thumbnail">
                                <img class="img-responsive center-block" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), $size = 'full' ) ?>" alt="Image contains a picture of <?php echo get_the_title() ?>, Pondicherry University" />
                                <figcaption>
                                    <p class="caption"><span class="quote-mark">“</span><?php echo get_field('quote') ?><span class="quote-mark">”</span></p>
                                    <p class="by"><?php echo get_field('quote_author') ?></p>
                                </figcaption>
                            </figure>
                        <?php endif; ?>
                        <br>

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; else: ?>
                            <p>Sorry, no posts matched your criteria.</p>
                        <?php endif; ?>
                    </div>

                    <?php if ( is_page() && $post->post_parent ): ?>
                        <div class="col-md-4 col-sm-4 col-md-pull-8 col-sm-pull-8">

                            <?php if(!empty(get_field('warden_slug'))): ?>
                                <div id="warden-info">
                                    <?php echo shortcode_admin_staff(array("slug" => get_field('warden_slug'))) ?>
                                </div>
                            <?php endif; ?>

                            <nav id="hostel-master-list" >
                                <ul class="nav nav-pills nav-stacked">
                                    <?php

                                    $args = array(
                                        'post_type'      => 'page',
                                        'posts_per_page' => -1,
                                        'post_parent'    => $post->post_parent,
                                        'order'          => 'ASC',
                                        'orderby'        => 'title'
                                     );


                                    $parent = new WP_Query( $args );

                                    if ( $parent->have_posts() ) {
                                        while ( $parent->have_posts() ) { $parent->the_post();
                                            if($current_post_id === $post->ID) {
                                                echo "<li class='sidebar-affix active'><a href='" . esc_url( apply_filters( 'the_permalink' , get_permalink( $post ), $post ) )  . "'>" . get_the_title() . "</a></li>";
                                            } else {
                                                echo "<li class='sidebar-affix'><a href='" . esc_url( apply_filters( 'the_permalink' , get_permalink( $post ), $post ) )  . "'>" . get_the_title() . "</a></li>";
                                            }
                                        }
                                    }
                                    wp_reset_query();
                                    ?>
                                </ul>
                            </nav>
                            <?php if(!empty(get_field('google_map_location_slug'))): ?>
                                <h4 style="border-left: 5px solid;padding-left: 5px">DIRECTIONS</h4>
                                <div class="google-maps">

                                    <iframe
                                        width="600"
                                        height="600"
                                        frameborder="0" style="border:0"
                                        src="https://www.google.com/maps/embed/v1/directions?key=<?php echo $gmap_api ?>&origin=Pondicherry+University+Gate+II+Bus+Stop&destination=<?php echo get_field('google_map_location_slug') ?>&avoid=tolls|highways&zoom=14" allowfullscreen>
                                    </iframe>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <h3>Sidebar</h3>
            </div> -->
        </div>

    </div>
</div>

<?php get_footer();
