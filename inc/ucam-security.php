<?php

/* ------------------------------------------------------------------------- *
 * Remove WordPress Meta Information from header (wp_head)
/* ------------------------------------------------------------------------- */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

/* ------------------------------------------------------------------------- *
 * Remove Extra Feed links from header (wp_head)
/* ------------------------------------------------------------------------- */
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

/* ------------------------------------------------------------------------- *
 * Disable XML RPC
/* ------------------------------------------------------------------------- */
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

/* ------------------------------------------------------------------------- *
 * Remove junk from head
/* ------------------------------------------------------------------------- */
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/* ------------------------------------------------------------------------- *
 * REMOVE WP EMOJI from header (wp_head)
/* ------------------------------------------------------------------------- */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

/* ------------------------------------------------------------------------- *
 * wp_mail_from_name
/* ------------------------------------------------------------------------- */
add_filter('wp_mail_from', 'send_mail_from');
add_filter('wp_mail_from_name', 'send_mail_from');

function send_mail_from() {
	return get_option('wp_mail_from' == current_filter() ? 'admin_email' : 'blogname');
}

/* ------------------------------------------------------------------------- *
 * Remove WordPress Logo From Admin Bar
/* ------------------------------------------------------------------------- */
add_action('admin_bar_menu', 'wordpress_logo_admin_bar_remove', 999);

function wordpress_logo_admin_bar_remove($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
}

/* ------------------------------------------------------------------------- *
 * Insert Custom Login Logo
/* ------------------------------------------------------------------------- */
add_action('login_head', 'custom_login_logo');

function custom_login_logo() {
	echo '
        <style>
            .login h1 a { background-image: url(' . get_template_directory_uri() . '/assets/images/ucam-logo.jpg) !important; background-size: 265px 90px; width:265px; height:90px; display:block; }
        </style>
    ';
}

/* ------------------------------------------------------------------------- *
 * Change WordPress Login Logo URL
/* ------------------------------------------------------------------------- */
add_filter('login_headerurl', 'custom_logo_url');

function custom_logo_url($url) {
	return 'http://www.ucam.co.in/';
}

/* ------------------------------------------------------------------------- *
 * Change WordPress Login Logo Title Text
/* ------------------------------------------------------------------------- */
add_filter('login_headertitle', 'custom_logo_title');

function custom_logo_title() {
	return 'UCAM';
}

/* ------------------------------------------------------------------------- *
 * Disable login hints
/* ------------------------------------------------------------------------- */

function no_wordpress_errors() {
	return 'What the heck are you doing?! Back off!';
}

add_filter('login_errors', 'no_wordpress_errors');

/* ------------------------------------------------------------------------- *
 * Automatically update Themes, Plugins
/* ------------------------------------------------------------------------- */
add_filter('auto_update_plugin', '__return_true');
add_filter('auto_update_theme', '__return_true');

/* ------------------------------------------------------------------------- *
 * Display Featured Image in WordPress RSS feed
/* ------------------------------------------------------------------------- */
add_filter('the_content', 'featured_image_in_feed');

function featured_image_in_feed($content) {
	global $post;
	if (is_feed()) {
		if (has_post_thumbnail($post->ID)) {
			$output = get_the_post_thumbnail($post->ID, 'medium', array('style' => 'float:right; margin:0 0 10px 10px;'));
			$content = $output . $content;
		}
	}
	return $content;
}

/* ------------------------------------------------------------------------- *
 * Modify Admin Footer Text
/* ------------------------------------------------------------------------- */

function modify_footer() {
	echo 'Created by <a href="http://www.webenza.com/" target=_blank>Webenza India Pvt Ltd</a>.';
}

add_filter('admin_footer_text', 'modify_footer');

/* ------------------------------------------------------------------------- *
 * Remove Query String from Static Resources
/* ------------------------------------------------------------------------- */

function remove_cssjs_ver($src) {
	if (strpos($src, '?ver=')) {
		$src = remove_query_arg('ver', $src);
	}

	return $src;
}

add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);

/* ------------------------------------------------------------------------- *
 * How to login with email only no username?
/* ------------------------------------------------------------------------- */
remove_filter('authenticate', 'wp_authenticate_username_password', 20);
add_filter('authenticate', function ($user, $email, $password) {

	//Check for empty fields
	if (empty($email) || empty($password)) {
		//create new error object and add errors to it.
		$error = new WP_Error();

		if (empty($email)) {
			//No email
			$error->add('empty_username', __('<strong>ERROR</strong>: Username field is empty.', 'ucam'));
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			//Invalid Email
			$error->add('invalid_username', __('<strong>ERROR</strong>: Username is invalid.', 'ucam'));
		}

		if (empty($password)) {
			//No password
			$error->add('empty_password', __('<strong>ERROR</strong>: Password field is empty.', 'ucam'));
		}

		return $error;
	}

	//Check if user exists in WordPress database
	$user = get_user_by('email', $email);

	//bad email
	if (!$user) {
		$error = new WP_Error();
		$error->add('invalid', __('<strong>ERROR</strong>: Either the username or password you entered is invalid.', 'ucam'));
		return $error;
	} else {
		//check password
		if (!wp_check_password($password, $user->user_pass, $user->ID)) {
			//bad password
			$error = new WP_Error();
			$error->add('invalid', __('<strong>ERROR</strong>: Either the username or password you entered is invalid.', 'ucam'));
			return $error;
		} else {
			return $user; //passed
		}
	}
}, 20, 3);

/* ------------------------------------------------------------------------- *
 * Change text "Username or Email Address" in wp-login.php to "Email Address"
/* ------------------------------------------------------------------------- */
add_filter('gettext', function ($text) {
	if (in_array($GLOBALS['pagenow'], array('wp-login.php'))) {
		if ('Username or Email Address' == $text) {
			return 'Email Address';
		}
	}
	return $text;
}, 20);

/* ------------------------------------------------------------------------- *
 * Function to return user count
 * Creating a shortcode to display user count
/* ------------------------------------------------------------------------- */
function wpb_user_count() {
	$usercount = count_users();
	$result = $usercount['total_users'];
	return $result;
}
add_shortcode('user_count', 'wpb_user_count');

/* ------------------------------------------------------------------------- *
 * Enable shortcodes in text widgets
/* ------------------------------------------------------------------------- */
add_filter('widget_text', 'do_shortcode');

/* ------------------------------------------------------------------------- *
 * Add browser detection to body_class();
/* ------------------------------------------------------------------------- */
function mv_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) {
        $classes[] = 'ie';
        if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
        $classes[] = 'ie'.$browser_version[1];
    } else $classes[] = 'unknown';
    if($is_iphone) $classes[] = 'iphone';
    if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
        $classes[] = 'osx';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
        $classes[] = 'linux';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
        $classes[] = 'windows';
    }
    return $classes;
}
add_filter('body_class','mv_browser_body_class');