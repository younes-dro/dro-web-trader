<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dro_web_trader
 */
?>

<article  id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
    <div class="article-inner-wrapper">
        <?php
            if(is_sticky()){
                echo '<i class="fa fa-thumb-tack post-sticky"></i>';
            }
        ?>
        <header class="entry-header">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            if ('post' === get_post_type()) :
                ?>
                <div class="entry-meta">
                    <?php
                    dro_web_trader_posted_on();
                    dro_web_trader_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <?php
        if (has_post_thumbnail()) {
            dro_web_trader_post_thumbnail();
        }
        ?>
        <div class="entry-content">
            <?php the_excerpt() ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <div class="continue-reading">
                <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'dro-web-trader') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-right"></i></a>'; ?>
            </div>
        </footer><!-- .entry-footer -->

    </div><!-- .article-inner-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
