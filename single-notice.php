<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container-fluid pu-normal" id="notice-news" data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">
    <div class="container">
        <div class="row">
            <section role="notice-board" class="col-md-8 col-md-offset-2">
                <h1 class="section-heading">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    <strong>N</strong>otice
                    <a class="btn btn-default read-all" href="<?php echo get_site_url(); ?>/notice/" role="button" data-default-font-size="14">View All Notices</a>
                </h1>
                <article class="">
                    <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                    ?>

                            <h2><?php the_title() ?></h2>

                            <div>
                                <?php the_content() ?>
                            </div>

                            <?php if(!empty(get_field('file'))): ?>
                                <p>Download Link : <a href="<?php echo get_field('file') ?>"><?php echo get_field('file') ?></a></p>
                                <object data="<?php echo get_field('file') ?>" type="application/pdf" width="100%" height="500px">
                                  <p>It appears you don't have a PDF plugin for this browser.
                                   No biggie... you can <a href="resume.pdf">click here to
                                  download the PDF file.</a></p>
                                 </object>
                            <?php endif; ?>

                    <?php
                        the_post_navigation( array(
                            'prev_text' => '<span class="sr-only">' . __( 'Previous Post', 'pu_hostels_2017' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'pu_hostels_2017' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . pu_hostels_2017_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
                            'next_text' => '<span class="sr-only">' . __( 'Next Post', 'pu_hostels_2017' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'pu_hostels_2017' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . pu_hostels_2017_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
                        ) );
    				    endwhile; // End of the loop.
                    ?>
                </article>
            </section>
        </div>
    </div>
</div>


			<?php


				// 	get_template_part( 'template-parts/post/content', get_post_format() );
                //
				// 	// If comments are open or we have at least one comment, load up the comment template.
				// 	if ( comments_open() || get_comments_number() ) :
				// 		comments_template();
				// 	endif;
                //
				// 	the_post_navigation( array(
				// 		'prev_text' => '<span class="sr-only">' . __( 'Previous Post', 'pu_hostels_2017' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'pu_hostels_2017' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . pu_hostels_2017_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
				// 		'next_text' => '<span class="sr-only">' . __( 'Next Post', 'pu_hostels_2017' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'pu_hostels_2017' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . pu_hostels_2017_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				// 	) );
                //
				// endwhile; // End of the loop.
			?>

<?php get_footer();
