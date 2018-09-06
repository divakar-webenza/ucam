<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
    </head>
    <body <?php //body_class();  ?>>
        <header>
            <div class=" head">
                <div class="logo float-left"> 
                    <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="UCAM - Engineering Excellence. Exactly" /></a> 
                </div>
                <div id="ucammenu" class="float-right">
                    <a id="menu-icon">&#9776;</a>
                    <form method="get" id="searchform"class="menu-form" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                        <input type="text" class="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" id="s" placeholder="<?php esc_attr_e('Search &hellip;', 'shape'); ?>" />
                        <input  class="search-btn" type="submit" value="" />
                        <input type="hidden" name="post_type[]" value="product" />
                        <input type="hidden" name="post_type[]" value="career" />
                        <input type="hidden" name="post_type[]" value="event" />
                        <input type="hidden" name="post_type[]" value="news" />
                        <div class="menu-btn-rt">
                            <div class="menu-cont"> <a href="/contact-us/">CONTACT US</a> </div>
                            <?php //pll_the_languages(array('dropdown' => 1, 'class' => 'custom-select selectlanguage')); ?>
                            <div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                    <!-- Main Menu start here - start here -->
                    <?php $walker = new Menu_With_Description; ?>
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'walker' => $walker)); ?>
                    <!--  <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu', 'walker' => $walker)); ?> -->
                    <!-- Main Menu start here - ends here -->
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </header>