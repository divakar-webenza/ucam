<?php
/*
  Template Name: News and Events
 */
get_header();
?>
<section class="innerpage-banner events-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <?php
                $banner_text = get_post_meta(get_the_ID(), 'banner_text', true);
                echo '<h1>' . $banner_text . '</h1>';
                ?>
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
    <nav aria-label="breadcrumb">
        <?php woocommerce_breadcrumb(); ?>
    </nav>
</section>
<section class="events-sec1">
    <div class="row position-relative">
        <div class="lineL"></div>
        <div class="head-1">
            <?php $section_1_title1 = get_post_meta(get_the_ID(), 'section_1_title1', true); ?>
            <h2><?php echo $section_1_title1; ?></h2>
        </div>
        <div class="w-100"></div>
        <?php $section_1_title2 = get_post_meta(get_the_ID(), 'section_1_title2', true); ?>
        <?php echo '<h4 class="upcome">' . $section_1_title2 . '</h4>'; ?>
    </div>
    <div class="container">
        <div class="ucam-events-wrapper">
            <div class="row equal">
                <div class="col-xs-12 col-md-6 col-lg-6 ucam-events-list order-sm-12">
                    <ul class="events-list">
                        <?php
                        $args = array(
                            'post_type' => 'event',
                            'post_status' => 'publish',
                            'orderby' => 'ID',
                            'order' => 'ASC'
                        );
                        $loop = new WP_Query($args);
                        ?>
                        <?php
                        if ($loop->have_posts()) {
                            $count = 1;
                            while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <li class="event<?php echo $count; ?>">
                                    <div class="events-list-wp">
                                        <?php
                                        $imgID_event = get_post_thumbnail_id(get_the_ID());
                                        $img_event = wp_get_attachment_image_src($imgID_event, 'full', false, '');
                                        $imgAlt_event = get_post_meta($imgID_event, '_wp_attachment_image_alt', true);
                                        ?>
                                        <img class="img-fluid" src="<?php echo $img_event[0]; ?>" alt="<?php echo $imgAlt_event; ?>"/>
                                        <h5 class="event-name"><?php the_title(); ?></h5> 
                                        <p class="event-loc">Location: - <span><?php echo get_post_meta(get_the_ID(), 'city', true); ?></span></p>      
                                        <p class="event-date">Date: - <span><?php echo date('d M', strtotime(get_post_meta(get_the_ID(), 'event_date', true))); ?> <?php if (get_post_meta(get_the_ID(), 'event_end_date', true) != '') { ?>-<?php
                                                    echo date('d M Y', strtotime(get_post_meta(get_the_ID(), 'event_end_date', true)));
                                                }
                                                ?></span></p>
                                    </div>
                                </li>
                                <?php
                                $count++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        <?php } ?>


                    </ul>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 ucam-events-details order-sm-1">
                    <?php
                    $args = array(
                        'post_type' => 'event',
                        'post_status' => 'publish',
                        'orderby' => 'ID',
                        'order' => 'ASC'
                    );
                    $loop = new WP_Query($args);
                    ?>
                    <?php
                    if ($loop->have_posts()) {
                        $count = 1;
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="event<?php echo $count; ?>-details event-details">
                                <h2><?php the_title(); ?></h2>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-6 event-wp1">
                                        <p><?php echo get_post_meta(get_the_ID(), 'event_description', true); ?></p>
                                    </div> 
                                    <div class="col-xs-12 col-md-6 col-lg-6 event-wp2">
                                        <p>Location: - <span><?php echo get_post_meta(get_the_ID(), 'city', true); ?></span></p>
                                        <p>Venue: -  <span><?php echo get_post_meta(get_the_ID(), 'venue', true); ?></span></p>
                                        <p>Date: - <span><?php echo date('d M', strtotime(get_post_meta(get_the_ID(), 'event_date', true))); ?>-<?php echo date('d M Y', strtotime(get_post_meta(get_the_ID(), 'event_end_date', true))); ?></span></p>
                                        <p>Stall No: - <span><?php if(get_post_meta(get_the_ID(), 'stall_no', true)){echo get_post_meta(get_the_ID(), 'stall_no', true);}else{ echo 'TBD';} ?></span></p>
                                    </div> 
                                </div>
                                <?php
                                $imgID_event = get_post_thumbnail_id(get_the_ID());
                                $img_event = wp_get_attachment_image_src($imgID_event, 'full', false, '');
                                $imgAlt_event = get_post_meta($imgID_event, '_wp_attachment_image_alt', true);
                                ?>
                                <div class="lg-img">
                                    <img class="img-fluid" src="<?php echo $img_event[0]; ?>" alt="<?php echo $imgAlt_event; ?>" />
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
        </div>	
    </div>
</section>
<section class="events-sec2">
    <div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">
            <h2>NEWS</h2>
        </div>
        <div class="wid-100"></div>
    </div>
    <div class="container">
        <div class="row">
            <ul class="news-ucam-wrap">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'post_status' => 'publish'
                );
                $loop = new WP_Query($args);
                ?>
                <?php
                if ($loop->have_posts()) {
                    $count = 1;
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <li>
                            <div class="news-ucam"> 
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo date('F-j-Y,', strtotime(get_post_field('news_date', get_the_ID()))); ?></p>
                                <p><?php echo wp_trim_words(get_post_field('news_description', get_the_ID()), 10, '...'); ?></p>
                            </div>
                            <div class="line2"></div>
                        </li>
                        <?php
                        $count++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>
<?php get_footer(); ?>
