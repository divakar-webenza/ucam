<?php
/**
 * @package WordPress
 * @subpackage UCAM
 * @since UCAM 1.0
 */
get_header();
?>
<!-- Section for banner - Starts here -->
<section class="home-slider">
    <div id="bannerslider" class="carousel slide" data-ride="carousel">
        <?php
        $args = array(
            'post_type' => 'banner',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'banner_categories',
                    'field' => 'slug',
                    'terms' => 'home-page',
                ),
            ),
        );
        $loop = new WP_Query($args);
        ?>
        <ol class="carousel-indicators">
            <?php
            $count = 0;
            if ($loop->have_posts()) {
                $count = 0;
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <li data-target="#bannerslider" data-slide-to="<?php echo $count; ?>" <?php if ($count == '0') { ?>class="active"<?php } ?>></li>
                    <?php
                    $count++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <!--<div class="shadower"></div>-->
            <?php
            $count = 0;
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <div class="carousel-item <?php if ($count == '0') { ?>active<?php } ?>">
                        <?php
                        /* $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); */
                        $imgID_banner = get_post_thumbnail_id($post->ID);
                        $img_banner = wp_get_attachment_image_src($imgID_banner, 'full', false, '');
                        $imgAlt_banner = get_post_meta($imgID_banner, '_wp_attachment_image_alt', true);
                        $banner_test_1 = get_post_meta(get_the_ID(), 'banner_test_1', true);
                        $banner_text_2 = get_post_meta(get_the_ID(), 'banner_text_2', true);
                        $know_more = get_post_meta(get_the_ID(), 'know_more', true);

                        ?>
        <!--                        <img src="<?php //echo $featured_img_url;                                              ?>" class="d-block w-100">-->
                        <img class="d-block w-100" src="<?php echo $img_banner[0]; ?>" alt="<?php echo $imgAlt_banner; ?>" />
                        <div class="carousel-caption">
                            <div class="carousel-caption">
                                <div class="row banner-wrap">
                                    <div class="banner-wrap1">
                                        <h1><?php echo $banner_test_1; ?></h1>
                                        <div class="clear"></div>
                                        <div class="line4"></div>
                                        <p><?php echo $banner_text_2; ?></p>
                                        <a href="<?php echo $know_more; ?>"><button type="button" class="btn btn-primary bannerbtn btn-lg text-center"><span>Know more</span></button></a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
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
<!-- Section for banner - Ends here -->
<section class="home-sec1">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
            <h2><?php echo $section_1_title; ?></h2>
        </div>
        <!-- <div class="col"></div> -->
        <div class="w-100"></div>
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 offset-md-3 offset-lg-3 offset-sm-2">
            <p> <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
                <?php echo $section_1_description; ?></p>
        </div>
    </div>
</section>

<section class="home-sec5">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php $section_4_title = get_post_meta(get_the_ID(), 'section_4_title', true); ?>
            <h2><?php echo $section_4_title; ?></h2>
        </div>
        <!-- <div class="col line"></div> -->
        <div class="w-100"></div>
    </div>
    <div class="container">
        <div class=" d-flex justify-content-center fp-tab-wrap">
            <ul class="nav nav-pills align-items-center fp-tab" >
                <?php
//$product = get_product( $featured_query->post->ID );
                $args_product = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field' => 'name',
                            'terms' => 'featured',
                        ),
                    ),
                );
                $loop_product = new WP_Query($args_product);
                ?>
                <?php
                $count_product = 0;
                if ($loop_product->have_posts()) {
                    while ($loop_product->have_posts()) : $loop_product->the_post();
                        ?>
                        <li class="nav-item"> 
                            <a class="nav-link <?php if ($count_product == '0') { ?>active<?php } ?>" data-toggle="pill" href="#featured_<?php echo $count_product; ?>"><?php the_title(); ?></a> 
                        </li>
                        <?php
                        $count_product++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php } else { ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content">
            <?php
            $count_product = 0;
            if ($loop_product->have_posts()) {
                while ($loop_product->have_posts()) : $loop_product->the_post();
                    ?>
                    <?php
                    //$featured_img_url_offer = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $imgID_product = get_post_thumbnail_id($post->ID);
                    $img_product = wp_get_attachment_image_src($imgID_product, 'full', false, '');
                    $imgAlt_product = get_post_meta($imgID_product, '_wp_attachment_image_alt', true);
                    $features = get_post_meta(get_the_ID(), 'features', true);
                    ?>
                    <div class="tab-pane <?php if ($count_product == '0') { ?>active<?php } ?>" id="featured_<?php echo $count_product; ?>">
                        <div class="home-sec5-media">
                            <div class="row">
                                <div class="col-sm-6 media-body1 order-sm-12">
                                    <a href="<?php echo get_permalink(); ?>"><h5 class="mt-0"><?php the_title(); ?></h5></a>
                                    <?php echo wp_trim_words(the_content(), 10, '...'); ?>
                                    <?php echo $features; ?>
                                    <div class="btn-block news-events-know">
                                        <button type="button" class="btn btn-primary btn-lg text-center" onclick="window.location.href = '<?php echo get_permalink(); ?>'">
                                            <span>Know more</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-6 media-img order-sm-1">
                                    <img class="img-fluid mx-auto d-block" src="<?php echo $img_product[0]; ?>" alt="<?php echo $imgAlt_product; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count_product++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php } else { ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
    <?php /* echo do_shortcode('[featured_products per_page="8" columns="4" orderby="date" order="desc"]'); */ ?>
</section>

<!-- Section for Company - Starts here -->
<section class="home-sec2">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php $section_2_title = get_post_meta(get_the_ID(), 'section_2_title', true); ?>
            <h2><?php echo $section_2_title; ?></h2>
        </div>
        <!-- <div class="col line"></div> -->
    </div>
    <div class="container">
        <div class="row">

            <!-- <div class="com-sm-12 col-md-12 col-lg-6 youtube1">
                 <div class="embed-responsive embed-responsive-16by9 shadow">
         				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ZoByu3KFNSI" frameborder="0" allowfullscreen></iframe>
                    
                </div> 
            </div> -->
            
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 offset-md-3 offset-lg-3 offset-sm-2 home-cat ht-cstm">
                <div class="company-wrap">
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'company',
                            'orderby' => 'ID',
                            'order' => 'ASC',
                            'post_status' => 'publish',
                        );
                        $loop = new WP_Query($args);
                        ?>
                        <?php
                        $count_company = 1;
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <?php
                                /* $featured_img_url_company = get_the_post_thumbnail_url(get_the_ID(), 'full'); */
                                $imgID_company = get_post_thumbnail_id($post->ID);
                                $img_company = wp_get_attachment_image_src($imgID_company, 'full', false, '');
                                $imgAlt_company = get_post_meta($imgID_company, '_wp_attachment_image_alt', true);
                                ?>
                                <?php if ($count_company == '3') { ?><div class="w-100"></div> <?php } ?>
                                <div id="comp-<?php echo $count_company; ?>" class="col d-flex justify-content-center">
        <!--                                    <img class="img-fluid mx-auto d-block align-self-center" src="<?php //echo $featured_img_url_company;                                              ?>" alt="UCAM" /> -->
                                    <img class="img-fluid mx-auto d-block align-self-center" src="<?php echo $img_company[0]; ?>" alt="<?php echo $imgAlt_company; ?>" />
                                </div>
                                <?php
                                $count_company++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        <?php } else { ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php } ?>
                    </div>
                    <?php
                    $count_company = 1;
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) : $loop->the_post();
                            $company_title = get_post_meta(get_the_ID(), 'company_title', true);
                            $company_description = get_post_meta(get_the_ID(), 'company_description', true);
                            $link = get_post_meta(get_the_ID(), 'link', true);
                            ?>
                            <div class="pop-up-wp detail-comp-<?php echo $count_company; ?>">
                                <h4><?php echo $company_title; ?></h4>
                                <p><?php echo $company_description; ?></p>
                                <a href="<?php echo $link; ?>" target="_blank">Visit Site</a>
                                <div class="clear"></div>
                            </div>
                            <?php
                            $count_company++;
                            wp_reset_postdata();
                        endwhile;
                        ?>
                    <?php } else { ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</section>
<!-- Section for Company - Starts here -->
<!-- <section id="hm3" class="home-sec3">
    <div class="count-wp">
        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'key_state',
                    'post_status' => 'publish',
                    'orderby' => 'ID',
                    'order' => 'ASC',
                    'posts_per_page' => 4
                );
                $loop = new WP_Query($args);
                ?>
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        $value = get_post_meta(get_the_ID(), 'value', true);

                        //echo "The Value is"."<br/>".$value;

                        ?>
                        <div class="col-6 col-xs-3 col-sm-3 text-center">
                            <?php echo $value; ?>
                            
                            <a href="#"><?php the_title(); ?></a>
                        </div> 
                        <?php
                        $count_company++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php } else { ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</section> -->


<section class="home-sec4">

<div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php $section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true); ?>
            <h2><?php echo $section_3_title; ?></h2>
        </div>

        <div class="w-100"></div>
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 offset-md-3 offset-lg-3 offset-sm-2">
            <p> <?php $section_3_description = get_post_meta(get_the_ID(), 'section_3_description', true); ?>
                <?php echo $section_3_description; ?></p>
        </div>
        
        <!-- <div class="col line"></div> -->
        <div class="w-100"></div>
