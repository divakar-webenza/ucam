<?php
/**
 * The template for displaying all pages
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * @package WordPress
 * @subpackage UCAM
 * @since UCAM 1.0
 */
get_header();
?>
<div class="container">
    <section id="content" role="main">
        <?php
        while (have_posts()) : the_post();
            the_title();
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile; // End of the loop.
        ?>
    </section>
</div><!-- .container -->
<?php get_footer(); ?>