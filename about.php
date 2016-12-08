<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="page-header about-header<?php if (has_post_thumbnail()) { echo ' rollover-wrap'; } ?>" <?php if (has_post_thumbnail()) { echo ' style="background-image: url(\''; the_post_thumbnail_url(); echo '\');"'; } ?>">
  <?php if (get_field('secondary_header_image')) { ?><div class="page-header-secondary-wrapper rollover-secondary" style="background-image: url('<?php echo get_field('secondary_header_image')['url']; ?>');"></div><?php } ?>
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

<section class="content-main about-main">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<section class="content-sub about-leadership">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">Leadership Team</h2>
        </div>
      </div>
      <?php if (have_rows('leadership_team_member')) { ?>
      <div class="pure-u-lg-1-1">
        <div class="pure-g"><?php
            $teamCount = count(get_field('leadership_team_member'));
            $teamRows = $teamCount / 3;
            $teamRowsFull = floor($teamRows);
            $i = 1;
            $rowCount = 1;
            while (have_rows('leadership_team_member')) {
              the_row();
              if (($i - 1) % 3 == 0) {
                if ($i != 1) {
                  echo '</div><div class="pure-g">';
                }
                if (($teamCount - $i) < 3) {
                  if (($teamCount - $i) == 1) {
                    echo '<div class="pure-u-sm-1-6"></div>';
                  } else if (($teamCount - $i) == 0) {
                    echo '<div class="pure-u-sm-1-3"></div>';
                  }
                }
              }
              echo '<!-- ' . $i . '-->';
              echo '<!-- Left: ' . ($teamCount - $i) . '-->';
          ?><div class="leadership-team-member preview-card preview-card-tight-third pure-u-sm-1-3">
            <div class="team-member-main-image<?php if (get_sub_field('rollover_image')) { echo ' rollover-wrap'; } ?>" style="background-image: url('<?php echo get_sub_field('main_image')['url']; ?>');"><?php if (get_sub_field('rollover_image')) {
              echo '<div class="team-member-rollover-image rollover-secondary" style="background-image: url(\'' . get_sub_field('rollover_image')['url'] . '\');">';
                if (get_sub_field('rollover_caption')) {
                  echo '<div class="caption">' . get_sub_field('rollover_caption') . '</div>';
                }
              echo '</div>';
            } ?></div>
            <h2><?php echo get_sub_field('title'); ?></h2>
          </div><?php $i++; } ?>
        </div>
      </div>
      <?php } ?>
      <?php if (get_field('leadership_outro')) { ?>
      <div class="pure-u-lg-1-8"></div>
      <div class="pure-u-lg-3-4">
        <div class="leadership-explanation pure-u-lg-1-1">
          <?php echo get_field('leadership_outro'); ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