</div>

    <div class="container bg2">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'offer',
                'post_status' => 'publish',
                'orderby' => 'title',
                'order' => 'ASC',
            );
            $loop = new WP_Query($args);
            ?>
            <?php
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <?php
                    //$featured_img_url_offer = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $imgID_offer = get_post_thumbnail_id($post->ID);
                    $img_offer = wp_get_attachment_image_src($imgID_offer, 'full', false, '');
                    $imgAlt_offer = get_post_meta($imgID_offer, '_wp_attachment_image_alt', true);

                    $know_more = get_post_meta(get_the_ID(), 'know_more', true);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg home-sec4-wrap" >
        <!--                        <img class="img-fluid mx-auto d-block" src="<?php echo $featured_img_url_offer; ?>" alt="4 Axis Solutions" />-->
                        <img class="img-fluid mx-auto d-block" src="<?php echo $img_offer[0]; ?>" alt="<?php echo $imgAlt_offer; ?>" />
                        
                        <h4><?php the_title(); ?></h4>
                        
                        <?php the_content(); ?>
                        
                        <div class="btn-block text-center"><button class="btn btn-primary btn-lg text-center" type="button"><a href="<?php echo $know_more; ?>">Know more</a></button></div>

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
</section>




<section class="home-sec6">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_5_title = get_post_meta(get_the_ID(), 'section_5_title', true); ?>
            <h2><?php echo $section_5_title; ?></h2>
        </div>
        <!-- <div class="col"></div> -->
        <div class="w-100"></div>
        <div class="col-8 offset-2">
            <?php $section_5_description = get_post_meta(get_the_ID(), 'section_5_description', true); ?>
            <p><?php echo $section_5_description; ?></p>
        </div>
    </div>
    <div class="row tab-g2">
        <?php $section_5_listing = get_post_meta(get_the_ID(), 'section_5_listing', true); ?>
        <p><?php echo $section_5_listing; ?><p>
    </div>
