<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * This template is inspired by Morten Rand-Hendriksen : https://mor10.com/
 * 
 * @package dro_web_trader
 * 
 */

?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
    <div class="index-box">
	<header class="entry-header">
		<h1 class="entry-title">
                    <?php 
                    if ( is_404() ) { _e( 'Page not available', 'dro-web-trader' ); }
                    else if ( is_search() ) { printf( __( 'Nothing found for <em>', 'dro-web-trader') . get_search_query() . '</em>' ); }
                    else { _e( 'Nothing Found', 'dro-web-trader' );}
                    ?>
                </h1>
	</header>

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dro-web-trader' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
                        
                <?php elseif ( is_404() ) : ?>
                        
                        <p><?php _e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'dro-web-trader' ); ?></p>
                        <?php get_search_form(); ?>
                        
		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'dro-web-trader' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'dro-web-trader' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
    </div><!-- .index-box -->
    
    <?php
    if ( is_404() || is_search() ) {
        
        ?>
    <header class="page-header"><h1 class="page-title"><?php esc_html_e('Most recent posts:', 'dro-web-trader')?></h1></header>
    <?php
        // Get the 6 latest posts
        $args = array(
            'posts_per_page' => 6
        );

        $latest_posts_query = new WP_Query( $args );

        // The Loop
        if ( $latest_posts_query->have_posts() ) {
                while ( $latest_posts_query->have_posts() ) {

                    $latest_posts_query->the_post();
                    // Get the standard index page content
                    get_template_part( 'template-parts/content', get_post_format() );

                }
        }
        /* Restore original Post Data */
        wp_reset_postdata();

    }
    ?>
    
</section><!-- .no-results -->
