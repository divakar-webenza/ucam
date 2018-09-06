<?php

/**
 * ucam functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage ucam
 * @since ucam 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since ucam 1.0
 */
define('UCAM_THEME_VERSION', '1.0');
if (!isset($content_width)) {
    $content_width = 660;
}
if (!function_exists('ucam_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function ucam_setup() {
        /**
         * support title tag -> wp_title();
         */
        add_theme_support('title-tag');
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('ucam', get_template_directory() . '/languages');
        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');
        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');
        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'ucam'),
            'secondary' => __('Secondary Menu', 'ucam')
        ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'search-form'
        ));
        /*
         * Add theme support for custom CSS in the TinyMCE visual editor.
         */
        add_editor_style();
        /**
         * Add theme support for Custom Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 100,
            'width' => 400,
            'flex-width' => true,
            'flex-height' => true,
            'header-text' => array('site-title', 'site-description'),
        ));
        /**
         * Add theme support for selective refresh for widgets
         */
        add_theme_support('customize-selective-refresh-widgets');
        /**
         * custom-header
         */
        add_theme_support('custom-header', array(
            'default-image' => '',
            'width' => 0,
            'height' => 0,
            'flex-width' => false,
            'flex-height' => false,
            'uploads' => true,
            'random-default' => true,
            'header-text' => true,
            'default-text-color' => '',
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
            'video' => true,
            'video-active-callback' => '',
        ));
        /**
         * custom-background
         */
        add_theme_support('custom-background', array(
            'default-color' => 'f5f5f5',
            'default-image' => '',
            'default-repeat' => '',
            'default-position-x' => '',
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        ));
    }

endif; // ucam_setup
add_action('after_setup_theme', 'ucam_setup');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ucam_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
    }
}

add_action('wp_head', 'ucam_pingback_header');
/* Adding Woorcommerce taxonomy for creating custom template - starts here */
add_theme_support('woocommerce');
/* Adding Woorcommerce taxonomy for creating custom template - ends here */
/* add_theme_support( 'menus' ); */
/* function footer_widgets_init() {
  register_sidebar( array(
  'name'          => 'Footer Widget Area',
  'id'            => 'custom-footer-widget',
  'before_widget' => '<div class="chw-widget">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="chw-title">',
  'after_title'   => '</h2>',
  ) );
  }
  add_action( 'widgets_init', 'footer_widgets_init' ); */
/* Updagrading jquery_version - Strats here */
/* function replace_core_jquery_version() {
  wp_deregister_script('jquery-core');
  wp_register_script('jquery-core', "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", array(), '3.1.1');
  }
  add_action('wp_enqueue_scripts', 'replace_core_jquery_version'); */
/* Updagrading jquery_version - Ends here */
/* Rendering page specific JS files - Starts here */
/* function my_scripts() {
  if (is_page(array('about'))) {
  wp_enqueue_script('about', '/assets/themes/ucam/assets/js/about.js', array(), '1.0.0', true);
  }
  if (is_page(array('area-of-application-aerospace'))) {
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
  if (is_page(array('contact-us'))) {
  wp_enqueue_style('contact-us', '/assets/themes/ucam/assets/css/contact-us.css', array());
  }
  }
  add_action('wp_enqueue_scripts', 'my_scripts'); */
/* Rendering page specific JS files - Ends here */
/* Using in menu customizing - Starts here */

class Menu_With_Description extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '<br /><span class="sub">' . $item->description . '</span>';
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

/* Using in menu customizing - Ends here */
/* Using is Search - Currently not in use - Starts here */

//function searchfilter($query) {
//
//    if ($query->is_search && !is_admin()) {
//        /* $query->set('post_type', array('post', 'page', 'banner', 'company', 'key_state', 'offer', 'application', 'news', 'event', 'quote', 'milestone', 'award', 'case_study', 'clients', 'aerospace', 'address', 'career', 'advantage')); */
//
//        $query->set(
//                'post_type', array('post', 'page', 'news', 'event', 'career'), 'meta_query', array(
//            array(
//                'key' => 'wysiwyg',
//                'value' => '%s',
//                'compare' => 'LIKE',
//            ),
//                )
//        );
//    }
//
//    return $query;
//}
//
//add_filter('pre_get_posts', 'searchfilter');
/* Using is Search - Currently not in use - Ends here */
/* Custom search - starts here */
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', array('product', 'career', 'news', 'event'));
        $query->set('post_status', 'publish');
        $query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
        $query->set('posts_per_page', 5);
    }
    return $query;
}

add_filter('pre_get_posts', 'SearchFilter');
/* Custom search - ends here */
require get_template_directory() . '/inc/ucam-enqueue.php';
require get_template_directory() . '/inc/ucam-security.php';
require get_template_directory() . '/inc/ucam-custom-post-type.php';
require get_template_directory() . '/inc/ucam-sidebar.php';
require get_template_directory() . '/inc/ucam-custom-functions.php';
/**
 * Requird Theme Plugin .
 */
require get_parent_theme_file_path('/inc/ucam-theme-required-plugins.php');
/* Theme spacific file for - Ends Here */