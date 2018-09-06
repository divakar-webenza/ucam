<?php
/*
  Template Name: Search Page
 */
?>
<?php get_header(); ?>
<section class="innerpage-banner search-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <h1>Search Results</h1>
            </div>
        </div>
    </div>
</section>
<section class="sec-breadcrumb">
    <?php woocommerce_breadcrumb(); ?>
</section>
<section class="search-sec1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-6 col-xs-12">
                <form method="get" id="searchform"  class="form-inline search-form" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                    <input type="text" class="search3" name="s" value="<?php echo esc_attr(get_search_query()); ?>" id="s" placeholder="<?php esc_attr_e('Search &hellip;', 'shape'); ?>" />
                    <input type="hidden" name="post_type[]" value="product" />
                    <input type="hidden" name="post_type[]" value="news" />
                    <button type="submit" class="search3">Search</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="search-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">
                <?php if (have_posts()) : ?>
                    <div class="form-sec">
                        <form class="form">
                            <input type="search" class="search-4" value="Search Result <?php echo esc_attr(get_search_query()); ?>">
                        </form>
                    </div>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php /* echo get_post_type(); */ ?>
                        <?php if (get_post_type() == 'product'): ?>
                            <div class="searc-his">
                                <div class="media sea-sec">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">
                                            Product - <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                        <p class="pro-dea">
                                            <span class="pro-img">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arow.jpg"></span>Product details</p>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                    <?php
                                    $imgID_product = get_post_thumbnail_id(get_the_ID());
                                    $img_product = wp_get_attachment_image_src($imgID_product, 'full', false, '');
                                    $imgAlt_product = get_post_meta($imgID_product, '_wp_attachment_image_alt', true);
                                    ?>
                                    <img class="d-flex ml-3" src="<?php echo $img_product[0]; ?>" alt="<?php echo $imgAlt_product; ?>" style="width: 229px;">
                                </div>
                            </div>
                        <?php elseif (get_post_type() == 'career'): ?>
                            <div class="searh-his2">
                                <h5>
                                    Career - <a href="/careers?careersId=<?php echo get_the_ID(); ?>"><?php the_title(); ?></a>
                                </h5>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        <?php elseif (get_post_type() == 'news'): ?>
                            <div class="searh-his3">
                                <h5>
                                    News - <?php the_title(); ?>
                                </h5>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        <?php elseif (get_post_type() == 'event'): ?>
                            <div class="searh-his3">
                                <h5>
                                    Events - <?php the_title(); ?>
                                </h5>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
                <?php
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                $translated = __('Page', 'mytextdomain'); // Supply translatable string
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>'
                ));
                ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
