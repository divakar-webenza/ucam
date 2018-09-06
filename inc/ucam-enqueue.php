<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* ------------------------------------------------------------------------- *
 * Register Style
  /* ------------------------------------------------------------------------- */

function ucam_styles() {
    wp_register_style('bootstrap-min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, false);
    wp_enqueue_style('bootstrap-min');
    wp_register_style('custom-ucam-style', get_template_directory_uri() . '/assets/css/style.css', false, false);
    wp_enqueue_style('custom-ucam-style');
    /* if (is_page(array('contact-us'))) {
      wp_enqueue_style('contact-us', '/assets/themes/ucam/assets/css/contact-us.css', array());
      wp_enqueue_style('theme-style');
      } */
    if (is_page(array('service'))) {
        wp_enqueue_style('services', '/assets/themes/ucam/assets/css/services.css', array());
        wp_enqueue_style('theme-style');
    }
}

add_action('wp_enqueue_scripts', 'ucam_styles');
/* ------------------------------------------------------------------------- *
 * Register Script
  /* ------------------------------------------------------------------------- */

function ucam_scripts() {
//    wp_register_script('jquery-min-js', get_template_directory_uri() . '/assets/js/jquery.min.js', false, false, false);
//    wp_enqueue_script('jquery-min-js');
    wp_deregister_script('jquery-core');
    wp_register_script('jquery-core', "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", array(), '3.1.1');
    wp_register_script('popper-min-js', get_template_directory_uri() . '/assets/js/popper.min.js', false, false, true);
    wp_enqueue_script('popper-min-js');
    wp_register_script('bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', false, false, true);
    wp_enqueue_script('bootstrap-min-js');
    wp_register_script('script-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
    wp_localize_script('script-js', 'WPURLS', array('siteurl' => get_option('siteurl')));
    wp_enqueue_script('script-js');
    if (is_page(array('about'))) {
        wp_enqueue_script('about', '/assets/themes/ucam/assets/js/about.js', array(), '1.0.0', true);
    }
    if (is_page(array('area-of-application-aerospace')) || is_page(array('area-of-application-medical-and-orthopedic-implants')) || is_page(array('area-of-application-automotive')) || is_page(array('area-of-application-power-generation')) || is_page(array('area-of-application-oil-and-gas-industry')) || is_page(array('area-of-application-agriculture-heavy-vehicles')) || is_page(array('area-of-application-mining'))) {
        wp_enqueue_script('jquery.bxslider.min', '/assets/themes/ucam/assets/js/jquery.bxslider.min.js', array(), '1.0.0', true);
        wp_enqueue_script('area-of-application-aerospace', '/assets/themes/ucam/assets/js/area-of-application-aerospace.js', array(), '1.0.0', true);
    }
    if (is_page(array('news-and-events'))) {
        wp_enqueue_script('jquery.bxslider.min', '/assets/themes/ucam/assets/js/jquery.bxslider.min.js', array(), '1.0.0', true);
        wp_enqueue_script('news-and-events', '/assets/themes/ucam/assets/js/news-and-events.js', array(), '1.0.0', true);
    }
    if (is_page(array('news-and-events'))) {
        wp_enqueue_script('jquery.bxslider.min', '/assets/themes/ucam/assets/js/jquery.bxslider.min.js', array(), '1.0.0', true);
        wp_enqueue_script('news-and-events', '/assets/themes/ucam/assets/js/news-and-events.js', array(), '1.0.0', true);
    }
    if (is_page(array('careers'))) {
        wp_enqueue_script('careers', '/assets/themes/ucam/assets/js/careers.js', array(), '1.0.0', true);
    }
    if (preg_match("/product/", $_SERVER['REQUEST_URI'])) {
        wp_enqueue_script('jquery.bxslider.min', '/assets/themes/ucam/assets/js/jquery.bxslider.min.js', array(), '1.0.0', true);
        wp_enqueue_script('product-details', '/assets/themes/ucam/assets/js/product-details.js', array(), '1.0.0', true);
    }
    if (is_page(array('resources'))) {
        wp_enqueue_script('careers', '/assets/themes/ucam/assets/js/resources.js', array(), '1.0.0', true);
        wp_enqueue_script('jquery-validate', '/assets/themes/ucam/assets/js/jquery.validate.min.js', array(), '1.0.0', true);
    }
    if (is_page(array('home'))) {
        wp_enqueue_script('jquery.waypoints.min', '/assets/themes/ucam/assets/js/jquery.waypoints.min.js', array(), '1.0.0', true);
        wp_enqueue_script('home', '/assets/themes/ucam/assets/js/home.js', array(), '1.0.0', true);
    }
}

add_action('wp_enqueue_scripts', 'ucam_scripts');

/**
 * [ucam_theme_queue_js description]
 * @return [type] [description]
 */
function ucam_theme_queue_js() {
    if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
}

add_action('wp_print_scripts', 'ucam_theme_queue_js');
/**
 * This theme styles the visual editor to resemble the theme style,
 * specifically font, colors, and column width.
 */
add_editor_style(array('assets/css/editor-style.css', ucam_fonts_url()));

/**
 * Register custom fonts.
 * [ucam_fonts_url description]
 * @return [type] [description]
 */
function ucam_fonts_url() {
    $fonts_url = '';
    /*
     * Translators: If there are characters in your language that are not
     * supported by Libre Franklin, translate this to 'off'. Do not translate
     * into your own language.
     */
    $libre_franklin = _x('on', 'Libre Franklin font: on or off', 'ucam');
    if ('off' !== $libre_franklin) {
        $font_families = array();
        $font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );
        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }
    return esc_url_raw($fonts_url);
}

function add_this_script_footer() {
    ?> 
    <script>
        document.addEventListener('wpcf7submit', function (event) {
            
            var url = $('.wpcf7-form #url').val();
            var name = $('.wpcf7-form #name').val();
            var company = $('.wpcf7-form #company').val();
            var city = $('.wpcf7-form #city').val();
            var country = $('.wpcf7-form #country').val();
            var phone = $('.wpcf7-form #phone').val();
            var email = $('.wpcf7-form #email').val();
            if (name != '' && company != '' && city != '' && country != '' && phone != '' && email != '') {
                jQuery(".careers-pop").fadeOut();
                var form = document.createElement("form");
                //form.method = "GET";
                form.action = url;
                form.target = "_blank";
                document.body.appendChild(form);
                form.submit();
            }
        }, true);
    </script>
    <?php

}

add_action('wp_footer', 'add_this_script_footer');
