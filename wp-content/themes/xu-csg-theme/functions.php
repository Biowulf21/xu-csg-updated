<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('child_theme_configurator_css')) :
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('astra-theme-css'));
    }
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

//add_action('wp_enqueue_scripts', function(){
//  wp_enqueue_script('main', get_stylesheet_directory_uri() . '/sorting.js', '', '', true);
//})

// END ENQUEUE PARENT ACTION


// Change posts per page on Archive query
function wpd_bills_query($query)
{
    if (
        !is_admin()
        && $query->is_main_query()
    ) {
        $query->set('posts_per_page', 9);
    }
}
add_action('pre_get_posts', 'wpd_bills_query');

// Enqueue the Javascript file for sorting posts
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/sorting.js', '', '', true);
});
