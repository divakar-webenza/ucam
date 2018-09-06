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
        <!--                        <img src="<?php //echo $featured_img_url;                                    ?>" class="d-block w-100">-->
                        <img class="d-block w-100" src="<?php echo $img_banner[0]; ?>" alt="<?php echo $imgAlt_banner; ?>" />
                        <div class="carousel-caption">
                            <div class="carousel-caption">
                                <div class="row banner-wrap">
                                    <div class="banner-wrap1">
                                        <h1><?php echo $banner_test_1; ?></h1>
                                    </div>
                                    <div class="banner-wrap2 col"></div>
                                    <div class="w-100"></div>
                                    <p><?php echo $banner_text_2; ?></p>
                                    <a href="<?php echo $know_more; ?>"><button type="button" class="btn btn-primary bannerbtn btn-lg text-center"><span>Know more</span></button></a>
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
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <h2>Productivity Solutions for Mass Components</h2>
            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
            <h2><?php echo $section_1_title; ?></h2>
        </div>
        <div class="col"></div>
        <div class="w-100"></div>
        <div class="col-8 offset-2">
            <p>Lorem Ipsum is simply dummy text of the printing and Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer toext of the printing and Ipsum has beey texhen an unknown printe of typok a galley of type and scrambled. standard dummy text ever since the 1500s, when an unknownprinter took a galley of <br/>
                type and scrambled.</p>
            <div class="btn-block text-center">
                <button type="button" class="btn btn-primary btn-lg text-center"><span>Know more</span></button>
            </div>
        </div>
    </div>
</section>
<!-- Section for Company - Starts here -->
<section class="home-sec2">
    <div class="row">
        <div class="col"></div>
        <div class="col head-1">
            <h2>Our Group Companies</h2>
        </div>
        <div class="col line"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="com-sm-12 col-md-6 youtube1">
                <div class="embed-responsive embed-responsive-16by9 shadow">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ZoByu3KFNSI" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="com-sm-12 col-md-6 p-0">
                <div class="company-wrap">
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'company',
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
                                <div id="comp-<?php echo $count_company; ?>" class="col d-flex justify-content-center">
        <!--                                    <img class="img-fluid mx-auto d-block align-self-center" src="<?php //echo $featured_img_url_company;                                    ?>" alt="UCAM" /> -->
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
<section class="home-sec3">
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
                        ?>
                        <div class="col-6 col-xs-3 col-sm-3 text-center count-wrap">
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
</section>
<section class="home-sec4">
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <h2>What We Offer</h2>
        </div>
        <div class="col"></div>
        <div class="w-100"></div>
        <div class="col-8 offset-2">
            <p>Lorem Ipsum is simply dummy text of the printing and Ipsum has beenthe industry's standard dummy.</p>
        </div>
    </div>
    <div class="container bg2">
        <div class="row">
