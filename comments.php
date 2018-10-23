<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dro_web_trader
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area" >

    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) :
        ?>
        <h2 class="comments-title">
            <?php
            $dro_web_trader_comment_count = get_comments_number();
            if ('1' === $dro_web_trader_comment_count) {
                printf(
                        /* translators: 1: title. */
                        esc_html__('One Comment', 'dro-web-trader')
                );
            } else {
                printf(// WPCS: XSS OK.
                        /* translators: 1: comment count number, 2: title. */
                        esc_html(_nx('One Comment', '%1$s Comments', $dro_web_trader_comment_count, 'comments title', 'dro-web-trader')), number_format_i18n($dro_web_trader_comment_count)
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50, // to hide it juste put 0 as size
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php
        /**
         * Custom comments navigationn function 
         */
        require 'inc/template-comments-navigation.php';
        dro_web_trader_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'dro-web-trader'); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().

    comment_form();
    ?>

</div><!-- #comments -->
