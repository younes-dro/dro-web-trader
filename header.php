<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dro_web_trader
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'dro-web-trader'); ?></a>

            <header id="masthead" class="site-header">
                <?php
                // check if sticky menu is activated
                $dro_web_trader_sticky_header_status = dro_web_trader_get_option('dro_web_trader_sticky_header_status');
                $sticky_header = ($dro_web_trader_sticky_header_status) ? "sticky-active" : "";
                ?>
                <nav id="site-navigation" class="main-navigation <?php echo $sticky_header ?>">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                    <?php
                    /**
                     * Main Menu 
                     */
                    if (has_nav_menu('menu-1')) {
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                        ));
                    }
                    /**
                     * Optional Social Menu
                     */
                    dro_web_trader_social_menu();

                    /**
                     * Optional Search For
                     */
                    $dro_web_trader_search_form_status = dro_web_trader_get_option('dro_web_trader_search_form_status');

                    ($dro_web_trader_search_form_status) ? dro_web_trader_search_form() : '';
                    ?>
                </nav><!-- #site-navigation -->


                <?php if (get_header_image() && ( 'blank' == get_header_textcolor())) : ?>

                    <div class="header-image">
                        <img src="<?php header_image(); ?>"
                             width="<?php echo absint(get_custom_header()->width); ?>" 
                             height="<?php echo absint(get_custom_header()->height); ?>"
                             alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">

                    </div>
                <?php endif; // End header image check ?>

                <?php
                if (get_header_image() && !('blank' == get_header_textcolor())) {
                    echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">';
                } else {
                    echo '<div class="site-branding">';
                }
                ?>

                <div class="title-box">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                    $dro_web_trader_description = get_bloginfo('description', 'display');
                    if ($dro_web_trader_description || is_customize_preview()) :
                        ?>
                        <p class="site-description"><?php echo $dro_web_trader_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .title-box -->
        </div><!-- .site-branding -->


    </header><!-- #masthead -->

    <div id="content" class="site-content">
