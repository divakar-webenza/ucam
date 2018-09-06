<?php
/* ------------------------------------------------------------------------- *
 * Register widget area
  /* ------------------------------------------------------------------------- */
function ucam_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Blog Sidebar', 'ucam'),
        'id' => 'blog-sidebar',
        'description' => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ucam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Single Post Sidebar', 'ucam'),
        'id' => 'single-post-sidebar',
        'description' => __('Add widgets here to appear in your Single Detail Post Sidebar. We are displaying Recent and Related Post from sidebar-singlepost.php', 'ucam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 1', 'ucam'),
        'id' => 'footer1',
        'description' => __('Add widgets here to appear in your footer 1.', 'ucam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 2', 'ucam'),
        'id' => 'footer2',
        'description' => __('Add widgets here to appear in your footer 2.', 'ucam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 3', 'ucam'),
        'id' => 'footer3',
        'description' => __('Add widgets here to appear in your footer 3.', 'ucam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 4', 'ucam'),
        'id' => 'footer4',
        'description' => __('Add widgets here to appear in your footer 4.', 'ucam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'ucam_widgets_init');