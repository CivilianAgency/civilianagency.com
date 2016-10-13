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

<section class="content-main culture-main">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<section class="content-sub culture-believe">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">What We Believe</h2>
        </div>
      </div>
      <div class="pure-u-md-1-12"></div>
      <div class="pure-u-md-5-24">
        <h3>Inspiring people to action is our inspiration</h3>
      </div>
      <div class="pure-u-md-1-12"></div>
      <div class="pure-u-md-6-24">
        <p>Humanistic insights create the strongest connections</p>
        <p>Clients thrive on our energy as much as our ideas</p>
      </div>
      <div class="pure-u-md-1-24"></div>
      <div class="pure-u-md-6-24">
        <p>Working together always makes for the best work</p>
        <p>It’s okay to love your job and let it show every day</p>
      </div>
    </div>
  </div>
</section>

<section class="content-sub culture-jams">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">Office Jams</h2>
        </div>
      </div>
      <div class="pure-u-lg-1-1">
        <p>Artists you'll hear playing in our office.</p>
      </div>
      <div class="pure-u-md-1-6"></div>
      <div class="pure-u-md-1-4">
        <?php echo file_get_contents(get_template_directory_uri() . '/dist/images/record-player.svg'); ?>
      </div><div class="pure-u-md-1-12"></div><div class="pure-u-md-5-12">
        <ul>
          <?php while (have_rows('office_bands')) {
            the_row();
            echo '<li>' . get_sub_field('band') . '</li>';
          } ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="content-sub culture-breakfast">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">Breakfast of Champions</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content-sub culture-local">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">Local Spots We Love</h2>
        </div>
        <p>Team meeting? Birthday bash? Just ‘cuz?<br>These are our favorite happy hour hangouts.</p>
      </div>
    </div>
    <div class="pure-u-md-1-12"></div>
    <div class="pure-u-md-5-6">
      <?php echo file_get_contents(get_template_directory_uri() . '/dist/images/chicago_flag.svg'); ?>
      <div class="star-titles">
        <div class="star-title star-title-1">
          <div class="star-percentage">35%</div>
          <div class="star-name">Howells &amp; Hood</div>
        </div>
        <div class="star-title star-title-2">
          <div class="star-percentage">30%</div>
          <div class="star-name">Three Dots and a Dash</div>
        </div>
        <div class="star-title star-title-3">
          <div class="star-percentage">20%</div>
          <div class="star-name">Snicker's</div>
        </div>
        <div class="star-title star-title-4">
          <div class="star-percentage">15%</div>
          <div class="star-name">Brehon Pub</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content-sub culture-cares">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">CVLN Cares</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
