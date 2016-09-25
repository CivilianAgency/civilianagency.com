<?php

function create_cases() {

  register_post_type('case', array(
    'labels' => array(
      'name' => 'Case Studies',
      'singular_name' => 'Case',
      'menu_name' => 'Case Studies',
      'name_admin_bar' => 'Case',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Case',
      'new_item' => 'New Case',
      'edit_item' => 'Edit Case',
      'view_item' => 'View Case',
      'all_items' => 'All Cases',
      'search_items' => 'Search Cases',
      'not_found' => 'No cases found.',
      'not_found_in_trash' => 'No cases found in Trash.',
    ),
    'description' => 'Case studies for Civilian work.',
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-images-alt2',
    'supports' => array('title', 'count', 'editor', 'thumbnail'),
    'rewrite' => array(
      'slug' => 'cases',
      'with_front' => false
    )
  ));

}
add_action('init', 'create_cases');

add_filter('single_template', function($template) {
  global $post;
  if ($post->post_type === 'case') {
    $locate_template = locate_template("single-case-{$post->slug}.php");
    if (!empty($locate_template)) {
      $template = $locate_template;
    }
  }
  return $template;
});


?>
