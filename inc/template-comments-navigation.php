<?php
if ( ! function_exists( 'dro_web_trader_comments_navigation' ) ) :

	/**
	 * Custom comments navigation
	 */
	function dro_web_trader_comments_navigation() {
		?>
		<nav id="comment-nav-below" class="comment-navigation clear" role="navigation">
			<h1 class="screen-reader-text"><?php __( 'Comment navigation', 'dro-web-trader' ); ?></h1>
			<?php
			$prev_link = get_previous_comments_link();
			$next_link = get_next_comments_link();
			if ( $prev_link ) {
				?>
				<div class="nav-previous"><?php previous_comments_link( __( '<i class="fa fa-arrow-circle-o-left"></i>Older Comments', 'dro-web-trader' ) ); ?></div>
				<?php
			}
			if ( $next_link ) {
				?>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <i class="fa fa-arrow-circle-o-right"></i>', 'dro-web-trader' ) ); ?></div>
				<?php
			}
			?>
		</nav>
		<?php
	}





endif;

