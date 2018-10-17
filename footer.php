<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dro_web_trader
 */

?>

<?php
    
$dro_web_tradr_scroll_up_status = dro_web_trader_get_option('dro_web_trader_scroll_top_status');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
            <?php get_sidebar('footer');?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'dro-web-trader' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'dro-web-trader' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'dro-web-trader' ), 'dro-web-trader', '<a href="http://www.dro.123.fr">Younes DRO</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
/**
 * If Scroll To Top is activated
 */
if($dro_web_tradr_scroll_up_status):
    ?>
<a href="#" class="scrollup"><i class="fa fa-arrow-up"></i></a>
<?php
endif;

?>
<?php wp_footer(); ?>

</body>
</html>
