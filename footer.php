<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>


		<footer id="footer" class="container-fluid site-footer pu-normal" role="contentinfo"
        data-color-class-setting="pu-normal" data-color-class-wb="wb" data-color-class-bw="bw" data-color-class-yb="yb"  data-color-class-normal="pu-normal">
            <div class="container">
                <div class="rows row-eq-height" id="footer-content">
                    <div class="col-md-3 col-sm-6">
                        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
                    </div>
                </div>
                <div class="row" id="cc">
                    <div class="col-md-3">
                        <p>&copy; 2017 - <a href="https://www.pondiuni.edu.in">Pondicherry Univerisity</a></p>
                    </div>
                    <div class="col-md-9 text-right">
                        Developed by <a href="#"><strong>The Royal MCA Team(2k15-18) and other Contributors</strong></a>
                    </div>
                </div>
            </div>
		</footer><!-- #colophon -->
	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>
