<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dro_web_trader
 */
?>

<article  id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <div class="col-12">
        <header class="row justify-content-center  entry-header" style="border: 1px solid #0000FF">
            <?php
            the_title('<h1 class=" col-12 text-center entry-title">', '</h1>');
            ?>
            <div class="col-12 text-center entry-meta">
                <?php
                dro_web_trader_posted_on();
                dro_web_trader_posted_by();
                ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
    </div>
    <?php dro_web_trader_post_thumbnail(); ?>

    <div class="col-12 entry-content" style="border:1px solid #00FF00">
        <?php
        add_filter('the_content', 'dro_related_posts_cat');
        the_content(sprintf(
                        wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'dro-web-trader'), array(
            'span' => array(
                'class' => array(),
            ),
                                )
                        ), get_the_title()
        ));
        
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'dro-web-trader'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer style="background-color:#ccc" class="col-12 entry-footer">
        <?php dro_web_trader_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

