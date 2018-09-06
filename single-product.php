<?php
/**
 * @package WordPress
 * @subpackage UCAM
 * @since UCAM 1.0
 */
get_header();
global $post;
$terms = get_the_terms($post->ID, 'product_cat');
//echo '<pre>';
//print_r($terms);
?>
<section class="innerpage-banner prod-detail-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <h1><?php the_title(); ?></h1>
                <div class="clear"></div>
                <div class="line4"></div>
                <div class="clear"></div>
            </div>
        </div>
        <!--        <div class="clear"></div>-->
        <div class="proddetail-slide-wp">
            <ul class="proddetail-slide">
                <?php
                global $product;
                $attachment_ids = $product->get_gallery_attachment_ids();
                foreach ($attachment_ids as $attachment_id) {
                    ?>
                    <img class="" src="<?php echo wp_get_attachment_url($attachment_id); ?>" alt="CNC" />
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</section>	
<section class="sec-breadcrumb">
    <?php woocommerce_breadcrumb(); ?>
</section>
<!--<section class="product-detail-sec1">
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <h2>Product Features</h2>
        </div>
        <div class="col"></div>
    </div>
    <div class="container">
        <div class="home-sec5-media">
            <div class="row">
                <div class="col-sm-6 media-body1 order-sm-12">
<?php //$features = get_post_meta(get_the_ID(), 'features', true); ?>
<?php //echo $features; ?>
                </div>
<?php
/* $imgID_product = get_post_thumbnail_id(get_the_ID());
  $img_product = wp_get_attachment_image_src($imgID_product, 'full', false, '');
  $imgAlt_product = get_post_meta($imgID_product, '_wp_attachment_image_alt', true); */
?>
                <div class="col-sm-6 media-img order-sm-1">
                    <img class="img-fluid mx-auto d-block" src="<?php //echo $img_product[0];             ?>" alt="<?php //echo $imgAlt_product;             ?>" />
                </div>
            </div>
        </div>
    </div>
</section>-->
<section class="product-detail-sec1">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <h2>Product Features</h2>
        </div>
        <div class="wid-100"></div>
    </div>
    <div class="container">
        <div class=" d-flex justify-content-center fp-tab-wrap">
            <ul class="nav nav-pills align-items-center fp-tab">
                <li class="nav-item"> <a class="nav-link active" data-toggle="pill" href="#productfeatures">Product features</a> </li>
                <?php if ($terms[0]->slug != 'value-added-accessories') { ?>
                    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#aoa">Area of Application</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#video">Video </a> </li>
                <?php } ?>
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="productfeatures">
                <div class="home-sec5-media">
                    <div class="row">
                        <div class="col-sm-6 media-body1 order-sm-12">
                            <h5 class="mt-0"><?php the_title(); ?></h5>
                            <?php the_content(); ?>
                            <?php $features = get_post_meta(get_the_ID(), 'features', true); ?>
                            <?php echo $features; ?>
                        </div>
                        <?php
                        $imgID_product = get_post_thumbnail_id(get_the_ID());
                        $img_product = wp_get_attachment_image_src($imgID_product, 'full', false, '');
                        $imgAlt_product = get_post_meta($imgID_product, '_wp_attachment_image_alt', true);
                        ?>
                        <div class="col-sm-6 media-img order-sm-1"> 
                            <img class="img-fluid mx-auto d-block" src="<?php echo $img_product[0]; ?>" alt="<?php echo $imgAlt_product; ?>"> </div>
                    </div>
                </div>
            </div>
            <!-- code added by Divakar -->
            <?php if ($terms[0]->slug != 'value-added-accessories') { ?>
                <div class="tab-pane" id="aoa">
                    <div class="home-sec5-media">
                        <div class="container media-body1">
                            <!--  <h5 class="mt-0 text-center">Area of Application</h5> -->
                            <?php $area_of_application = get_post_meta(get_the_ID(), 'area_of_application', true); ?>
                            <?php echo $area_of_application; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="video">
                    <div class="home-sec5-media">
                        <div class="row">
                            <div class="container product-detail-sec2">
                                <div class="iframe-cont">
                                    <?php $video = get_post_meta(get_the_ID(), 'video', true); ?>
                                    <?php echo $video; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
</section>
<!--<section class="product-detail-sec2">
<div class="row">
<div class="col"></div>
<div class="col head-1">
    <h2>Video</h2>
</div>
<div class="col line"></div>
</div>
<div class="container">
<div class="iframe-cont">
<?php //$video = get_post_meta(get_the_ID(), 'video', true); ?>
<?php //echo $video; ?>
</div>
</div>
</section>	-->
<section class="product-detail-sec3">
    <div class="row  position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <h2>Models</h2>
        </div>
        <div class="wid-100"></div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (have_rows('models')): ?>
                <?php
                while (have_rows('models')): the_row();
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-3" > 
                        <div class="prod-model-wrap" > 
                            <h5>
                                <?php
                                $model_title = get_sub_field('title');
                                echo $model_title;
                                ?>
                            </h5>
                            <?php $model_image = get_sub_field('model_image'); ?>
                            <img class="img-fluid mx-auto d-block" src="<?php echo $model_image; ?>" alt="CNC ROTARY TABLE" />
                            <div class="clear"></div>
                            <?php $prod_detail = get_sub_field('prod_detail'); ?>
                            <!-- <?php $cadd_drawings = get_sub_field('cadd_drawings'); ?> -->
                            <div class="model-brochure">
                                <a href="#" data-rowid="<?php echo $prod_detail; ?>">Product layout & Specification</a>
                            </div>
                            <div class="model-cadd">
<!--                                <a href="<?php //echo $cadd_drawings; ?>">CADD Drawings</a>-->
                                <a href="#">CADD Drawings</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="product-sec4">
    <div class="row  position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php if ($terms[0]->slug != 'value-added-accessories'): ?>
                <h2>Other Products</h2>
            <?php else: ?>
                <h2>Accessories</h2>
            <?php endif; ?>
        </div>
        <div class="wid-100"></div>
    </div>
    <div class="container">
        <div class="row">
            <?php if ($terms[0]->slug != 'value-added-accessories'): ?>
                <?php echo do_shortcode('[products limit="4" category="value-added-accessories"]'); ?>
            <?php else: ?>
                <?php echo do_shortcode('[products limit="4" category="4-axis-solutions, 5-axis-solutions, pallet-changing-solutions, solutions-for-machine-builders" rand]'); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<div class="careers-pop">		
    <div class="careers-pop-wrapper">
        <div class="careers-pop-wrap">
            <div class="close1">x</div>
            <div class="row  position-relative">
                <div class="lineL"></div>
                <div class="head-1">
                    <h2>Submit Details</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 js-form">
                    <?php echo do_shortcode('[contact-form-7 id="1365" title="Model download form" html_id="model_form"]'); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>				
        <div class="clear"></div>
    </div>	
</div>
<?php get_footer(); ?>