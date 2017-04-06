<?php
/**
 * Custom Post Types
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage PU Hostels 2017
 * @since 1.0
 */

function create_post_type() {

    // Register Post Type : Notice
    register_post_type(
        'notice',
        array(
            'labels' => array(
            'name' => __( 'Notice' ),
            'singular_name' => __( 'Notices' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'notice'),
        'supports' => array( 'title', 'editor' )
        )
    );

    // Register Post Type : Admin Staff
    register_post_type(
        'admin-staff',
        array(
            'labels' => array(
            'name' => __( 'Admin Staff' ),
            'singular_name' => __( 'Admin Staff' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'admin-staff'),
         'hierarchical' => true,
        'supports' => array( 'title', 'thumbnail', 'page-attributes')
        )
    );

    // Register Post Type : Amenities
    register_post_type(
        'amenities',
        array(
            'labels' => array(
            'name' => __( 'Amenities' ),
            'singular_name' => __( 'Amenity' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'amenities'),
        'hierarchical' => true,
        'supports' => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
        )
    );

    // Register Post Type : Testimonials
    register_post_type(
        'testimonials',
        array(
            'labels' => array(
            'name' => __( 'Testimonials' ),
            'singular_name' => __( 'Testimonial' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'supports' => array( 'title', 'thumbnail', 'page-attributes' )
        )
    );
}
add_action( 'init', 'create_post_type' );
