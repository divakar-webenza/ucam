<?php
/*
  Template Name: Technology
 */
get_header();
?>
<section class="innerpage-banner technology-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
<div class="banner-wrap1">
                                    
                <h1><?php
                    $banner_text = get_post_meta(get_the_ID(), 'banner_text', true);
                    echo $banner_text;
                    ?></h1>
                                        <div class="clear"></div>
                                        <div class="line4"></div>
                      
                <?php $banner_description = get_post_meta(get_the_ID(), 'banner_description', true); ?>
                <?php echo '<p>' . $banner_description . '</p>'; ?>   
                                        <div class="clear"></div>
                                    </div>


        </div>
    </div>
</section>
<section class="sec-breadcrumb">
    <?php woocommerce_breadcrumb(); ?>
</section>
<section class="technology-sec1">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
            <h2><?php echo $section_1_title; ?></h2>
        </div>
    </div>
    <div class="w-100"></div>
        <div class="col-10 col-md-6 offset-md-3 offset-1">
            <?php $section_1_introduction = get_post_meta(get_the_ID(), 'section_1_introduction', true); ?>
            <?php echo '<p>' . $section_1_introduction . '</p>'; ?>
        </div>
    <div class="container">
        <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
        <?php echo $section_1_description; ?>
    </div>
</section>
<section class="technology-sec2">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_2_title = get_post_meta(get_the_ID(), 'section_2_title', true); ?>
            <h2><?php echo $section_2_title; ?></h2>
        </div>
    </div>
    <div class="container">
        <?php $section_2_description = get_post_meta(get_the_ID(), 'section_2_description', true); ?>
        <p><?php echo $section_2_description; ?></p>
    </div>
</section>
<section class="technology-sec1">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php $section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true); ?>
            <h2><?php echo $section_3_title; ?></h2>
        </div>
    </div>
    <div class="container">
        <?php $section_3_description = get_post_meta(get_the_ID(), 'section_3_description', true); ?>
        <p><?php echo $section_3_description; ?></p>
    </div>
</section>
<?php get_footer(); ?>