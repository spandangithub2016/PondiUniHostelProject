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

function vb_pagination( $query=null ) {

  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;

  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );

  if ($query->max_num_pages > 1) :
?>
<ul class="pagination">
  <?php
  foreach ( $paginate as $page ) {
    echo '<li>' . $page . '</li>';
  }
  ?>
</ul>
<?php
  endif;
}

get_header(); ?>

<div class="container-fluid pu-normal" id="notice-news" role="contentinfo" data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">

    <div class="container" >
        <div class="row">
            <section role="notice-board" class="col-md-8 col-md-offset-2">
                <?php
                if ( get_query_var('paged') ) {
                   $paged = get_query_var('paged');
                } else if ( get_query_var('page') ) {
                   $paged = get_query_var('page');
                } else {
                   $paged = 1;
                }

                $my_args = array(
                  'post_type' => 'notice',
                  'posts_per_page' => 10,
                  'paged' => $paged
                );

                $my_query = new WP_Query( $my_args );
                 ?>
                <h1 class="section-heading">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    <strong>N</strong>otices
                    <span class="pull-right label label-danger page-no" data-default-font-size="14"><?php echo 'Page '. ( get_query_var('paged') ? get_query_var('paged') : 1 ) . ' of ' . $wp_query->max_num_pages; ?></span>
                </h1>
                <p>Click on a notice to read full content.</p>
                <?php



                if ( $my_query->have_posts() ) :
                    echo '<ul class="list-group">';
                   while ( $my_query->have_posts() ) :
                   $my_query->the_post();
                   require get_parent_theme_file_path( '/template_parts/news-notice-home-list.php' );
                   ?>



                <?php endwhile; ?>
                </ul></section></div>
                <!-- Row closes here. -->

                <nav class="text-center">
                    <?php
                    if ( function_exists('vb_pagination') ) {
                      vb_pagination( $my_query );
                    }
                    ?>
                </nav>
                <?php else: ?>
                  <h2>Not found</h2>
                  </section>
              </div><!-- Row closes here. -->
                <?php endif; ?>

    </div>
</div>

<?php get_footer();
