<?php
/*
  Template Name: Contact
 */
get_header();
?>
<section class="innerpage-banner contact-banner">
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
<section class="contact-sec1">
    <div class="container">
        <div class="row equal">
            <div class="col col-sm-8">
                <?php echo do_shortcode('[contact-form-7 id="4" title="Contact form"]'); ?>
            </div>
            <div class="col col-sm-4 supply-wrap">
                <div class="supply-wp">
                    <!-- naseer added -->
                    <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
                    <h3><?php echo $section_1_title; ?></h3>
                    <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
                    <p><?php echo $section_1_description; ?></p>
                    <button type="button" class="btn btn-primary btn-lg text-center"><span>Join Us</span></button>
                    <!-- ends here -->
                    <!-- <h3>Do you want to<br/> be our Supplier ?</h3> -->
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                    <!-- <button type="button" class="btn btn-primary btn-lg text-center"><span>Join Us</span></button> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-sec2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31096.622245658866!2d77.52260830972526!3d13.030718736852059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3d259dd69223%3A0x6444f0c12a71e3b2!2sUCAM+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1528377559328" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
<section class="contact-sec3">
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <!-- naseer added -->
            <?php $section_2_title = get_post_meta(get_the_ID(), 'section_2_title', true); ?>
            <h2><?php echo $section_2_title; ?></h2>
            <!-- ends here -->
            <!-- <h2>Office Addresses</h2> -->
        </div>
        <div class="col"></div>
    </div>
    <div class="container">
        <div class=" d-flex justify-content-center fp-tab-wrap">
            <ul class="nav nav-pills align-items-center fp-tab" >
                <li class="nav-item"> <a class="nav-link active" data-toggle="pill" href="#india"> <?php $section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true); ?>
                        <h2><?php echo $section_3_title; ?></h2><!-- INDIA --></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#globel"><?php $section_4_title = get_post_meta(get_the_ID(), 'section_4_title', true); ?>
                        <h2><?php echo $section_4_title; ?></h2><!-- GLOBEL --></a> </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="india">
                <?php
                $args = array(
                    'post_type' => 'office',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'office_categories',
                            'field' => 'slug',
                            'terms' => 'indian',
                            
                        ),
                    ),
                );
                $loop = new WP_Query($args);
                ?>
                <?php
                $count = 0;
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                    $google_map_link = get_post_meta(get_the_ID(), 'google_map_link', true);
                        ?>
                        <div class="cont-address">
                            <div class="row">
                                <div class="col col-sm-8">
                                    <h4><?php the_title() ?></h4>
                                    <address><?php the_content() ?></address>
                                </div>
                                <div class="col col-sm-4">
                                    <div class="show-on-map"><a href="<?php echo $google_map_link; ?>" target="_blank">SHOW ON MAP</a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $count++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php } else { ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php } ?>
            </div>
            <div class="tab-pane fade show" id="globel">
                <?php
                $args = array(
                    'post_type' => 'office',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'office_categories',
                            'field' => 'slug',
                            'terms' => 'global',
                        ),
                    ),
                );
                $loop = new WP_Query($args);
                ?>
                <?php
                $count = 0;
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                    $google_map_link = get_post_meta(get_the_ID(), 'google_map_link', true);
                        ?>
                        <div class="cont-address">
                            <div class="row">
                                <div class="col col-sm-8">
                                    <h4><?php the_title() ?></h4>
                                    <address><?php the_content() ?></address>
                                </div>
                                <div class="col col-sm-4">
                                    <div class="show-on-map"><a href="<?php echo $google_map_link; ?>" target="_blank">SHOW ON MAP</a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $count++;
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
<section class="contact-sec4">
    <div class="row">
        <div class="col"></div>
        <div class="col head-1">
            <?php $section_5_title = get_post_meta(get_the_ID(), 'section_5_title', true); ?>
            <h2><?php echo $section_5_title; ?></h2>

            <!-- <h2>Plants and Factory Locations</h2> -->
        </div>
        <div class="col line"></div>
    </div>
    <div class="container">
        <div class="plants-fac-wrap">
            <?php
            $args = array(
                'post_type' => 'office',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'office_categories',
                        'field' => 'slug',
                        'terms' => 'plants',
                    ),
                ),
            );
            $loop = new WP_Query($args);
            ?>
            <?php
            $count = 0;
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
                $google_map_link = get_post_meta(get_the_ID(), 'google_map_link', true);
                    ?>
                    <div class="cont-address">
                        <div class="row">
                            <div class="col col-sm-8 order-1">
                                <h4><?php the_title() ?></h4>
                                <address><?php the_content() ?></address>
                            </div>
                            <!-- <div class="col col-sm-4 order-2">
                            </div> -->
                            <div class="col col-sm-4 order-12">
                                <div class="show-on-map"><a href="<?php echo $google_map_link; ?>" target="_blank">SHOW ON MAP<span></span></a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php } else { ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php } ?>
        </div>
    </div>
</section>

<div class="contact-pop">
    <div class="contact-pop-wrapper">
        <div class="contact-pop-wrap">
            <div class="close1">x</div>
            <div class="row">
                <div class="col line"></div>
                <div class="col head-1">
                    <h2>JOIN US</h2>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                <p>Drop in the details and we’ll get in touch with you shortly </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6  mx-auto">
                    <?php echo do_shortcode('[contact-form-7 id="570" title="Supplier form"]'); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>
        
