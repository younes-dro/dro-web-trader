<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dro_web_trader
 */
if ( ! function_exists( 'dro_web_trader_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function dro_web_trader_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'%s',
			$time_string
		);

		echo '<span class="posted-on">' . __( '<i class="fa fa-calendar" aria-hidden="true"></i>', 'dro-web-trader' ) . $posted_on . '</span>'; // WPCS: XSS OK.
	}

endif;

if ( ! function_exists( 'dro_web_trader_posted_by' ) ) :

	/**
	 * Prints HTML with meta information for the current author.
	 */
	function dro_web_trader_posted_by() {
		$byline = sprintf(
			'%s',
			'<span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}

endif;

if ( ! function_exists( 'dro_web_trader_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function dro_web_trader_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'dro-web-trader' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, space*/
			$tags_list = get_the_tag_list( ' ', esc_html_x( ' ', 'list item separator', 'dro-web-trader' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links"><i class="fa fa-tag"></i>' . '%1$s' . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
									/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'dro-web-trader' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'dro-web-trader' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

endif;

if ( ! function_exists( 'dro_web_trader_post_thumbnail' ) ) :

	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function dro_web_trader_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="single-post-thumbnail col-12 clear" style="">
				<?php // the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
				<?php the_post_thumbnail( 'large-thumb' ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class=" post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'index-thumb',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}

endif;


if ( ! function_exists( 'dro_web_trader_posts_pagination' ) ) :

	/**
	 * Display Posts pagination Index and Archive pages
	 */
	function dro_web_trader_posts_pagination() {

		the_posts_pagination(
			array(
				'prev_text' => '<span class=""><i class="fa fa-arrow-left"></i></span>',
				'next_text' => '<span><i class="fa fa-arrow-right"></i></span>',
			)
		);
	}

endif;

if ( ! function_exists( 'dro_web_trader_social_menu' ) ) :

	/**
	 * display The Social Menu
	 */
	function dro_web_trader_social_menu() {
		if ( has_nav_menu( 'social' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'social',
					'container'       => 'div',
					'container_id'    => 'menu-social',
					'container_class' => 'menu-social',
					'menu_id'         => 'menu-social-items',
					'menu_class'      => 'menu-items',
					'depth'           => 1,
					'link_before'     => '<span class="screen-reader-text">',
					'link_after'      => '</span>',
					'fallback_cb'     => '',
				)
			);
		}
	}

endif;

/**
 * Search Form
 */
if ( ! function_exists( 'dro_web_trader_search_from' ) ) :

	function dro_web_trader_search_form() {
		?>
		<div class="search-toggle">
			<i class="fa fa-search"></i>
			<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'dro-web-trader' ); ?></a>
		</div>

		<div class="search-box">
			<?php get_search_form(); ?>
		</div>

		<?php
	}











endif;



