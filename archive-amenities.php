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

<div class="container-fluid pu-normal" id="content-body" role="contentinfo" data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">
    <div class="container">
        <div class="row" id="content">
            <div class="col-md-12">
                <h1 class="page-heading" data-default-font-size="36">Hostel Amenities</h1>
                <div class="row">
                    <nav id="amenities-sidebar" class="col-md-3 hidden-sm hidden-xs">
                        <ul class="nav nav-stacked nav-pills" data-spy="affix" data-offset-top="205">
                            <?php
                            $args = array(
                                'post_type' => 'amenities',
                                'posts_per_page' => 20,
                                'sort_column' => 'menu_order',
                                'order' => 'ASC'
                            );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                                <li><a href="#amenity-<?php echo $post->post_name ?>"><?php the_title() ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </nav>
                    <!--Main Content -->
                    <div id="x" class="col-md-9 text-justify">
                        <?php
                        $loop->rewind_posts();
                        while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
                            <section id="amenity-<?php echo $post->post_name ?>" class="group">
                                <header>
                                    <h2><?php the_title() ?></h2>
                                </header>
                                <article>
                                    <?php the_content() ?>
                                </article>
                            </section>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php get_footer();
