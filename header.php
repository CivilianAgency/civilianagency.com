<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part('includes/head'); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class($bodyClasses); ?>>

<header>
  <div class="grid-wrapper">
    <button class="main-menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <button class="close-main-menu">&times;</button>
    <a class="logo-main logo-full" href="/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/civilian.svg" alt="Civilian"></a>
    <a class="logo-main logo-cvln" href="/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/cvln-logo.svg" alt="CVLN"></a>
    <nav class="nav-main-menu">
      <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
    </div>
  </div>
</header>