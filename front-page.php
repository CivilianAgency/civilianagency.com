<?php get_header(); ?>

<section class="home-header">
  <video src="https://player.vimeo.com/external/185059705.hd.mp4?s=43e0171da902788beeaa96cb67ced9f2b8d6b511&profile_id=119" poster="<?php echo get_template_directory_uri(); ?>/dist/images/home-poster.jpg" loop autoplay muted></video>
  <img class="cvln-bw" src="<?php echo get_template_directory_uri(); ?>/dist/images/cvln-bw.svg">
</section>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="content-main home-main">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php if (have_rows('section_preview')) { ?>
<section class="home-previews">
  <div class="grid-wrapper">
    <div class="pure-g">
      <?php while (have_rows('section_preview')) { the_row(); ?><a href="<?php the_sub_field('link_target'); ?>" class="home-preview pure-u-lg-1-3">
        <h3 class="title-boxed"><?php the_sub_field('boxed_title'); ?></h3>
        <h2><?php the_sub_field('subtitle'); ?></h2>
        <?php the_sub_field('content'); ?>
        <div class="div-arrow-link arrow-link arrow-link-centered" href="<?php the_sub_field('link_target'); ?>"><?php the_sub_field('link_text'); ?></div>
      </a><?php } ?>
    </div>
  </div>
</section>
<?php } ?>

<section class="content-main home-secondary">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php echo get_field('second_content_block'); ?>
      </div>
    </div>
  </div>
</section>

<section class="home-cases">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-1-1">
        <h3 class="title-boxed">Case Stories</h3>
      </div>
      <?php
      $cases_loop = new WP_Query(array(
        'post_type' => 'case',
        'posts_per_page' => 2,
        'meta_key' => 'case_snack_or_story',
        'meta_value' => 'story'
      ));
      $i = 0;
      while ($cases_loop->have_posts()) { $cases_loop->the_post();
      ?><div class="case-preview pure-u-sm-11-24">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <a class="arrow-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div><?php
      if ($i == 0) { echo '<div class="pure-u-sm-1-12"></div>'; }
      $i++; }
      wp_reset_query();
      ?>
    </div>
  </div>
</section>

<section class="home-map">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <h3 class="title-boxed"><?php echo get_field('map_title', 'option'); ?></h3>
        <?php if (get_field('map_description', 'option')) {
          echo get_field('map_description', 'option');
        } ?>
        <button id="mobile-map-launch" class="btn mobile-map-launch"><?php echo get_field('map_mobile_button_text', 'option'); ?></button>
      </div>
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <div class="google-map-wrap">
          <div id="google-map" class="google-map"></div>
          <div class="map-mobile-overlay">
            <button id="google-map-close" class="map-close">&times;</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php
  if (have_rows('point_of_interest', 'option')) {
    echo '<script>var pointsOI = [';
    while (have_rows('point_of_interest', 'option')) {
      the_row();
      echo '[';
        echo '"' . get_sub_field('title') . '",';
        echo '"' . get_sub_field('description') . '",';
        echo get_sub_field('latitude') . ',';
        echo get_sub_field('longitude');
      echo '],';
    }
    echo '];</script>';
  }
?>

<?php get_footer(); ?>
