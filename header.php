<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<!-- Favicon -->
<link rel="shortcut icon" type="image/png" href="<?= get_template_directory_uri(); ?>/assets/images/favicon.png">
</head>

<body <?php body_class(); ?>>
    <!-- Page Wrap -->
    <div id="page-wrap">
        <header class="container" id="page-header">
            <div class="row">

                <!-- Left Section : Logo -->
                <section class="col-md-4">
                    <a href="#">
                        <img id="logo"
                            class="img-responsive center-block logo"
                            src="<?= get_template_directory_uri(); ?>/assets/images/uni_logo.jpg"
                            alt="The logo of Pondicherry University and the Hostels website.">
                    </a>
                </section>
                <!-- Left Section Ends -->

                <!-- Right Section : Accessibility Controls & Search-->
                <section class="col-md-4 col-md-offset-4">

                    <!-- Top : Accessibility Controls -->
                    <div class="hidden-sm hidden-xs row">

                        <!-- Font Size Controls -->
                        <div class="col-md-5 font_size_controls">

                            <div class="btn-group center-block" role="group" aria-label="">
                                <button type="button" class="btn btn-default btn_font_decrease" title="Decrease Font Size">A<sup>-</sup></button>
                                <button type="button" class="btn btn-default btn_font_restore" title="Restore Font Size">A</button>
                                <button type="button" class="btn btn-default btn_font_increase" title="Increase Font Size">A<sup>+</sup></button>
                            </div>

                        </div>
                        <!-- Font Size Controls Ends -->

                        <!-- Color Controls -->
                        <div class="col-md-7 color_controls">

                            <div class="btn-group center-block" data-toggle="buttons" role="group" aria-label="">
                                <label class="btn btn-default btn_color_normal" title="View page in normal color scheme.">
                                    <input type="radio" name="btn-color-controls" autocomplete="off">
                                    <span id="normal" class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                                </label>
                                <label class="btn btn-default btn_color_yb" title="View page in high contrast  color scheme with blue background and yello foreground.">
                                    <input type="radio" name="btn-color-controls" autocomplete="off">
                                    <span id="yb" class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                                </label>
                                <label class="btn btn-default btn_color_bw" title="View page in white background with black foreground color scheme">
                                    <input type="radio" name="btn-color-controls" autocomplete="off">
                                    <span id="bw" class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                                </label>
                                <label class="btn btn-default btn_color_wb" title="View page in black background with white foreground color scheme">
                                    <input type="radio" name="btn-color-controls" autocomplete="off">
                                    <span id="wb" class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                                </label>


                            </div>
                            <!-- End of Top : Accessibility Controls -->
                        </div>
                        <!-- Color Controls Ends -->
                    </div>

                    <div class="row">
                        <!-- Search Box -->
                        <div class="col-md-12" id="searchbox">

                            <form method="get" action="#" class="form-horizontal">
                                <div class="input-group" title="Enter Search Word and press Enter or click button on right" data-toggle="tooltip" data-placement="bottom">
                                    <input type="text" class="form-control" value="" name="s" id="search" placeholder="Search Website">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>

                        </div>
                        <!-- Search Box Ends -->
                    </div>
                </section>
                <!-- Right Section Ends -->
            </div>
        </header>


        <!-- Primary Navigation : Main Menu -->
        <nav class="navbar navbar-pu-normal" data-spy="affix" data-offset-top="140" data-color-class-setting="navbar-pu-normal" data-color-class-wb="navbar-inverse" data-color-class-bw="navbar-default" data-color-class-yb="navbar-yb"  data-color-class-normal="navbar-pu-normal" role="navigation" aria-label="Main menu">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed" id="btn-nav-accessibility-settings" aria-expanded="false">
                        <span class="sr-only">Open Visual Settings</span>
                        <span class="glyphicon glyphicon-cog"></span>
                    </button>
                    <span class="navbar-brand hidden-sm hidden-md hidden-lg fc">Menu</span>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1" data-default-font-size="14">
                    <?php /* Primary navigation */
                        wp_nav_menu( array(
                          'menu' => 'main-menu',
                          'depth' => 3,
                          'container' => false,
                          'menu_class' => 'nav navbar-nav',
                          //Process nav menu using our custom nav walker
                          'walker' => new wp_bootstrap_navwalker())
                        );
                    ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