<?php
$args = array(
    'post_type' => 'offer',
    'post_status' => 'publish',
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
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md home-sec4-wrap" > 
        <!--                        <img class="img-fluid mx-auto d-block" src="<?php echo $featured_img_url_offer; ?>" alt="4 Axis Solutions" />-->
                        <img class="img-fluid mx-auto d-block" src="<?php echo $img_offer[0]; ?>" alt="<?php echo $imgAlt_offer; ?>" />
                        <h4><?php the_title(); ?></h4>
        <?php the_content(); ?>
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
<section class="home-sec5">
    <div class="row">
        <div class="col"></div>
        <div class="col head-1">
            <h2>Featured Products</h2>
        </div>
        <div class="col line"></div>
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
                        <li class="nav-item"> <a class="nav-link <?php if ($count_product == '0') { ?>active<?php } ?>" data-toggle="pill" href="#featured_<?php echo $count_product; ?>"><?php the_title(); ?></a> </li>
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
                    ?>
                    <div class="tab-pane <?php if ($count_product == '0') { ?>active<?php } ?>" id="featured_<?php echo $count_product; ?>">
                        <div class="home-sec5-media">
                            <div class="row">
                                <div class="col-sm-6 media-body1 order-sm-12">
                                    <h5 class="mt-0">Cantilever Table</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and Ipsum has been the industry's standard dummy. Lorem Ipsum is simply.
                                        Features</p>
                                    <h5 class="features">Features</h5>
                                    <ol>
                                        <li>Dual lead worm gear set</li>
                                        <li> Hydraulic clamping</li>
                                        <li> Tilting Range: ± 100°</li>
                                    </ol>
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
<section class="home-sec6">
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <h2>Areas of Application</h2>
        </div>
        <div class="col"></div>
        <div class="w-100"></div>
        <div class="col-8 offset-2">
            <p>Lorem Ipsum is simply dummy text of the printing and Ipsum has beenthe industry's standard dummy.</p>
        </div>
    </div>
    <div class="row tab-g2">
        <div class="col-sm-12 col-md-6 col-lg-4 tab-list-g2">
            <div class="list-group" id="list-tab" role="tablist">
<?php
$args = array(
    'post_type' => 'application',
    'post_status' => 'publish',
);
$loop = new WP_Query($args);
?>
                <?php
                $count_application = 0;
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        $icon_image_1 = get_post_meta(get_the_ID(), 'icon_image_1', true);
                        $icon_image_2 = get_post_meta(get_the_ID(), 'icon_image_2', true);
                        ?>
                        <a class="list-group-item list-group-item-action <?php if ($count_application == '0') { ?>active<?php } ?>" id="aoa_<?php echo $count_application; ?>" data-toggle="list" href="#list_application_<?php echo $count_application; ?>" role="tab" aria-controls="aerospace">

                            <img class="img-fluid icon-white" src="<?php echo $icon_image_1; ?>" />
                            <img class="img-fluid icon-red" src="<?php echo $icon_image_2; ?>" /> 
        <?php the_title(); ?>
                        </a>
                            <?php
                            $count_application++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                <?php } else { ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8 tab-detail-g2 p-0">
            <div class="tab-content" id="nav-tabContent">
<?php
$count_application = 0;
if ($loop->have_posts()) {
    while ($loop->have_posts()) : $loop->the_post();
        $short_description = get_post_meta(get_the_ID(), 'short_description', true);
        ?>
                        <div class="tab-pane fade show <?php if ($count_application == '0') { ?>active<?php } ?>" id="list_application_<?php echo $count_application; ?>" role="tabpanel" aria-labelledby="aoa_<?php echo $count_application; ?>">
                            <div class="home-sec7-wrap">
                                <h5><?php the_title(); ?></h5>
                                <p><?php echo $short_description; ?></p>
                            </div>
                            <ul class="aoa-list">
        <?php if (have_rows('models')): ?>
                                    <?php
                                    while (have_rows('models')): the_row();
                                        $product_name = get_sub_field('product_name');
                                        $product_image = get_sub_field('product_image');
                                        $product_link = get_sub_field('product_link');
                                        ?>
                                        <li>
                                            <a href="<?php echo $product_link; ?>">
                                                <figure class="figure"> 
                                                    <img src="<?php echo $product_image; ?>" class="figure-img img-fluid rounded m-auto d-block" alt="Cantiliver Table">
                                                    <figcaption class="figure-caption text-center"><?php echo $short_description; ?></figcaption>
                                                </figure>
                                            </a>
                                        </li>
            <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
        <?php
        $count_application++;
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
<section class="home-sec7">
    <div class="row">
        <div class="col"></div>
        <div class="col head-1">
            <h2>Customer Testimonials </h2>
        </div>
        <div class="col line"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 testi-left d-flex justify-content-center"> 
                <img class="img-fluid mx-auto d-block align-self-center" src="/assets/images/2018/05/treehouse.png" alt="Tree House" /> </div>
            <div class="col-sm-8 testi-right"> 
                <img class="quotes" src="/assets/images/2018/05/quotes.png" alt="Testimonials" />
                <p>"UCAM has a range of products in its 4 Axis solutions. Depending on the application we can offer precision standard Rotary Tables, Rotary Production System. stem. UCAM has a range UCAM has a range of products in its 4 Axis solutions. Depending on the application we can offer precision standard Rotary Tables, Rotary Production System."</p>
                <span>johnathan Doe, developer</span>
            </div>
        </div>
    </div>
</section>
<section class="home-sec8">
    <div class="row">
        <div class="col line"></div>
        <div class="col head-1">
            <h2>News and Events</h2>
        </div>
        <div class="col"></div>
        <div class="w-100"></div>
        <div class="col-8 offset-2">
            <p>Lorem Ipsum is simply dummy text of the printing and Ipsum has beenthe industry's standard dummy.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 events-wrapper">
                <div class="row">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'event',
    'post_status' => 'publish',
    'posts_per_page' => 2,
    'order' => 'DESC'
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
                                    <div class="card bg-dark text-white"> 
                                        <img class="card-img" src="<?php echo $img_event[0]; ?>" alt="<?php echo $imgAlt_event; ?>">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title"><?php the_title(); ?></h5>
                                            <p class="card-text"><?php echo date('F j, Y', strtotime($event_date)); ?> <br/>
        <?php echo $city; ?></p>
                                            <p class="card-text"> <?php echo wp_trim_words($event_description, 30, '...'); ?></p>
                                        </div>
                                    </div>
                                </a> 
                            </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
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
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
            <div class="btn-block text-center news-events-know">
                <button type="button" class="btn btn-primary btn-lg text-center"><span>Know more</span></button>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>