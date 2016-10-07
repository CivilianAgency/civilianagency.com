<?php /* Template Name: Work */ ?>

<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="page-header work-header header-covered"<?php if (has_post_thumbnail()) { echo ' style="background-image: url(\''; the_post_thumbnail_url(); echo '\');"'; } ?>>
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

<section class="content-main work-cases">
  <div class="grid-wrapper">
    <div class="pure-g">
      <?php
      $cases_loop = new WP_Query(array(
        'post_type' => 'case',
        'posts_per_page' => 2,
        'meta_key' => 'case_snack_or_story',
        'meta_value' => 'story'
      ));
      $i = 0;
      while ($cases_loop->have_posts()) { $cases_loop->the_post();
      ?><div class="case-preview preview-card preview-card-tight pure-u-sm-1-2">
        <a href="<?php the_permalink(); ?>" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
          <div class="preview-card-meta">
            <h3 class="title-boxed">CVLN Case Stories</h3>
            <div class="preview-card-title"><?php the_title(); ?> &gt;</div>
          </div>
        </a>
      </div><?php $i++; } wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php if (get_field('work_secondary_content', get_the_ID())) { ?>
<section class="content-main work-secondary">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php if (get_field('work_secondary_title')) { ?><h2><?php echo get_field('work_secondary_title'); ?></h2><?php } ?>
        <?php echo get_field('work_secondary_content'); ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
