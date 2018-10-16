<?php

/**
 * dro web trader Theme Customizer
 *
 * @package dro_web_trader
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dro_web_trader_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'dro_web_trader_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'dro_web_trader_customize_partial_blogdescription',
        ));
    }

    $default = dro_web_trader_default_theme_options();

    //theme option panel
    $wp_customize->add_panel('theme_option_panel', array('title' => esc_html__('Theme Options', 'dro-web-trader'),
        'priority' => 200,
        'capability' => 'edit_theme_options'
    ));

    // header section
    $wp_customize->add_section('dro_web_trader_header_section', array('title' => esc_html__('Header Option', 'dro-web-trader'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel'
            )
    );
/**
 * Sticky Header option
 */
    // sticky header setting.
    $wp_customize->add_setting('dro_web_trader_sticky_header_status', array(
        'default' => $default['dro_web_trader_sticky_header_status'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'dro_web_trader_sanitize_checkbox',
            )
    );
    // sticky header control
    $wp_customize->add_control('dro_web_trader_sticky_header_status', array(
        'label' => esc_html__('Enable Sticky Header', 'dro-web-trader'),
        'section' => 'dro_web_trader_header_section',
        'type' => 'checkbox',
        'priority' => 100
            )
    );
    
/**
 * Search Form option  
 */
    // search form setting.
    $wp_customize->add_setting('dro_web_trader_search_form_status', array(
        'default' => $default['dro_web_trader_sticky_header_status'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'dro_web_trader_sanitize_checkbox',
            )
    );
    // search form control
    $wp_customize->add_control('dro_web_trader_search_form_status', array(
        'label' => esc_html__('Enable Search Form on the header', 'dro-web-trader'),
        'section' => 'dro_web_trader_header_section',
        'type' => 'checkbox',
        'priority' => 100
            )
    );    
    
}

add_action('customize_register', 'dro_web_trader_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dro_web_trader_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dro_web_trader_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dro_web_trader_customize_preview_js() {
    wp_enqueue_script('dro-web-trader-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'dro_web_trader_customize_preview_js');

/**
 * @param bool $checked Whether the checkbox is checked.
 *
 * @return bool Whether the checkbox is checked.
 */
if (!function_exists('dro_web_trader_sanitize_checkbox')):

    function dro_web_trader_sanitize_checkbox($checked) {
        return ( ( isset($checked) && true === $checked ) ? true : false );
    }

endif;

if (!function_exists('dro_web_trader_default_theme_options')):

    function dro_web_trader_default_theme_options() {

        $defaults = array();
        $defaults['dro_web_trader_sticky_header_status'] = false;
        $defaults['dro_web_trader_search_form_status'] = false;

        return $defaults;
    }

endif;

/**
 * Get theme option.
 * @param string $key Option key.
 * @return mixed Option value.
 */
if (!function_exists('dro_web_trader_get_option')) :

    function dro_web_trader_get_option($key) {

        if (empty($key)) {

            return;
        }
        $value = '';
        $default = dro_web_trader_default_theme_options();
        $default_value = null;
        if (is_array($default) && isset($default[$key])) {

            $default_value = $default[$key];
        }
        if (null !== $default_value) {

            $value = get_theme_mod($key, $default_value);
        } else {
            $value = get_theme_mod($key);
        }

        return $value;
    }


endif;
