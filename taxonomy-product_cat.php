<?php
/**
 * @package WordPress
 * @subpackage UCAM
 * @since UCAM 1.0
 */
get_header();
/* Fetching category details  */
$obj = get_queried_object();

/* echo $obj['slug']; */
//print_r(get_query_var('product_cat'));
$cat_thumb_id = get_woocommerce_term_meta($obj->term_id, 'thumbnail_id', true);
$cat_thumb_url = wp_get_attachment_image_src($cat_thumb_id, 'full', false, '');
$term_link = get_term_link($obj, 'product_cat');
?>

<section class="innerpage-banner product-banner" style="background-image: url(<?php echo $cat_thumb_url[0]; ?>)">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                              <h1><?php echo $obj->name; ?></h1>
                                <div class="clear"></div>
                                <div class="line4"></div>
                                <div class="clear"></div>
                              </div>

        </div>
    </div>
</section>
<section class="sec-breadcrumb"><?php woocommerce_breadcrumb(); ?></section>
<section class="product-sec1">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <h2><?php echo $obj->name; ?></h2>
        </div>
        <div class="w-100"></div>
        <div class="col-8 offset-2">
            <p><?php echo $obj->description; ?></p>
        </div>
    </div>
</section>
<section class="product-sec2">
    <div class="container">
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $obj->slug
                    ),
                ),
            );
            $loop = new WP_Query($args);
            //echo '<pre>'; print_r($loop);
            $count = $loop->post_count;
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    /* $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); */
                    //$featured_img_url_offer = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $imgID_product = get_post_thumbnail_id($post->ID);
                    $img_product = wp_get_attachment_image_src($imgID_product, 'full', false, '');
                    $imgAlt_product = get_post_meta($imgID_product, '_wp_attachment_image_alt', true);
                    $features = get_post_meta(get_the_ID(), 'features', true);
                    ?>                    
                    <div class="col-xs-12 col-sm-6 col-md-4 product-list-wrap">
                        <img class="img-fluid mx-auto d-block" src="<?php echo $img_product[0]; ?>" alt="<?php echo $imgAlt_product; ?>" />
                        <div class="prodlist-cont">
                            <div class="line1"></div>
                            <h4 class="mt-0"><?php the_title(); ?></h4>
                            <?php echo wp_trim_words(get_the_content(), 10, '...'); ?>
                            <?php echo $features; ?>
                            <a href="<?php echo get_permalink(); ?>">View Product details</a>
                        </div>
                    </div>
                    <?php
                //$count++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<section  class="product-sec3">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <h2>UCAM Advantages</h2>
        </div>
        <div class="wid-100"></div>
    </div>
    <div class="container">
        <div class="row equal">
            <?php
            $args = array(
                'post_type' => 'advantage',
                'post_status' => 'publish'
            );
            $loop = new WP_Query($args);
            ?>
            <?php
            if ($loop->have_posts()) {
                $count = 1;
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <div class="col-xs-12 col-md-6 col-lg-3 ucam-adv-wrap" >
                        <div class="ucam-adv u-adv<?php echo $count; ?>" >
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php } ?>
        </div>
    </div>
</section>
<section class="product-sec4">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <h2>Other products</h2>
        </div>
        <div class="wid-100"></div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $obj->slug,
                        'operator' => 'NOT IN'
                    )
                ),
            );
            $loop = new WP_Query($args);
            ?>
            <?php
            if ($loop->have_posts()) {
                $count = 1;
                while ($loop->have_posts()) : $loop->the_post();
                    $imgID_product = get_post_thumbnail_id($post->ID);
                    $img_product = wp_get_attachment_image_src($imgID_product, 'full', false, '');
                    $imgAlt_product = get_post_meta($imgID_product, '_wp_attachment_image_alt', true);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md prod-sec4-wrap"> 
                        <img class="img-fluid mx-auto d-block" src="<?php echo $img_product[0]; ?>" alt="<?php echo $imgAlt_product; ?>" />
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo wp_trim_words(get_the_content(), 10, '...'); ?></p>
                    </div>
                    <?php
                    $count++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>