<?php

require_once('includes/cases.php');

add_theme_support('post-thumbnails');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function civ_custom_scripts() {
  $cacheVersion = '2.0.0';
  wp_enqueue_style('civ-fonts-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
  wp_enqueue_style('civ-style', get_template_directory_uri() . '/dist/style/style.css', null, $cacheVersion);
  wp_enqueue_script('civ-js', get_template_directory_uri() . '/dist/scripts/all.js', array('jquery'), $cacheVersion);
}
add_action('wp_enqueue_scripts', 'civ_custom_scripts');

function register_custom_menus() {
  register_nav_menus(
    array(
      'main-menu' => __('Main Menu')
    )
  );
}
add_action('init', 'register_custom_menus');

?>
