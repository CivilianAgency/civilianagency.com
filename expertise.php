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

<?php if (have_rows('expertise_ideas')) { ?>
<section class="content-sub expertise-ideas">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-lg-1-1">
        <div class="title-boxed-wrap title-boxed-wrap-line">
          <h2 class="title-boxed title-boxed-line">Bringing Big Ideas to Life</h2>
        </div>
      </div>
      <div class="pure-u-lg-1-1">
        <div class="ideas-wrap">
          <div class="pure-g">
            <?php while (have_rows('expertise_ideas')) : the_row(); ?><div class="expertise-idea pure-u-md-1-3">
              <img src="<?php echo get_sub_field('image')['url']; ?>">
              <div class="idea-title"><?php the_sub_field('title'); ?></div>
              <div class="idea-content"><?php the_sub_field('content'); ?></div>
            </div><?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

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
        <div class="capabilities-wrap">
          <div class="capabilities-guy"><?php echo file_get_contents(get_template_directory_uri() . '/dist/images/buddy-capabilities.svg'); ?></div>
          <div class="capabilities-box box-analytics" data-box-slug="analytics">
            <div class="capabilities-box-header">Analytics</div>
            <div class="capabilities-box-content">
              <ul>
                <li>KPI Identification</li>
                <li>Campaign ROI</li>
                <li>Dashboard Creation</li>
                <li>Campaign Reporting</li>
                <li>Optimization</li>
                <li>Advanced Data Modeling</li>
                <li>Attribution</li>
              </ul>
            </div>
          </div>
          <div class="capabilities-box box-strategy" data-box-slug="strategy">
            <div class="capabilities-box-header">Strategy</div>
            <div class="capabilities-box-content">
              <ul>
                <li>Strategic Planning</li>
                <li>Brand Architecture</li>
                <li>Brand Positioning</li>
                <li>Customer Journey Mapping</li>
                <li>Market Research</li>
                <li>Segmentation</li>
                <li>Messaging</li>
              </ul>
            </div>
          </div>
          <div class="capabilities-box box-delivery" data-box-slug="delivery">
            <div class="capabilities-box-header">Delivery</div>
            <div class="capabilities-box-content">
              <ul>
                <li>Video Shoots</li>
                <li>Editing/Music/VO</li>
                <li>Art Buying</li>
                <li>Photography</li>
                <li>Print Production</li>
                <li>Front End Development</li>
                <li>Trafficking</li>
              </ul>
            </div>
          </div>
          <div class="capabilities-box box-creativity" data-box-slug="creativity">
            <div class="capabilities-box-header">Creative</div>
            <div class="capabilities-box-content">
              <ul>
                <li>Art/Design/Copy</li>
                <li>TV/Video</li>
                <li>Content Development</li>
                <li>Video Graphics</li>
                <li>Animations</li>
                <li>Full Digital Services</li>
                <li>Print/OOH/Transit</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
