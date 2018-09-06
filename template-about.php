<?php
/*
  Template Name: About
 */
get_header();
?>
<!-- Page content will go here -->
<section class="innerpage-banner about-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <h1><?php
                    $banner_text = get_post_meta(get_the_ID(), 'banner_text', true);
                    echo $banner_text;
                    ?></h1>
            </div>
            <div class="banner-wrap2 col"></div>
            <div class="banner-wrap1 w-100">
                <?php
                $banner_description = get_post_meta(get_the_ID(), 'banner_description', true);
                echo '<p>' . $banner_description . '</p>';
                ?>
            </div>
        </div>
    </div>
</section>
<section class="sec-breadcrumb">
    <?php woocommerce_breadcrumb(); ?>
</section>
<section class="about-menu-wp sticky">
    <?php
    $menu_selector = get_post_meta(get_the_ID(), 'menu_selector', true);
    echo $menu_selector;
    ?>
    <div class="clear"></div>
</section>
<section class="about-sec1">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
            <h2><?php echo $section_1_title; ?></h2>
        </div>
        <!-- <div class="col"></div> -->
        <div class="w-100"></div>
        <div class="col-10 col-md-6 offset-md-3 offset-1">
            <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
            <p><?php echo $section_1_description; ?></p>
        </div>
    </div>
</section>
<section id="groupcompanies" class="about-sec2">
    <div class="row position-relative">
        <!-- <div class="col"></div> -->
        <div class="head-1">
            <?php $section_2_title = get_post_meta(get_the_ID(), 'section_2_title', true); ?>
            <h2><?php echo $section_2_title; ?></h2>
        </div>
        <div class="lineR"></div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $args_company = array(
                'post_type' => 'company',
                'post_status' => 'publish',
            );
            $loop_company = new WP_Query($args_company);
            ?>
            <?php
            if ($loop_company->have_posts()) {
                while ($loop_company->have_posts()) : $loop_company->the_post();
                    if (get_the_ID() != '108') {
                        ?>
                        <?php
                        $imgID_company = get_post_thumbnail_id(get_the_ID());
                        $img_company = wp_get_attachment_image_src($imgID_company, 'full', false, '');
                        $imgAlt_company = get_post_meta($imgID_company, '_wp_attachment_image_alt', true);
                        $company_title = get_post_meta(get_the_ID(), 'company_title', true);
                        $company_description = get_post_meta(get_the_ID(), 'company_description', true);
                        $link = get_post_meta(get_the_ID(), 'link', true);
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md prod-sec4-wrap">
                            <a href="<?php echo $link; ?>"> 
                                <div class="col d-flex justify-content-center gc-wrap">
                                    <img class="img-fluid mx-auto d-block align-self-center" src="<?php echo $img_company[0]; ?>" alt="<?php echo $imgAlt_company; ?>">
                                </div>
                                <h4><?php echo $company_title; ?></h4>
                                <p><?php echo $company_description; ?></p>
                            </a>
                        </div>
                        <?php
                    }
                endwhile;
                wp_reset_postdata();
                ?>
            <?php } else { ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php } ?>
        </div>
    </div>
</section>
<section id="visionmission" class="about-sec3">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true); ?>
            <h2><?php echo $section_3_title; ?></h2>
        </div>
        <!-- <div class="col"></div> -->
    </div>
    <div class="container">
        <?php $section_3_description = get_post_meta(get_the_ID(), 'section_3_description', true); ?>
        <h2><?php echo $section_3_description; ?></h2>
    </div>
</section>
<section  id="quality_certification" class="about-sec4">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-0">
            <div class="row position-relative">
                <div class="head-1">
                    <?php $section_4_title = get_post_meta(get_the_ID(), 'section_4_title', true); ?>
                    <h2><?php echo $section_4_title; ?></h2>
                </div>
                <div class="lineR"></div>
            </div>
            <div class="qc-cont">
                <?php $section_4_description = get_post_meta(get_the_ID(), 'section_4_description', true); ?>
                <?php echo $section_4_description; ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-0 mrgn1">
            <img class="img-fluid qc-img" src="/assets/themes/ucam/assets/images/qc.png" alt="Quality and certification ">
            <div class="clear"></div>
        </div>
    </div>
