<?php get_header(); ?>

<section class="home-header">
  <video src="#" poster="<?php echo get_template_directory_uri(); ?>/dist/images/home-poster.jpg"></video>
  <img class="cvln-bw" src="<?php echo get_template_directory_uri(); ?>/dist/images/cvln-bw.svg">
</section>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="content-main home-main">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-1-6"></div>
      <div class="pure-u-2-3">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php if (have_rows('section_preview')) { ?>
<section class="home-previews">
  <div class="grid-wrapper">
    <div class="pure-g">
      <?php while (have_rows('section_preview')) { the_row(); ?><div class="home-preview pure-u-1-3">
        <h3 class="title-boxed"><?php the_sub_field('boxed_title'); ?></h3>
        <h2><?php the_sub_field('subtitle'); ?></h2>
        <?php the_sub_field('content'); ?>
        <a class="arrow-link" href="<?php the_sub_field('link_target'); ?>"><?php the_sub_field('link_text'); ?></a>
      </div><?php } ?>
    </div>
  </div>
</section>
<?php } ?>

<section class="content-main home-secondary">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-1-6"></div>
      <div class="pure-u-2-3">
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
      <div class="pure-u-5-12"></div>
    </div>
  </div>
</section>

<section class="home-map">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-1-6"></div>
      <div class="pure-u-2-3">
        <h3 class="title-boxed">Get To Know Us Better</h3>
        <p>Hover over the map to see some of our favorite local spots.</p>
      </div>
      <div class="pure-u-1-6"></div>
      <div class="pure-u-1-1">
        MAP
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
