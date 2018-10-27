<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package dro_web_trader
 */
if (!function_exists('dro_web_trader_body_classes')):

    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     * @return array
     */
    function dro_web_trader_body_classes($classes) {
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if (!is_active_sidebar('sidebar-1')) {
            $classes[] = 'no-sidebar';
        }

        return $classes;
    }

endif;
add_filter('body_class', 'dro_web_trader_body_classes');


if (!function_exists('dro_web_trader_article_classes')):

    /**
     * Add custom classes to the <article>
     * 
     * @param array $classes Classes for the article element
     * @return array 
     */
    function dro_web_trader_article_classes($classes) {
        if (is_single()) {
            $classes[] = 'row';
        }
        if(is_front_page() || is_archive() || is_search()){
            $classes[] = 'post-item';
        }

        return $classes;
    }

endif;
add_filter('post_class', 'dro_web_trader_article_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dro_web_trader_pingback_header() {
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'dro_web_trader_pingback_header');

