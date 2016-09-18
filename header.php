<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part('includes/head'); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class($bodyClasses); ?>>

<header>
  <div class="grid-wrapper">
    <button class="main-menu-toggle"></button>
    <a class="logo-main" href="/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/civilian.svg" alt="Civilian"></a>
    <nav class="nav-main-menu">
      <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
    </div>
  </div>
</header>
