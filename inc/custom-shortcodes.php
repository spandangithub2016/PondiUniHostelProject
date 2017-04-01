<?php

//[admin-staff]
function shotcode_admin_staff( $atts ){

    $a = shortcode_atts( array(
        'slug' => ''
    ), $atts );

    if(!empty($a['slug'])) {

        $the_slug = $a['slug'];
        $args = array(
            'name'        => $the_slug,
            'post_type'   => 'admin-staff',
            'post_status' => 'publish',
            'numberposts' => 1
        );
        $my_posts = get_posts($args);
        if( $my_posts ) :
            $admin_staff = $my_posts[0];
        else :
            return "Staff Profile Not Found";
        endif;

        // Process output
        ob_start();
        require get_parent_theme_file_path('/template_parts/admin-staff-profile.php');
        return ob_get_clean();
    } else {
        return "Invalid Post";
    }
}
add_shortcode( 'admin-staff', 'shotcode_admin_staff' );
