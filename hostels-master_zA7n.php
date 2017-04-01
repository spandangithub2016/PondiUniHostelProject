<?php /* Template Name: Hostels Master ZA74*/ ?>
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

get_header(); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php the_title() ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="hostel-accordion">
                <div class="accordion" id="zA7n">
                    <ul class="accordion__ul">
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
