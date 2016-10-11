<?php /* Template Name: Culture */ ?>

<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="page-header culture-header">
  <div class="instagram-grid">
    <div class="pure-g">
      <?php
        for ($x = 0; $x < 9; $x++) {
          if ($x == 1 || $x == 7) {
            echo instaItemOutput(null, true);
          }
          echo instaItemOutput(get_field('culture_image_grid_item')[$x]);
        }
        if (count(get_field('culture_image_grid_item')) > 8) {
          echo '<div class="insta-extra-wrap">';
          for ($x = 9; $x < count(get_field('culture_image_grid_item')); $x++) {
            echo instaItemOutput(get_field('culture_image_grid_item')[$x], false, true);
          }
          echo '</div>';
        }
      ?>
    </div>
  </div>
  <div class="page-header-meta">
    <div class="grid-wrapper">
      <div class="pure-g">
        <div class="pure-u-lg-1-8"></div>
        <div class="pure-u-lg-3-4">
          <h1 class="title-boxed"><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content-main work-main">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
