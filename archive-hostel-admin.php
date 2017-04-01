<?php
/**
 * The template for displaying all administration-profile
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage pu_hostels_2017
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <header role="page-header" class="col-md-12">
                <h1>Administration</h1>
            </header>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                $custom_terms = get_terms('category');
                var_dump($custom_terms);
                foreach($custom_terms as $custom_term) {
                    wp_reset_query();
                    $args = array('post_type' => 'hostel-admin',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => $custom_term->slug,
                            ),
                        ),
                     );

                     $loop = new WP_Query($args);
                     if($loop->have_posts()) {
                        echo '<h2>'.$custom_term->name.'</h2>';

                        while($loop->have_posts()) : $loop->the_post();
                            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
                        endwhile;
                     }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
