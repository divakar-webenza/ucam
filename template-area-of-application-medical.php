<?php
/*
  Template Name: Area of Application - Medical
 */
get_header();
?>
<!-- Page content will go here -->
<section class="innerpage-banner medical-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="banner-wrap2 col"></div>
            <div class="banner-wrap1 w-100">
                <?php
                $banner_text = get_post_meta(get_the_ID(), 'banner_text', true);
                echo '<p>' . $banner_text . '</p>';
                ?>
            </div>
        </div>
    </div>
</section>
<section class="sec-breadcrumb">
    <?php woocommerce_breadcrumb(); ?>
</section>
<section class="aerospace-sec1">
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
            <h2><?php echo $section_1_title; ?></h2>
        </div>
        <div class="col"></div>
        <div class="w-100"></div>
        <div class="col-10 col-md-6 offset-md-3 offset-1">
            <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
            <?php echo '<p>' . $section_1_description . '</p>'; ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php $section_1_gallery = get_post_meta(get_the_ID(), 'section_1_gallery', true); ?>
            <?php echo '<p>' . $section_1_gallery . '</p>'; ?>
        </div>
    </div>
</section>
<section class="aerospace-sec2">
    <div class="row">
        <div class="col"></div>
        <div class="col head-1">
            <?php $section_2_title = get_post_meta(get_the_ID(), 'section_2_title', true); ?>
            <h2><?php echo $section_2_title; ?></h2>
        </div>
        <div class="col line"></div>
    </div>
    <div class="container">
        <div class="row">
            <ul class="prod-ucam-wrap">
                <?php $product_list = get_post_meta(get_the_ID(), 'product_list', true); ?>


                <?php foreach ($product_list as $product): ?>
                    <li>
                        <div class="prod-ucam"> 
                            <?php
                            $imgID_product = get_post_thumbnail_id($product);
                            $img_product = wp_get_attachment_image_src($imgID_product, 'full', false, '');
                            $imgAlt_product = get_post_meta($imgID_product, '_wp_attachment_image_alt', true);
                            ?>
                            <img class="img-fluid mx-auto d-block" src="<?php echo $img_product[0]; ?>" alt="<?php echo $imgAlt_product; ?>">
                            <h4><?php echo get_the_title($product); ?></h4>
                            <?php echo wp_trim_words(get_post_field('post_content', $product), 10, '...'); ?>
                            <div class="prod-ucam-btn">
                                <button type="button" class="btn btn-primary btn-lg text-center">
                                    <a href="<?php echo get_permalink($product); ?>"><span>Know more</span></a>
                                </button>
                            </div>
                        </div>
                        <div class="line2"></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<section class="aerospace-sec3">
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <?php $section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true); ?>
            <h2><?php echo $section_3_title; ?></h2>
        </div>
        <div class="col"></div>
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
<section class="aerospace-sec4">
    <div class="row">
        <div class="col"></div>
        <div class="col head-1">
            <?php $section_4_title = get_post_meta(get_the_ID(), 'section_4_title', true); ?>
            <h2><?php echo $section_4_title; ?></h2>
        </div>
        <div class="col line"></div>
        <div class="w-100"></div>
        <div class="col-10 col-md-6 offset-md-3 offset-1">
            <?php $section_4_description = get_post_meta(get_the_ID(), 'section_4_description', true); ?>
            <p><?php echo $section_4_description; ?></p>
        </div>
    </div>
    <div class="photo-gallery-wp">
        <?php $section_4_gallery = get_post_meta(get_the_ID(), 'section_4_gallery', true); ?>
        <div class="container"> 
            <?php echo $section_4_gallery; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
