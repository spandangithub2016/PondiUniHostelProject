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

wp_enqueue_style( 'pu_hostels_2017-courgette', "https://fonts.googleapis.com/css?family=Courgette", array( 'pu_hostels_2017-style' ), '1.0' );

get_header(); ?>

<!-- Carousel -->
<div class="container-fluid" id="content-body" data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

</div>



<!-- News and Notice -->
<div class="container-fluid pu-normal" id="notice-news" data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">
    <div class="container">
        <div class="row">
            <section role="notice-board" class="col-md-6">
                <h1 class="section-heading">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    <strong>N</strong>otice
                    <a class="btn btn-default read-all" href="<?php echo get_site_url(); ?>/notice/" role="button" data-default-font-size="14">View All Notices</a>
                </h1>
                <p>Click on a notice to read full content.</p>
                <ul class="list-group" id="notice-list">
                    <?php
                    $args = array(
                        'post_type' => 'notice',
                        'posts_per_page' => 5,
                        'meta_key'	=> 'issue_date',
                    	'orderby'	=> 'meta_value_num',
                    	'order'		=> 'ASC'
                    );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    require get_parent_theme_file_path( '/template_parts/news-notice-home-list.php' );
                endwhile;
                ?>
            </ul>
        </section>
        <section role="news" class="col-md-6">

        </section>
    </div>
</div>
</div>

<!-- News and Notice Ends -->

<?php get_footer();