</section>
<section class="home-sec7">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <?php $section_6_title = get_post_meta(get_the_ID(), 'section_6_title', true); ?>
            <h2><?php echo $section_6_title; ?></h2>
        </div>
        <!-- <div class="col line"></div> -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 testi-left d-flex justify-content-center">
<!--                <img class="img-fluid mx-auto d-block align-self-center" src="/assets/images/2018/05/treehouse.png" alt="Tree House" /> -->
                <img class="img-fluid mx-auto d-block align-self-center" src="/assets/images/2018/06/chassis-brakes.png" /> 
            </div>
            <div class="col-sm-8 testi-right">
                <?php $section_6_description = get_post_meta(get_the_ID(), 'section_6_description', true); ?>
                <p><?php echo $section_6_description; ?></p>
            </div>
        </div>
    </div>
</section>
<section class="home-sec8">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_7_title = get_post_meta(get_the_ID(), 'section_7_title', true); ?>
            <h2><?php echo $section_7_title; ?></h2>
        </div>
        <!-- <div class="col"></div> -->
        <div class="w-100"></div>
        <div class="col-8 offset-2">
            <?php $section_7_description = get_post_meta(get_the_ID(), 'section_7_description', true); ?>
            <p><?php echo $section_7_description; ?></p>
        </div>
    </div>
    <div class="container news-8">
        <div class="row">
            <div class="col-md-12 col-lg-6 events-wrapper">
                <div class="row">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'event',
                        'post_status' => 'publish',
                        'orderby' => 'ID',
                        'posts_per_page' => 2,
                        'order' => 'ASC'
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post();
                            $imgID_event = get_post_thumbnail_id($post->ID);
                            $img_event = wp_get_attachment_image_src($imgID_event, 'full', false, '');
                            $imgAlt_event = get_post_meta($imgID_event, '_wp_attachment_image_alt', true);
                            $event_date = get_post_meta(get_the_ID(), 'event_date', true);
                            $city = get_post_meta(get_the_ID(), 'city', true);
                            $event_description = get_post_meta(get_the_ID(), 'event_description', true);
                            ?>
                            <div class="col-xs-12 col-sm-6">
                                <a href="#">
                                    <div class="ev-wp">
                                        <h5 class="card-title"><?php the_title(); ?></h5>
                                        <p class="card-text"><?php echo date('F j, Y', strtotime($event_date)); ?> <br/>
                                            <?php echo $city; ?></p>
                                        <p class="card-text"> <?php echo wp_trim_words($event_description, 30, '...'); ?></p>
                                        <img class="img-fluid" src="<?php echo $img_event[0]; ?>" alt="<?php echo $imgAlt_event; ?>">
                                    </div>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 news-wrapper">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'news',
                    'post_status' => 'publish',
                    'posts_per_page' => 2,
                    'order' => 'DESC'
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post();
                        $news_date = get_post_meta(get_the_ID(), 'news_date', true);
                        $news_description = get_post_meta(get_the_ID(), 'news_description', true);
                        ?>
                        <div class="news-wrap shadow">
                            <a href="#">
                                <div class="news-date"><?php echo date('F j, Y', strtotime($news_date)); ?></div>
                                <p><?php echo wp_trim_words($news_description, 40, '...'); ?></p>
                            </a>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="btn-block text-center news-events-know">
            <button type="button" class="btn btn-primary btn-lg text-center" onclick="window.location.href = '/news-and-events/'"><span>Know more</span></button>
        </div>
    </div>
</section>
<?php get_footer(); ?>