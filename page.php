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
                <h1 class="page-heading" data-default-font-size="36"><?php the_title() ?></h1>
                <div class="row">
                    <div class="col-md-12" data-default-font-size="16">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; else: ?>
                            <p>Sorry, no posts matched your criteria.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <h3>Sidebar</h3>
            </div> -->
        </div>

    </div>
</div>

<?php get_footer();