</section>
<section id="infrastructure" class="about-sec5">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_5_title = get_post_meta(get_the_ID(), 'section_5_title', true); ?>
            <h2><?php echo $section_5_title; ?></h2>
        </div>
        <!-- <div class="col"></div> -->
        <div class="w-100"></div>
        <div class="col-10 col-md-6 offset-md-3 offset-1 infra_tex">
            <?php $section_5_description = get_post_meta(get_the_ID(), 'section_5_description', true); ?>
            <?php echo $section_5_description; ?>
        </div>
    </div>
    <div class="container">
        <?php $section_5_listing = get_post_meta(get_the_ID(), 'section_5_listing', true); ?>
        <?php echo $section_5_listing; ?>
    </div>
</section>
<section id="milestone" class="about-sec6">
    <div class="row position-relative">
        <!-- <div class="col"></div> -->
        <div class="head-1">
            <?php $section_6_title = get_post_meta(get_the_ID(), 'section_6_title', true); ?>
            <h2><?php echo $section_6_title; ?></h2>
        </div>
        <div class="lineR"></div>
        <div class="w-100"></div>
        <div class="col-10 col-md-6 offset-md-3 offset-1">
            <?php $section_6_listing = get_post_meta(get_the_ID(), 'section_6_listing', true); ?>
            <p><?php echo $section_6_listing; ?></p>
        </div>
    </div>
    <div class="container">
        <div class="cd-horizontal-timeline">
            <div class="timeline">
                <div class="events-wrapper">
                    <div class="events">
                        <ul>
                            <?php
                            $args = array(
                                'post_type' => 'milestone',
                                'post_status' => 'publish',
                                'order' => 'ASC'
                            );
                            $loop = new WP_Query($args);
                            ?>
                            <?php
                            $count_milestone = 0;
                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post();
                                    ?>
                                    <li><a href="#0" data-date="01/01/<?php the_title(); ?>" <?php if ($count_milestone == '0'): ?>class="selected"<?php endif; ?>><?php the_title(); ?></a></li>
                                    <?php
                                    $count_milestone++;
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            <?php } else { ?>
                                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                            <?php } ?>
                        </ul>
                        <span class="filling-line" aria-hidden="true"></span>
                    </div>
                </div>
                <ul class="cd-timeline-navigation">
                    <li><a href="#0" class="prev inactive">Prev</a></li>
                    <li><a href="#0" class="next">Next</a></li>
                </ul>
            </div>
            <div class="events-content">
                <ul>
                    <?php
                    $args = array(
                        'post_type' => 'milestone',
                        'post_status' => 'publish',
                        'order' => 'ASC'
                    );
                    $loop = new WP_Query($args);
                    ?>
                    <?php
                    $count_milestone = 0;
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) : $loop->the_post();
                            $milestone_short_description = get_post_meta(get_the_ID(), 'milestone_short_description', true);
                            ?>
                            <li <?php if ($count_milestone == '0'): ?>class="selected"<?php endif; ?> data-date="01/01/<?php the_title(); ?>">
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo $milestone_short_description; ?></p>
                                <div class="clear"></div>
                            </li>
                            <?php
                            $count_milestone++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php } else { ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="awards" class="about-sec7">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_7_title = get_post_meta(get_the_ID(), 'section_7_title', true); ?>
            <h2><?php echo $section_7_title; ?></h2>
        </div>
        <!--  <div class="col"></div> -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-4 award-wp1">
                <?php $section_7_description = get_post_meta(get_the_ID(), 'section_7_description', true); ?>
                <p><?php echo $section_7_description; ?></p>
            </div>
            <div class="col-10 col-md-8 award-wp2">
                <?php
                $args = array(
                    'post_type' => 'award',
                    'post_status' => 'publish',
                    'meta_key' => 'award_year',
                    'orderby' => 'meta_value',
                    'order' => 'DESC'
                );
                $loop = new WP_Query($args);
                ?>
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        $award_year = get_post_meta(get_the_ID(), 'award_year', true);
                        ?>
                        <div class="awards-wp">
                            <div class="cal-icon"><?php echo $award_year; ?></div>
                            <p><?php the_title(); ?></p>
                            <div class="clear"></div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php } else { ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>