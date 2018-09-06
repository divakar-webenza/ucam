<?php
/* Creating short code for About page   */
add_shortcode('aboutCompany', 'display_company');
function display_company() {
    $args = array(
        'post_type' => 'company',
        'post_status' => 'publish'
    );
    $loop = new WP_Query($args);
    $string = '';
    ?>
    <?php
    $count_company = 1;
    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <?php
            $imgID_company = get_post_thumbnail_id($post->ID);
            $img_company = wp_get_attachment_image_src($imgID_company, 'full', false, '');
            $imgAlt_company = get_post_meta($imgID_company, '_wp_attachment_image_alt', true);
            $string .= '<div id="comp-' . $count_company . '"  class="col d-flex justify-content-center">';
            $string .= '<img class="img-fluid mx-auto d-block align-self-center" src="' . $img_company[0] . '"  alt="' . $imgAlt_company . '"';
            $string .= '</div>';
            ?>
            <?php
            $count_company++;
        endwhile;
    }
    return $string;
}
/* ------------------------------------------------------------------------- *
 * Recent posts widget with featured image
  /* ------------------------------------------------------------------------- */
if (!function_exists('ucam_recent_posts')) :
    function ucam_recent_posts() {
        $ucam_recent_posts = new WP_Query();
        $ucam_recent_posts->query('showposts=1');
        while ($ucam_recent_posts->have_posts()) : $ucam_recent_posts->the_post();
            ?>
            <h2 class="widget-title"><?php _e('Recent Posts', 'ucam'); ?></h2>
            <ul>
                <li>
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-default.jpg">
                        </a>
                    <?php endif; ?>
                    <h4>
                        <a href="<?php esc_url(the_permalink()); ?>">
                            <?php esc_html(the_title()); ?>
                        </a>
                    </h4>
                </li>
            </ul>
            <?php
        endwhile;
        wp_reset_postdata();
    }
endif;
/* ------------------------------------------------------------------------- *
 * Related posts widget with featured image
  /* ------------------------------------------------------------------------- */
if (!function_exists('ucam_related_posts')) :
    function ucam_related_posts() {
        $original_post = $post;
        global $post;
        $tags = wp_get_post_tags($post->ID);
        if ($tags) {
            $tag_ids = array();
            foreach ($tags as $individual_tag)
                $tag_ids[] = $individual_tag->term_id;
            $args = array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => 5, // Number of related posts that will be shown.
                'caller_get_posts' => 1
            );
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {
                ?>
                <h2 class="widget-title"><?php _e('Related Posts', 'ucam'); ?></h2>
                <?php while ($my_query->have_posts()) : $my_query->the_post();
                    ?>
                    <ul>
                        <li>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-default.jpg">
                                </a>
                            <?php endif; ?>
                            <h4>
                                <a href="<?php esc_url(the_permalink()); ?>">
                                    <?php esc_html(the_title()); ?>
                                </a>
                            </h4>
                        </li>
                    </ul>
                    <?php
                endwhile;
            }
        }
        $post = $original_post;
        wp_reset_query();
    }
endif;
/* ------------------------------------------------------------------------- *
 * Recent News posts
  /* ------------------------------------------------------------------------- */
if (!function_exists('ucam_recent_news')) :
    function ucam_recent_news() {
        ?>
        <h2>Recent News</h2>
        <ul>
            <?php
            $recent_posts = wp_get_recent_posts(array('post_type' => 'news'));
            foreach ($recent_posts as $recent) {
                echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="' . esc_attr($recent["post_title"]) . '" >' . $recent["post_title"] . '</a> </li> ';
            }
            ?>
        </ul>
        <?php
        wp_reset_postdata();
    }
endif;
/* ------------------------------------------------------------------------- *
 * Limit the excerpt length [ the_excerpt(); ]
 * Excerpt length is set to 55 words by default. We can change this default value with 20 words.
 */
/* ------------------------------------------------------------------------- */
if (!function_exists('get_excerpt')) :
    function get_excerpt() {
        $excerpt = get_the_content();
        $excerpt = preg_replace(" ([.*?])", '', $excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, 150);
        $excerpt = $excerpt . '...';
        return $excerpt;
    }
endif;
/* ------------------------------------------------------------------------- *
 * Get Attachement ID
 * This function used for display PDF thumnail Image
  /* ------------------------------------------------------------------------- */
if (!function_exists('ucam_get_image_id')) :
    function ucam_get_image_id($image_url) {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
        return $attachment[0];
    }
endif;
/* ------------------------------------------------------------------------- *
 * Hiding the admin bar for subscribers
  /* ------------------------------------------------------------------------- */
if (!function_exists('remove_admin_bar')) :
    function remove_admin_bar() {
        if (current_user_can('subscriber')) {
            show_admin_bar(false);
        }
    }
endif;
add_action('after_setup_theme', 'remove_admin_bar');
/* ------------------------------------------------------------------------- *
 * SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
  /* ------------------------------------------------------------------------- */
if (!function_exists('primary_category')) :
    function primary_category() {
        $category = get_the_category();
        $useCatLink = true;
// If post has a category assigned.
        if ($category) {
            $category_display = '';
            $category_link = '';
            if (class_exists('WPSEO_Primary_Term')) {
                // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
                $wpseo_primary_term = new WPSEO_Primary_Term('category', get_the_id());
                $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                $term = get_term($wpseo_primary_term);
                if (is_wp_error($term)) {
                    // Default to first category (not Yoast) if an error is returned
                    $category_display = $category[0]->name;
                    $category_link = get_category_link($category[0]->term_id);
                } else {
                    // Yoast Primary category
                    $category_display = $term->name;
                    $category_link = get_category_link($term->term_id);
                }
            } else {
                // Default, display the first category in WP's list of assigned categories
                $category_display = $category[0]->name;
                $category_link = get_category_link($category[0]->term_id);
            }
            // Display category
            if (!empty($category_display)) {
                if ($useCatLink == true && !empty($category_link)) {
                    echo htmlspecialchars($category_display);
                } else {
                    echo htmlspecialchars($category_display);
                }
            }
        }
    }


endif;