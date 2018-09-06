<?php
/*
  Template Name: Careers Page
 */
get_header();
?>
<section class="innerpage-banner careers-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <h1><?php
                    $banner_text = get_post_meta(get_the_ID(), 'banner_text', true);
                    echo $banner_text;
                    ?></h1>
                <div class="clear"></div>
                <div class="line4"></div>
                <?php
                $banner_description = get_post_meta(get_the_ID(), 'banner_description', true);
                echo '<p>' . $banner_description . '</p>';
                ?>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</section>
<section class="sec-breadcrumb">
    <?php woocommerce_breadcrumb(); ?>
</section>
<section class="careers-sec1">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
            <h2><?php echo $section_1_title; ?></h2>
        </div>
        <!-- <div class="col"></div> -->
        <div class="w-100"></div>
        <div class="col-10 col-lg-6 col-md-11 offset-lg-3 offset-1">
            <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
            <?php echo $section_1_description; ?>
        </div>
    </div>
    <div class="container icon-wrap">
        <div class="row">
            <?php $section_1_gallery = get_post_meta(get_the_ID(), 'section_1_gallery', true); ?>
            <?php echo $section_1_gallery; ?>
        </div>
    </div>
</section>
<section class="careers-sec2">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 infra-img testi-img d-flex justify-content-center">
            <h2 class="mx-auto d-block align-self-center testi-head">MY UCAM</h2>
        </div>
        <div class="col-12 col-sm-6 col-md-6 testi-cont">
            <?php $section_2_title = get_post_meta(get_the_ID(), 'section_2_title', true); ?>
            <h5><?php echo $section_2_title; ?></h5>
            <div id="testimonials" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'employees_talk', // Your post type name
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'paged' => $paged,
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) :
                        $count = 0;
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <li data-target="#testimonials" data-slide-to="<?php echo $count; ?>" <?php if ($count == '0') { ?>class="active"<?php } ?>></li>
                            <?php $count++; ?>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php endif; ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'employees_talk', // Your post type name
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'paged' => $paged,
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) :
                        $count = 0;
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="carousel-item <?php if ($count == '0') { ?>active<?php } ?>">
                                <div class="testi-slider">
                                    <?php $employees_talk_description = get_post_meta(get_the_ID(), 'employees_talk_description', true); ?>
                                    <p><?php echo $employees_talk_description; ?></p>
                                    <div class="testi-people-wp">
                                        <?php $employees_talk_author = get_post_meta(get_the_ID(), 'employees_talk_author', true); ?>
                                        <p><?php echo $employees_talk_author; ?></p>
                                        <?php $employees_talk_designation = get_post_meta(get_the_ID(), 'employees_talk_designation', true); ?>
                                        <p><?php echo $employees_talk_designation; ?></p>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <?php $count++; ?>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="careers-sec3">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php $section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true); ?>
            <h2><?php echo $section_3_title; ?></h2>
        </div>
    </div>
    <div class="container">
        <ul class="accordion">
            <?php
            $section_3_description = get_post_meta(get_the_ID(), 'section_3_description', true);

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'career', // Your post type name
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'paged' => $paged,
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    $careersId = (!empty($_REQUEST['careersId'])) ? $_REQUEST['careersId'] : "";
                    ?>
                    <li>
                        <div class="acc-head <?php if (get_the_ID() == $careersId): ?>active<?php endif; ?>">
                            <h3><?php the_title(); ?></h3>
                            <div class="acc-head-sub">
                                <?php $position = get_post_meta(get_the_ID(), 'position', true); ?>
                                <p><?php echo $position; ?></p>
                                <?php $location = get_post_meta(get_the_ID(), 'location', true); ?>
                                <p><?php echo $location; ?></p>
                                <?php //$experience = get_post_meta(get_the_ID(), 'experience', true); ?>
        <!--                                <p><?php //echo $experience;   ?></p>-->
                            </div>
                        </div>
                        <div class="acc-body" <?php if (get_the_ID() == $careersId): ?>style="display: block;"<?php endif; ?>>
                            <?php $job_responsibility = get_post_meta(get_the_ID(), 'job_responsibility', true); ?>
                            <?php echo $job_responsibility; ?>
                            <?php $knoledge = get_post_meta(get_the_ID(), 'knoledge', true); ?>
                            <?php echo $knoledge; ?>
                            <?php $skill = get_post_meta(get_the_ID(), 'skill', true); ?>
                            <?php echo $skill; ?>
                            <?php $attitude = get_post_meta(get_the_ID(), 'attitude', true); ?>
                            <?php echo $attitude; ?>
                        </div>
                        <div class="acc-apply">
                            <button class="btn btn-primary btn-lg text-center" data-rowid="<?php the_title(); ?>"><span><?php echo $section_3_description; ?></span></button>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            <?php else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </ul>
        <div class="careers-pop">		
            <div class="careers-pop-wrapper">
                <div class="careers-pop-wrap">
                    <div class="close1">x</div>
                    <div class="row  position-relative">
                        <div class="lineL"></div>
                        <div class="head-1">
                            <h2>JOIN US</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="btn-wrapper">
                                <div class="btn-wrap">
                                    <p>Apply Via Linkedin</p>
                                    <a href="https://in.linkedin.com/company/ucam-pvt-ltd-" target="_blank"><img src="/assets/themes/ucam/assets/images/ln.jpg" alt="linked In" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 js-form">
                            <div class="or">or</div>
                            <?php echo do_shortcode('[contact-form-7 id="505" title="Careers"]'); ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>				
                <div class="clear"></div>
            </div>	
        </div>
    </div>
</section>
<?php get_footer(); ?>