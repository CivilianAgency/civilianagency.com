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

<section class="work-cases">
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
    <div class="pure-g snacks">
      <?php
        $cases_loop = new WP_Query(array(
          'post_type' => 'case',
          'posts_per_page' => -1,
          'meta_key' => 'case_snack_or_story',
          'meta_value' => 'snack',
          'orderby' => 'menu_order',
          'order' => 'ASC'
        ));
      ?>
      <div class="snacks-main">
        <button id="snacks-next" class="snacks-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        <?php $i = 0; while ($cases_loop->have_posts()) { $cases_loop->the_post(); ?>
        <div class="snacks-item<?php if ($i == 0) { echo ' active'; } ?>"<?php if ($i == 0) { echo ' style="display: block;"'; } ?>>
          <div class="snacks-item-image"<?php if (get_field('case_snack_image')) { echo ' style="background-image: url(\'' . get_field('case_snack_image')['url'] . '\');"'; } ?>>
            <h3 class="title-boxed<?php if (get_field('case_image_button_background') == 'true') {  echo ' title-with-bg'; } ?>">CVLN Mini Stories</h3>
          </div>
          <div class="snacks-item-content">
            <h2><?php the_title(); ?><?php if (get_field('case_snack_subtitle')) { echo ' <span class="subtitle">' . get_field('case_snack_subtitle') . '</span>'; } ?></h2>
            <div class="pure-g">
              <div class="ways-we-connected pure-u-md-1-2">
                <h3>Ways We Connected</h3>
                <?php while (have_rows('ways_we_connected')) {
                  the_row();
                  echo '<p>' . get_sub_field('title') . '</p>';
                } ?>
              </div><div class="pure-u-md-1-2">
                <?php echo get_field('snack_content'); ?>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; } wp_reset_query(); ?>
      </div>
      <div class="snacks-nav">
        <div div class="snacks-nav-line">
          <?php $i = 0; while ($cases_loop->have_posts()) { $cases_loop->the_post(); ?><div class="snacks-point<?php if ($i == 0) { echo ' active'; } ?>">
            <div class="snacks-dot"></div>
            <div class="snacks-logo-wrap">
              <?php
                $image = get_field('case_brand_logo');
                echo wp_get_attachment_image($image['ID'], 'full', false, array('data-sizes' => 'auto'));
              ?>
            </div>
          </div><?php $i++; } wp_reset_query(); ?>
        </div>
      </div>
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
