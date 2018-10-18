<?php

/**
 * Custom template single post
 *
 * @package dro_web_trader
 */
if (!function_exists('dro_web_trader_cat')):

    /**
     * Display the post category 
     */
    function dro_web_trader_cat() {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list(esc_html__(', ', 'dro-web-trader'));
        if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-links text-muted">' . esc_html__('Posted in %1$s', 'dro-web-trader') . '</span>', $categories_list); // WPCS: XSS OK.
        }
    }

endif;

if (!function_exists('dro_web_trader_post_tags')):

    /**
     * Display the Tags
     */
    function dro_web_trader_post_tags() {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', esc_html_x(' ', 'list item separator', 'dro-web-trader'));
        if ($tags_list) {
            /* translators: 1: list of tags. */
            printf('<span class="tags-links"><i class="fa fa-tag"></i>' . esc_html__('Tagged %1$s', 'dro-web-trader') . '</span>', $tags_list); // WPCS: XSS OK.
        }
    }

endif;


/**
 * Retrieve  related posts of the same category
 */
if (!function_exists('dro_related_posts_cat')):

    function dro_related_posts_cat($content) {

        remove_filter('the_content', __FUNCTION__);

        $id = get_the_ID();
        $terms = get_the_terms($id, 'category');

        $cats = array();
        foreach ($terms as $term) {
            $cats[] = $term->term_id;
        }

        $loop = new WP_Query(array(
            'posts_per_page' => 3,
            'category__in' => $cats,
            'post__not_in' => array($id),
            'orderby' => 'rand'
        ));

        if ($loop->have_posts()) {

            $content .= '<h1>' . esc_html__('You may also like', 'dro-web-trader') . ' :</h1>'
                    . '<ul>';

            while ($loop->have_posts()) {
                $loop->the_post();
                if (get_the_excerpt() != '') {
                    $title = get_the_excerpt();
                } else {
                    $title = get_the_title();
                }
                $content .='<li>'
                        . '<a  title="' . $title . '" href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            $content .= '</ul>';

            wp_reset_query();
        }
        return $content;
    }













    endif;
