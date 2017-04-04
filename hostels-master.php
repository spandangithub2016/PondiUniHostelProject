<?php /* Template Name: Hostels Master */ ?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

wp_enqueue_style( 'pu_hostels_2017-la', get_theme_file_uri( '/assets/css/liteaccordion.css' ), array( 'pu_hostels_2017-style' ), '1.0' );

wp_enqueue_script( 'pu_hostels_2017-jquery-easing', get_theme_file_uri( '/assets/js/vendors/jquery.easing.1.3.js' ), array( 'jquery' ), '1.3', true );

wp_enqueue_script( 'pu_hostels_2017-liteaccordion', get_theme_file_uri( '/assets/js/vendors/liteaccordion.jquery.js' ), array( 'jquery' ), '2.1.1', true );


get_header(); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"><?php the_title() ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="hostel-accordion" class="hidden-xs">
                    <ol>
                        <?php

                        $args = array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => $post->ID,
                            'order'          => 'ASC',
                            'orderby'        => 'title'
                         );


                        $parent = new WP_Query( $args );

                        if ( $parent->have_posts() ) {
                            while ( $parent->have_posts() ) { $parent->the_post();
                                require get_parent_theme_file_path( '/template_parts/accordion-list.php' );
                            }
                        }
                        wp_reset_query();
                        ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <nav id="hostel-master-list">
                    <ul class="nav nav-pills nav-stacked">
                        <?php

                        $args = array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => $post->ID,
                            'order'          => 'ASC',
                            'orderby'        => 'title'
                         );


                        $parent = new WP_Query( $args );

                        if ( $parent->have_posts() ) {
                            while ( $parent->have_posts() ) { $parent->the_post();
                                echo "<li><a href='" . esc_url( apply_filters( 'the_permalink' , get_permalink( $post ), $post ) )  . "'>" . get_the_title() . "</a></li>";
                            }
                        }
                        wp_reset_query();
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
