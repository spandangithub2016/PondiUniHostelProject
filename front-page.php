<?php
/**
* The front page template file
*
* If the user has selected a static page for their homepage, this is what will
* appear.
* Learn more: https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/

get_header(); ?>

<!-- Carousel -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>



<!-- News and Notice -->
<div class="container-fluid pu-normal" id="notice-news" data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">
    <div class="container">
        <div class="row">
            <section role="notice-board" class="col-md-6">
                <h1 class="section-heading">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    <strong>N</strong>otice
                    <a class="btn btn-default read-all" href="#" role="button" data-default-font-size="14">View All Notices</a>
                </h1>
                <p>Click on a notice to read full content.</p>
                <ul class="list-group" id="notice-list">
                    <?php
                    $args = array( 'post_type' => 'notice', 'posts_per_page' => 5 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    require get_parent_theme_file_path( '/template_parts/news-notice-home-list.php' );
                endwhile;
                ?>
            </ul>
        </section>
        <section role="news" class="col-md-6">
            <h1 class="section-heading">
                <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                <strong>N</strong>ews
                <a class="btn btn-default read-all" href="#" role="button">View All News</a>
            </h1>
            <p>Click on a news to read full content.</p>
            <ul id="news-list">
                <?php
                $args = array( 'post_type' => 'news', 'posts_per_page' => 5 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                require get_parent_theme_file_path( '/template_parts/news-notice-home-list.php' );
            endwhile;
            ?>
        </ul>
    </section>
</div>
</div>
</div>

<!-- News and Notice Ends -->

<?php get_footer();
