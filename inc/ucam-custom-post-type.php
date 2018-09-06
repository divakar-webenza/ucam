<?php
/*
 * Custom post type for Banner
 */
function banner_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Banner', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Banner', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Banner - Home page', 'ucam'),
        'parent_item_colon' => __('Parent Banner', 'ucam'),
        'all_items' => __('All Banner', 'ucam'),
        'view_item' => __('View Banner', 'ucam'),
        'add_new_item' => __('Add New Banner', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Banner', 'ucam'),
        'update_item' => __('Update Banner', 'ucam'),
        'search_items' => __('Search Banner', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
        'featured_image' => __('Banner image'),
        'set_featured_image' => __('Set Banner image'),
        'remove_featured_image' => __('Remove Banner image'),
        'use_featured_image' => __('Use as Banner image')
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Banner', 'ucam'),
        'description' => __('Banner description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-slides',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('banner', $args);
}
add_action('init', 'banner_post_type', 0);
function banner_taxonomy() {
    register_taxonomy(
            'banner_categories', //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
            'banner', //post type name
            array(
        'hierarchical' => true,
        'label' => 'Banner Categorirs', //Display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'banner-category', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before 
        )
            )
    );
}
add_action('init', 'banner_taxonomy');
/*
 * Custom post type for Company
 */
function company_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Company', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Company', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Company - Home page', 'ucam'),
        'parent_item_colon' => __('Parent Company', 'ucam'),
        'all_items' => __('All Company', 'ucam'),
        'view_item' => __('View Company', 'ucam'),
        'add_new_item' => __('Add New Company', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Company', 'ucam'),
        'update_item' => __('Update Company', 'ucam'),
        'search_items' => __('Search Company', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Company', 'ucam'),
        'description' => __('Company description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-networking',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('company', $args);
}
add_action('init', 'company_post_type', 0);
/*
 * Custom post type for Key State
 */
function key_state_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Key State', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Key State', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Key State - Home page', 'ucam'),
        'parent_item_colon' => __('Parent Key State', 'ucam'),
        'all_items' => __('All Key State', 'ucam'),
        'view_item' => __('View Key State', 'ucam'),
        'add_new_item' => __('Add New Key State', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Key State', 'ucam'),
        'update_item' => __('Update Key State', 'ucam'),
        'search_items' => __('Search Key State', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Key State', 'ucam'),
        'description' => __('Key State description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-editor-textcolor',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('key_state', $args);
}
add_action('init', 'key_state_post_type', 0);
/*
 * Custom post type for Offer
 */
function offer_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Offer', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Offer', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Offer - Home page', 'ucam'),
        'parent_item_colon' => __('Parent Offer', 'ucam'),
        'all_items' => __('All Offer', 'ucam'),
        'view_item' => __('View Offer', 'ucam'),
        'add_new_item' => __('Add New Offer', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Offer', 'ucam'),
        'update_item' => __('Update Offer', 'ucam'),
        'search_items' => __('Search Offer', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Offer', 'ucam'),
        'description' => __('Offer description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-admin-post',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('offer', $args);
}
add_action('init', 'offer_post_type', 0);
/*
 * Custom post type for Application
 */
function application_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Area of Application', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Application', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Area of Application', 'ucam'),
        'parent_item_colon' => __('Parent Application', 'ucam'),
        'all_items' => __('All Application', 'ucam'),
        'view_item' => __('View Application', 'ucam'),
        'add_new_item' => __('Add New Application', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Application', 'ucam'),
        'update_item' => __('Update Application', 'ucam'),
        'search_items' => __('Search Application', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Application', 'ucam'),
        'description' => __('Application description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-admin-post',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('application', $args);
}
add_action('init', 'application_post_type', 0);
/*
 * Custom post type for News 
 */
function news_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('News', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('News', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('News', 'ucam'),
        'parent_item_colon' => __('Parent News', 'ucam'),
        'all_items' => __('All News', 'ucam'),
        'view_item' => __('View News', 'ucam'),
        'add_new_item' => __('Add New News', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit News', 'ucam'),
        'update_item' => __('Update News', 'ucam'),
        'search_items' => __('Search News', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('News', 'ucam'),
        'description' => __('News description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-money',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('news', $args);
}
add_action('init', 'news_post_type', 0);
/*
 * Custom post type for Event
 */
function event_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Event', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Event', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Event', 'ucam'),
        'parent_item_colon' => __('Parent Event / Event', 'ucam'),
        'all_items' => __('All Event', 'ucam'),
        'view_item' => __('View Event', 'ucam'),
        'add_new_item' => __('Add New Event', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Event', 'ucam'),
        'update_item' => __('Update Event', 'ucam'),
        'search_items' => __('Search Event', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Event', 'ucam'),
        'description' => __('Event description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 11,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('event', $args);
}
add_action('init', 'event_post_type', 0);
/*
 * Custom post type for Quote
 */
function quote_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Quote', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Quote', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Quote - Home page', 'ucam'),
        'parent_item_colon' => __('Parent Quote', 'ucam'),
        'all_items' => __('All Quote', 'ucam'),
        'view_item' => __('View Quote', 'ucam'),
        'add_new_item' => __('Add New Quote', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Quote', 'ucam'),
        'update_item' => __('Update Quote', 'ucam'),
        'search_items' => __('Search Quote', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Quote', 'ucam'),
        'description' => __('Quote description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 12,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('quote', $args);
}
add_action('init', 'quote_post_type', 0);
/*
 * Custom post type for Milestone
 */
function milestone_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Milestone', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Milestone', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Milestone - About Page', 'ucam'),
        'parent_item_colon' => __('Parent Milestone', 'ucam'),
        'all_items' => __('All Milestone', 'ucam'),
        'view_item' => __('View Milestone', 'ucam'),
        'add_new_item' => __('Add New Milestone', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Milestone', 'ucam'),
        'update_item' => __('Update Milestone', 'ucam'),
        'search_items' => __('Search Milestone', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Milestone', 'ucam'),
        'description' => __('Milestone description', 'ucam'),
        'labels' => $labels,
        'supports' => array('title', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 13,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('milestone', $args);
}
add_action('init', 'milestone_post_type', 0);
/*
 * Custom post type for Award
 */
function award_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Award', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Award', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Award - About Page', 'ucam'),
        'parent_item_colon' => __('Parent Award', 'ucam'),
        'all_items' => __('All Award', 'ucam'),
        'view_item' => __('View Award', 'ucam'),
        'add_new_item' => __('Add New Award', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Award', 'ucam'),
        'update_item' => __('Update Award', 'ucam'),
        'search_items' => __('Search Award', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Award', 'ucam'),
        'description' => __('Award description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 14,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('award', $args);
}
add_action('init', 'award_post_type', 0);
/*
 * Custom post type for Case Study
 */
function case_study_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Case Study', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Case Study', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Case Study', 'ucam'),
        'parent_item_colon' => __('Parent Case Study', 'ucam'),
        'all_items' => __('All Case Study', 'ucam'),
        'view_item' => __('View Case Study', 'ucam'),
        'add_new_item' => __('Add New Case Study', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Case Study', 'ucam'),
        'update_item' => __('Update Case Study', 'ucam'),
        'search_items' => __('Search Case Study', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Case Study', 'ucam'),
        'description' => __('Case Study description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 15,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'author', 'thumbnail', 'excerpt', 'comments')
    );
    // Registering your Custom Post Type
    register_post_type('case_study', $args);
}
add_action('init', 'case_study_post_type', 0);
/*
 * Custom post type for Clients
 */
function clients_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Clients', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Clients', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Clients', 'ucam'),
        'parent_item_colon' => __('Parent Clients', 'ucam'),
        'all_items' => __('All Clients', 'ucam'),
        'view_item' => __('View Clients', 'ucam'),
        'add_new_item' => __('Add New Clients', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Clients', 'ucam'),
        'update_item' => __('Update Clients', 'ucam'),
        'search_items' => __('Search Clients', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Clients', 'ucam'),
        'description' => __('Clients description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 16,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('clients', $args);
}
add_action('init', 'clients_post_type', 0);
/*
 * Custom post type for Aerospace Solutions
 */
function aerospace_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Aerospace Solutions', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Aerospace Solutions', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Aerospace Solutions', 'ucam'),
        'parent_item_colon' => __('Parent Aerospace Solutions', 'ucam'),
        'all_items' => __('All Aerospace Solutions', 'ucam'),
        'view_item' => __('View Aerospace Solutions', 'ucam'),
        'add_new_item' => __('Add New Aerospace Solutions', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Aerospace Solutions', 'ucam'),
        'update_item' => __('Update Aerospace Solutions', 'ucam'),
        'search_items' => __('Search Aerospace Solutions', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Aerospace Solutions', 'ucam'),
        'description' => __('Aerospace Solutions description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 17,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('aerospace', $args);
}
add_action('init', 'aerospace_post_type', 0);
/*
 * Custom post type for Address
 */
function address_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Address', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Address', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Address', 'ucam'),
        'parent_item_colon' => __('Parent Address', 'ucam'),
        'all_items' => __('All Address', 'ucam'),
        'view_item' => __('View Address', 'ucam'),
        'add_new_item' => __('Add New Address', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Address', 'ucam'),
        'update_item' => __('Update Address', 'ucam'),
        'search_items' => __('Search Address', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Address', 'ucam'),
        'description' => __('Address description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 18,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('address', $args);
}
add_action('init', 'address_post_type', 0);
/*
 * Custom post type for Career
 */
function career_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Career', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Career', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Career', 'ucam'),
        'parent_item_colon' => __('Parent Career', 'ucam'),
        'all_items' => __('All Career', 'ucam'),
        'view_item' => __('View Career', 'ucam'),
        'add_new_item' => __('Add New Career', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Career', 'ucam'),
        'update_item' => __('Update Career', 'ucam'),
        'search_items' => __('Search Career', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Career', 'ucam'),
        'description' => __('Career description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 19,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('career', $args);
}
add_action('init', 'career_post_type', 0);
/*
 * Custom post type for Advantage
 */
function advantage_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Advantage', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Advantage', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Advantage', 'ucam'),
        'parent_item_colon' => __('Parent Advantage', 'ucam'),
        'all_items' => __('All Advantage', 'ucam'),
        'view_item' => __('View Advantage', 'ucam'),
        'add_new_item' => __('Add New Advantage', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Advantage', 'ucam'),
        'update_item' => __('Update Advantage', 'ucam'),
        'search_items' => __('Search Advantage', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Advantage', 'ucam'),
        'description' => __('Advantage description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 20,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('advantage', $args);
}
add_action('init', 'advantage_post_type', 0);

/*
 * Custom post type for Employees Talk
 */
function employees_talk_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Employees Talk', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Employees Talk', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Employees Talk - Careers page', 'ucam'),
        'parent_item_colon' => __('Parent Employees Talk', 'ucam'),
        'all_items' => __('All Employees Talk', 'ucam'),
        'view_item' => __('View Employees Talk', 'ucam'),
        'add_new_item' => __('Add New Employees Talk', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Employees Talk', 'ucam'),
        'update_item' => __('Update Employees Talk', 'ucam'),
        'search_items' => __('Search Employees Talk', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Employees Talk', 'ucam'),
        'description' => __('Employees Talk description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-money',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('employees_talk', $args);
}
add_action('init', 'employees_talk_post_type', 0);

/*
 * Custom post type for Office
 */
function office_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Office', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Office', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Office - Home page', 'ucam'),
        'parent_item_colon' => __('Parent Office', 'ucam'),
        'all_items' => __('All Office', 'ucam'),
        'view_item' => __('View Office', 'ucam'),
        'add_new_item' => __('Add New Office', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Office', 'ucam'),
        'update_item' => __('Update Office', 'ucam'),
        'search_items' => __('Search Office', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
        'featured_image' => __('Office image'),
        'set_featured_image' => __('Set Office image'),
        'remove_featured_image' => __('Remove Office image'),
        'use_featured_image' => __('Use as Office image')
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Office', 'ucam'),
        'description' => __('Office description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-slides',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('office', $args);
}
add_action('init', 'office_post_type', 0);

function office_taxonomy() {
    register_taxonomy(
            'office_categories', //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
            'office', //post type name
            array(
        'hierarchical' => true,
        'label' => 'Office Categorirs', //Display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'office-category', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before 
        )
            )
    );
}
add_action('init', 'office_taxonomy');

/*
 * Custom post type for Services
 */
function services_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Services', 'Post Type General Name', 'ucam'),
        'singular_name' => _x('Services', 'Post Type Singular Name', 'ucam'),
        'menu_name' => __('Services', 'ucam'),
        'parent_item_colon' => __('Parent Services', 'ucam'),
        'all_items' => __('All Services', 'ucam'),
        'view_item' => __('View Services', 'ucam'),
        'add_new_item' => __('Add New Services', 'ucam'),
        'add_new' => __('Add New', 'ucam'),
        'edit_item' => __('Edit Services', 'ucam'),
        'update_item' => __('Update Services', 'ucam'),
        'search_items' => __('Search Services', 'ucam'),
        'not_found' => __('Not Found', 'ucam'),
        'not_found_in_trash' => __('Not found in Trash', 'ucam'),
    );
// Set other options for Custom Post Type
    $args = array(
        'label' => __('Services', 'ucam'),
        'description' => __('Services description', 'ucam'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 18,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('services', $args);
}
add_action('init', 'services_post_type', 0);

/* ------------------------------------------------------------------------- *
 * Events Post Type
  /* ------------------------------------------------------------------------- */
//if (!function_exists('event_post_type')) {
//    function event_post_type() {
//        $labels = array(
//            'name' => _x('Events', 'Post Type General Name', 'ucam'),
//            'singular_name' => _x('Event', 'Post Type Singular Name', 'ucam'),
//            'menu_name' => __('Events', 'ucam'),
//            'name_admin_bar' => __('Event', 'ucam'),
//            'archives' => __('Event Archives', 'ucam'),
//            'attributes' => __('Event Attributes', 'ucam'),
//            'parent_item_colon' => __('Parent Event:', 'ucam'),
//            'all_items' => __('All Events', 'ucam'),
//            'add_new_item' => __('Add New Event', 'ucam'),
//            'add_new' => __('Add New Event', 'ucam'),
//            'new_item' => __('New Event', 'ucam'),
//            'edit_item' => __('Edit Event', 'ucam'),
//            'update_item' => __('Update Event', 'ucam'),
//            'view_item' => __('View Event', 'ucam'),
//            'view_items' => __('View Events', 'ucam'),
//            'search_items' => __('Search Event', 'ucam'),
//            'not_found' => __('Not found', 'ucam'),
//            'not_found_in_trash' => __('Not found in Trash', 'ucam'),
//            'featured_image' => __('Event Featured Image', 'ucam'),
//            'set_featured_image' => __('Set featured image', 'ucam'),
//            'remove_featured_image' => __('Remove featured image', 'ucam'),
//            'use_featured_image' => __('Use as featured image', 'ucam'),
//            'insert_into_item' => __('Insert into event', 'ucam'),
//            'uploaded_to_this_item' => __('Uploaded to this event', 'ucam'),
//            'items_list' => __('Events list', 'ucam'),
//            'items_list_navigation' => __('Events list navigation', 'ucam'),
//            'filter_items_list' => __('Filter events list', 'ucam'),
//        );
//        $args = array(
//            'label' => __('Event', 'ucam'),
//            'description' => __('Event Description', 'ucam'),
//            'labels' => $labels,
//            'supports' => array('title', 'editor', 'page-attributes',),
//            'taxonomies' => array(),
//            'hierarchical' => true,
//            'public' => true,
//            'show_ui' => true,
//            'show_in_menu' => true,
//            'menu_position' => 27,
//            'menu_icon' => 'dashicons-format-video',
//            'show_in_admin_bar' => true,
//            'show_in_nav_menus' => true,
//            'can_export' => false,
//            'has_archive' => true,
//            'exclude_from_search' => false,
//            'publicly_queryable' => true,
//            'capability_type' => 'page',
//            'show_in_rest' => true,
//        );
//        register_post_type('events', $args);
//    }
//
//    add_action('init', 'event_post_type', 0);
//}
/* ------------------------------------------------------------------------- *
 * News Post Type
  /* ------------------------------------------------------------------------- */
//if (!function_exists('news_post_type')) {
//    
//    function news_post_type() {
//        $labels = array(
//            'name' => _x('News', 'Post Type General Name', 'ucam'),
//            'singular_name' => _x('News', 'Post Type Singular Name', 'ucam'),
//            'menu_name' => __('News', 'ucam'),
//            'name_admin_bar' => __('News', 'ucam'),
//            'archives' => __('News Archives', 'ucam'),
//            'attributes' => __('News Attributes', 'ucam'),
//            'parent_item_colon' => __('Parent News:', 'ucam'),
//            'all_items' => __('All News', 'ucam'),
//            'add_new_item' => __('Add New News', 'ucam'),
//            'add_new' => __('Add New News', 'ucam'),
//            'new_item' => __('New News', 'ucam'),
//            'edit_item' => __('Edit News', 'ucam'),
//            'update_item' => __('Update News', 'ucam'),
//            'view_item' => __('View News', 'ucam'),
//            'view_items' => __('View News', 'ucam'),
//            'search_items' => __('Search News', 'ucam'),
//            'not_found' => __('Not found', 'ucam'),
//            'not_found_in_trash' => __('Not found in Trash', 'ucam'),
//            'featured_image' => __('News Featured Image', 'ucam'),
//            'set_featured_image' => __('Set featured image', 'ucam'),
//            'remove_featured_image' => __('Remove featured image', 'ucam'),
//            'use_featured_image' => __('Use as featured image', 'ucam'),
//            'insert_into_item' => __('Insert into news', 'ucam'),
//            'uploaded_to_this_item' => __('Uploaded to this news', 'ucam'),
//            'items_list' => __('News list', 'ucam'),
//            'items_list_navigation' => __('News list navigation', 'ucam'),
//            'filter_items_list' => __('Filter news list', 'ucam'),
//        );
//        $args = array(
//            'label' => __('News', 'ucam'),
//            'description' => __('News Description', 'ucam'),
//            'labels' => $labels,
//            'supports' => array('title', 'editor', 'page-attributes',),
//            'taxonomies' => array(),
//            'hierarchical' => true,
//            'public' => true,
//            'show_ui' => true,
//            'show_in_menu' => true,
//            'menu_position' => 28,
//            'menu_icon' => 'dashicons-clipboard',
//            'show_in_admin_bar' => true,
//            'show_in_nav_menus' => true,
//            'can_export' => false,
//            'has_archive' => true,
//            'exclude_from_search' => false,
//            'publicly_queryable' => true,
//            'capability_type' => 'page',
//            'show_in_rest' => true,
//        );
//        register_post_type('news', $args);
//    }
//
//    add_action('init', 'news_post_type', 0);
//}
/* ------------------------------------------------------------------------- *
 * Testimonials Post Type
  /* ------------------------------------------------------------------------- */
//if (!function_exists('testimonial_post_type')) {
//    
//    function testimonial_post_type() {
//        $labels = array(
//            'name' => _x('Testimonials', 'Post Type General Name', 'ucam'),
//            'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'ucam'),
//            'menu_name' => __('Testimonials', 'ucam'),
//            'name_admin_bar' => __('Testimonial', 'ucam'),
//            'archives' => __('Testimonial Archives', 'ucam'),
//            'attributes' => __('Testimonial Attributes', 'ucam'),
//            'parent_item_colon' => __('Parent Testimonial:', 'ucam'),
//            'all_items' => __('All Testimonials', 'ucam'),
//            'add_new_item' => __('Add New Testimonial', 'ucam'),
//            'add_new' => __('Add New Testimonial', 'ucam'),
//            'new_item' => __('New Testimonial', 'ucam'),
//            'edit_item' => __('Edit Testimonial', 'ucam'),
//            'update_item' => __('Update Testimonial', 'ucam'),
//            'view_item' => __('View Testimonial', 'ucam'),
//            'view_items' => __('View Testimonials', 'ucam'),
//            'search_items' => __('Search Testimonial', 'ucam'),
//            'not_found' => __('Not found', 'ucam'),
//            'not_found_in_trash' => __('Not found in Trash', 'ucam'),
//            'featured_image' => __('Testimonial Featured Image', 'ucam'),
//            'set_featured_image' => __('Set featured image', 'ucam'),
//            'remove_featured_image' => __('Remove featured image', 'ucam'),
//            'use_featured_image' => __('Use as featured image', 'ucam'),
//            'insert_into_item' => __('Insert into testimonial', 'ucam'),
//            'uploaded_to_this_item' => __('Uploaded to this testimonial', 'ucam'),
//            'items_list' => __('Testimonials list', 'ucam'),
//            'items_list_navigation' => __('Testimonials list navigation', 'ucam'),
//            'filter_items_list' => __('Filter testimonials list', 'ucam'),
//        );
//        $args = array(
//            'label' => __('Testimonial', 'ucam'),
//            'description' => __('Testimonial Description', 'ucam'),
//            'labels' => $labels,
//            'supports' => array('title', 'editor', 'page-attributes'),
//            'taxonomies' => array(),
//            'hierarchical' => true,
//            'public' => true,
//            'show_ui' => true,
//            'show_in_menu' => true,
//            'menu_position' => 29,
//            'menu_icon' => 'dashicons-format-quote',
//            'show_in_admin_bar' => true,
//            'show_in_nav_menus' => true,
//            'can_export' => false,
//            'has_archive' => false,
//            'exclude_from_search' => true,
//            'publicly_queryable' => true,
//            'capability_type' => 'page',
//            'show_in_rest' => true,
//        );
//        register_post_type('testimonials', $args);
//    }
//
//    add_action('init', 'testimonial_post_type', 0);
//}
/* ------------------------------------------------------------------------- *
 * Resources Center Post Type
  /* ------------------------------------------------------------------------- */
//if (!function_exists('resources_center')) {
//    
//    function resources_center() {
//        $labels = array(
//            'name' => _x('Resources Center', 'Post Type General Name', 'ucam'),
//            'singular_name' => _x('Resource Center', 'Post Type Singular Name', 'ucam'),
//            'menu_name' => __('Resources Center', 'ucam'),
//            'name_admin_bar' => __('Resource Center', 'ucam'),
//            'archives' => __('Item Archives', 'ucam'),
//            'attributes' => __('Item Attributes', 'ucam'),
//            'parent_item_colon' => __('Parent Item:', 'ucam'),
//            'all_items' => __('All Resources', 'ucam'),
//            'add_new_item' => __('Add New Resource', 'ucam'),
//            'add_new' => __('Add New Resource', 'ucam'),
//            'new_item' => __('New Item', 'ucam'),
//            'edit_item' => __('Edit Item', 'ucam'),
//            'update_item' => __('Update Item', 'ucam'),
//            'view_item' => __('View Item', 'ucam'),
//            'view_items' => __('View Items', 'ucam'),
//            'search_items' => __('Search Resources', 'ucam'),
//            'not_found' => __('Resource Not found', 'ucam'),
//            'not_found_in_trash' => __('Resource Not found in Trash', 'ucam'),
//            'featured_image' => __('Resource Featured Image', 'ucam'),
//            'set_featured_image' => __('Set Resource featured image', 'ucam'),
//            'remove_featured_image' => __('Remove Resource featured image', 'ucam'),
//            'use_featured_image' => __('Use as Resource featured image', 'ucam'),
//            'insert_into_item' => __('Insert into item', 'ucam'),
//            'uploaded_to_this_item' => __('Uploaded to this item', 'ucam'),
//            'items_list' => __('Items list', 'ucam'),
//            'items_list_navigation' => __('Items list navigation', 'ucam'),
//            'filter_items_list' => __('Filter items list', 'ucam'),
//        );
//        $args = array(
//            'label' => __('Resource Center', 'ucam'),
//            'description' => __('Resources Center', 'ucam'),
//            'labels' => $labels,
//            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes',),
//            'hierarchical' => true,
//            'public' => true,
//            'show_ui' => true,
//            'show_in_menu' => true,
//            'menu_position' => 30,
//            'menu_icon' => 'dashicons-book',
//            'show_in_admin_bar' => true,
//            'show_in_nav_menus' => true,
//            'can_export' => true,
//            'has_archive' => true,
//            'exclude_from_search' => false,
//            'publicly_queryable' => true,
//            'capability_type' => 'page',
//            'show_in_rest' => true,
//        );
//        register_post_type('resources-center', $args);
//    }
//
//    add_action('init', 'resources_center', 0);
//}
/* ------------------------------------------------------------------------- *
 * Jobs Post Type
  /* ------------------------------------------------------------------------- */
//if (!function_exists('jobs_post_type')) {
//    
//    function jobs_post_type() {
//        $labels = array(
//            'name' => _x('Careers', 'Post Type General Name', 'ucam'),
//            'singular_name' => _x('Job', 'Post Type Singular Name', 'ucam'),
//            'menu_name' => __('Jobs', 'ucam'),
//            'name_admin_bar' => __('Job', 'ucam'),
//            'archives' => __('Job Archives', 'ucam'),
//            'attributes' => __('Job Attributes', 'ucam'),
//            'parent_item_colon' => __('Parent Job:', 'ucam'),
//            'all_items' => __('All Jobs', 'ucam'),
//            'add_new_item' => __('Add New Job', 'ucam'),
//            'add_new' => __('Add New Job', 'ucam'),
//            'new_item' => __('New Job', 'ucam'),
//            'edit_item' => __('Edit Job', 'ucam'),
//            'update_item' => __('Update Job', 'ucam'),
//            'view_item' => __('View Job', 'ucam'),
//            'view_items' => __('View Jobs', 'ucam'),
//            'search_items' => __('Search Job', 'ucam'),
//            'not_found' => __('Not found', 'ucam'),
//            'not_found_in_trash' => __('Not found in Trash', 'ucam'),
//            'featured_image' => __('Job Featured Image', 'ucam'),
//            'set_featured_image' => __('Set featured image', 'ucam'),
//            'remove_featured_image' => __('Remove featured image', 'ucam'),
//            'use_featured_image' => __('Use as featured image', 'ucam'),
//            'insert_into_item' => __('Insert into Job', 'ucam'),
//            'uploaded_to_this_item' => __('Uploaded to this Job', 'ucam'),
//            'items_list' => __('jobs list', 'ucam'),
//            'items_list_navigation' => __('jobs list navigation', 'ucam'),
//            'filter_items_list' => __('Filter jobs list', 'ucam'),
//        );
//        $args = array(
//            'label' => __('Job', 'ucam'),
//            'description' => __('Job Description', 'ucam'),
//            'labels' => $labels,
//            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes',),
//            'taxonomies' => array(),
//            'hierarchical' => true,
//            'public' => true,
//            'show_ui' => true,
//            'show_in_menu' => true,
//            'menu_position' => 31,
//            'menu_icon' => 'dashicons-welcome-learn-more',
//            'show_in_admin_bar' => true,
//            'show_in_nav_menus' => true,
//            'can_export' => false,
//            'has_archive' => TRUE,
//            'rewrite' => array( 'slug' => 'careers/opening' ),
//            'exclude_from_search' => TRUE,
//            'publicly_queryable' => true,
//            'capability_type' => 'post',
//            'show_in_rest' => true,
//        );
//        register_post_type('jobs', $args);
//    }
//    add_action('init', 'jobs_post_type', 0);
//}
/* ------------------------------------------------------------------------- *
 * Newsletters Post Type
  /* ------------------------------------------------------------------------- */
//if (!function_exists('newsletter_post_type')) {
//    
//    function newsletter_post_type() {
//        $labels = array(
//            'name' => _x('Newsletters', 'Post Type General Name', 'ucam'),
//            'singular_name' => _x('Newsletter', 'Post Type Singular Name', 'ucam'),
//            'menu_name' => __('Newsletters', 'ucam'),
//            'name_admin_bar' => __('Newsletter', 'ucam'),
//            'archives' => __('Newsletter Archives', 'ucam'),
//            'attributes' => __('Newsletter Attributes', 'ucam'),
//            'parent_item_colon' => __('Parent Newsletter:', 'ucam'),
//            'all_items' => __('All Newsletters', 'ucam'),
//            'add_new_item' => __('Add New Newsletter', 'ucam'),
//            'add_new' => __('Add New Newsletter', 'ucam'),
//            'new_item' => __('New Newsletter', 'ucam'),
//            'edit_item' => __('Edit Newsletter', 'ucam'),
//            'update_item' => __('Update Newsletter', 'ucam'),
//            'view_item' => __('View Newsletter', 'ucam'),
//            'view_items' => __('View Newsletters', 'ucam'),
//            'search_items' => __('Search Newsletter', 'ucam'),
//            'not_found' => __('Not found', 'ucam'),
//            'not_found_in_trash' => __('Not found in Trash', 'ucam'),
//            'featured_image' => __('Newsletter Featured Image', 'ucam'),
//            'set_featured_image' => __('Set featured image', 'ucam'),
//            'remove_featured_image' => __('Remove featured image', 'ucam'),
//            'use_featured_image' => __('Use as featured image', 'ucam'),
//            'insert_into_item' => __('Insert into newsletter', 'ucam'),
//            'uploaded_to_this_item' => __('Uploaded to this newsletter', 'ucam'),
//            'items_list' => __('Newsletters list', 'ucam'),
//            'items_list_navigation' => __('Newsletters list navigation', 'ucam'),
//            'filter_items_list' => __('Filter newsletters list', 'ucam'),
//        );
//        $args = array(
//            'label' => __('Newsletter', 'ucam'),
//            'description' => __('Newsletter Description', 'ucam'),
//            'labels' => $labels,
//            'supports' => array('title', 'editor', 'page-attributes',),
//            'taxonomies' => array(),
//            'hierarchical' => true,
//            'public' => true,
//            'show_ui' => true,
//            'show_in_menu' => true,
//            'menu_position' => 32,
//            'menu_icon' => 'dashicons-media-document',
//            'show_in_admin_bar' => true,
//            'show_in_nav_menus' => true,
//            'can_export' => false,
//            'has_archive' => false,
//            'exclude_from_search' => true,
//            'publicly_queryable' => true,
//            'capability_type' => 'page',
//            'show_in_rest' => true,
//        );
//        register_post_type('newsletters', $args);
//    }
//
//    add_action('init', 'newsletter_post_type', 0);
//}
