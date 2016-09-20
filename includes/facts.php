<?php

function create_facts() {

  register_post_type('fact', array(
    'labels' => array(
      'name' => 'Fact Studies',
      'singular_name' => 'Fact',
      'menu_name' => 'Facts',
      'name_admin_bar' => 'Fact',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Fact',
      'new_item' => 'New Fact',
      'edit_item' => 'Edit Fact',
      'view_item' => 'View Fact',
      'all_items' => 'All Facts',
      'search_items' => 'Search Facts',
      'not_found' => 'No facts found.',
      'not_found_in_trash' => 'No facts found in Trash.',
    ),
    'description' => 'Facts about Civilian.',
    'public' => true,
    'has_archive' => false,
    'publicly_queryable' => false,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-smiley',
    'supports' => array('title', 'count', 'editor'),
    'rewrite' => array(
      'slug' => 'facts',
      'with_front' => false
    )
  ));

}
add_action('init', 'create_facts');

?>
