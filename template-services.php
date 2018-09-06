<?php
/*
  Template Name: Services Page
 */
get_header();
?>
<section class="innerpage-banner services-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <?php $banner_text = get_post_meta(get_the_ID(), 'banner_text', true); ?>
                <h1><?php echo $banner_text; ?></h1>
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
<section class="service-about">
    <div class="row">
        <div class="col line"></div>
        <div class="head-1">
            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
            <h2><?php echo $section_1_title; ?></h2>
            <!-- <h2>Committed to extend support</h2> -->
        </div>
        <div class="col"></div>
        <div class="w-100"></div>
        <div class="col-md-6 col-lg-6 col-sm-10 col-xs-12 offset-md-3 offset-lg-3 text-center">
            <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
            <p><?php echo $section_1_description; ?></p>
            <!-- <p>UCAM has a very strong factory trained service professionals located across all corners of India.</p> -->
            <!-- <p>In the event of break down, our engineers will quickly reach and professionally attend the issue. All our Service engineers are trained and certified Rotary Table Service engineers </p> -->
            <!-- <p>One-Call expert service and a dependable, immediate response to keep your machines running. Dedicated to minimizing downtime and prolonging the life of your machine, Factory certified Re-Conditioning unit. We stock an extensive inventory -->
            <!-- of service and maintenance parts for quick access. and quick shipping of spare parts.</p> -->
            <div class="click">
                <p>To find a service Engineer near you</p>
                <a href="#get_in_touch" class="clik-h">CLICK HERE</a>
            </div>
        </div>
    </div>
</section>
<section class="service-contact">
    <div class="container" id="get_in_touch">
        <div class="row">
            <div class="col-md-6 offset-md-3 service-hea">
                <?php $section_2_title = get_post_meta(get_the_ID(), 'section_2_title', true); ?>
                <p><?php echo $section_2_title; ?><p>
                    <!-- <p>FOR AMC OF YOUR MACHINES GET IN TOUCH WITH US</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <?php echo do_shortcode('[contact-form-7 id="571" title="Services form"]'); ?>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 service-wrap">
                <div class="service-wp">
                    <?php $section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true); ?>
                    <h4><?php echo $section_3_title; ?></h4>
                    <?php $section_3_description = get_post_meta(get_the_ID(), 'section_3_description', true); ?>
                    <p><?php echo $section_3_description; ?></p>
                    <!-- <h4>UCAM offers Personal<br> Phone Support<br> 24 hours a day,<br> 365 days a year.</h4> -->
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="service-locattion">
    <div class="row">
        <div class="col "></div>
        <div class="head-1">
            <?php $section_4_title = get_post_meta(get_the_ID(), 'section_4_title', true); ?>
            <h2><?php echo $section_4_title; ?></h2>
            <!-- <h2>find a Service engineer near you</h2> -->
        </div>
        <div class="col line"></div>
        <div class="w-100"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31096.622245658866!2d77.52260830972526!3d13.030718736852059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3d259dd69223%3A0x6444f0c12a71e3b2!2sUCAM+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1528377559328"
                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</section>
<section class="service-address">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive-md">
                <table class="table  service-table table-fixed">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                             <th>Email ID</th>
                            <th>Mobile number</th> 
                            <!-- <th>Location</th> --> 
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php
                        $args = array(
                            'post_type' => 'services',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'ASC',
                            'tax_query' => array(
                            ),
                        );
                        $loop = new WP_Query($args);
                        ?>
                        <?php
                        $count = 0;
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <tr class="ser-bac">
                                    <td class="fst-ser"> 
                                        <p class="ser-lis"><?php the_title() ?></p>
                                        <?php $service_location = get_post_meta(get_the_ID(), 'service_location', true); ?>
                                        <p class="ser-lis2"><?php echo $service_location; ?></p>
                                    </td>
                                    <td><p><?php $designation = get_post_meta(get_the_ID(), 'designation', true); ?>
                                        <p><?php echo $designation; ?></p></p></td>

                                     <td><p><?php $email_services = get_post_meta(get_the_ID(), 'email_services', true); ?>
                                        <p><?php echo $email_services; ?></p></p></td>
                                    <td><p><?php $mobile_number = get_post_meta(get_the_ID(), 'mobile_number', true); ?>
                                        <p><?php echo $mobile_number; ?></p></p></td> 
<!--                                    <td class="bt">
                                        <button type="button" class="btn btn btn-ser"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/loc.png">Show On Map</button>
                                    </td>-->
                                </tr>
                                <?php
                                $count++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        <?php } else { ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
