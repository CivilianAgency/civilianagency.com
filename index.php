<?php get_header(); ?>

<?php if (is_404()) { ?>
  <section class="content-main index-main">
    <div class="grid-wrapper">
      <div class="pure-g">
        <div class="pure-u-lg-1-8"></div>
        <div class="pure-u-lg-3-4">
          <h1>Page Not Found</h1>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="page-header index-header" <?php if (has_post_thumbnail()) { echo ' style="background-image: url(\''; the_post_thumbnail_url(); echo '\');"'; } ?>">
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

<section class="content-main index-main">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php the_content(); ?>
        <?php if (is_single() && have_rows('blog_sub_section')) {
          while (have_rows('blog_sub_section')) {
            the_row();
            echo '<div class="title-boxed-wrap title-boxed-wrap-line"><h2 class="title-boxed title-boxed-line">' . get_sub_field('title') . '</h2></div>';
            the_sub_field('content');
          }
        } ?>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
