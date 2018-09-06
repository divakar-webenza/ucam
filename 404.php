<?php
/**
 * The template for displaying 404 pages (Not Found)
 * 
 * @package WordPress
 * @subpackage UCAM
 * @since UCAM 1.0
 */
get_header();
?>
<section id="content" class="container" role="main">
    <article id="post-0" class="post not-found">
        <header class="header">
            <h1 class="entry-title"><?php _e('Not Found', 'neeyamo'); ?></h1>
        </header>
        <section class="not-found entry-content">
            <p><?php _e("This is somewhat embarrassing, isn't it?", 'neeyamo'); ?></p>
            <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'neeyamo'); ?></p>
            <?php get_search_form(); ?>
        </section>
    </article>
</section>
<?php get_footer(); ?>