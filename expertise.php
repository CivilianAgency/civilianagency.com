<?php /* Template Name: Expertise */ ?>

<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="page-header expertise-header header-covered header-covered-heavy"<?php if (has_post_thumbnail()) { echo ' style="background-image: url(\''; the_post_thumbnail_url(); echo '\');"'; } ?>">
  <?php if (get_field('secondary_header_image')) { ?><div class="page-header-secondary-wrapper" style="background-image: url('<?php echo get_field('secondary_header_image')['url']; ?>');"></div><?php } ?>
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

<section class="content-main expertise-main">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<section class="content-sub expertise-ideas">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">Bringing Big Ideas to Life</h2>
        </div>
      </div>
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <div class="pure-g">
          <div class="pure-lg-1-2">X
          </div>
          <?php if (get_field('expertise_ideas_text')) { ?><div class="pure-lg-1-2">
            <h2><?php echo get_field('expertise_ideas_text'); ?></h2>
          </div><?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content-sub expertise-capabilities">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">Capabilities</h2>
        </div>
      </div>
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php if (get_field('capabilities_text_intro')) {
          echo get_field('capabilities_text_intro');
        } ?>
        <div class="capabilities-guy"></div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
