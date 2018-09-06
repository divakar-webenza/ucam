<?php
/**
 * @package WordPress
 * @subpackage UCAM
 * @since UCAM 1.0
 */
get_header();
?>
<section id="ethos" class="container-fluid about-wrap8">
    <div class="container">
        <div class="blog-wrap row">
            <div class="col-xs-12 col-sm-3 col-md-3 wrap16">
                <div class="subwrap1">
                    <h2 class="subhead3"><br><span><?php the_author_link(); ?></span></h2>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9">
                <?php if ('' != get_the_author_meta('user_description')): ?>
                <p><?php the_author_meta('user_description'); ?></p>
                <?php endif; ?>
                <?php rewind_posts(); ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</section>
<div class="category-wrap"></div>
<div class="container">
    <div class="bloglist col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-6 col-sm-6 col-xs-12'); ?>>
                    <h2>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                            <?php echo primary_category(); ?>
                        </a>
                    </h2>
                    <div class="blog-thumbnail-image">
                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php else: ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-default.jpg">
                            </a>
                        <?php endif; ?>
                        <div class="overlay"></div>
                    </div>
                    <div class="entry">
                        <p><?php echo wp_trim_words(get_the_title(), 8); ?></p>
                        <a href="<?php the_permalink(); ?>"><?php _e('Read more', 'ucam'); ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.', 'ucam'); ?></p>
        <?php endif; ?>
        <?php the_posts_pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>