<?php if (!is_singular('case')) { ?><section class="facts">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-md-1-6"></div>
      <div class="pure-u-md-2-3">
        <h3 class="title-boxed">CVLN Fun Fact</h3>
        <div class="fact">
          <?php
          wp_reset_query();
          if (get_field('fact')) {
            $fact = get_field('fact', get_the_ID());
          } else {
            $fact_query = new WP_Query(array('post_type' => 'fact', 'posts_per_page' => 1, 'orderby' => 'rand'));
            $fact = $fact_query->get_posts()[0];
          }
          echo $fact->post_content;
          ?>
        </div>
    </div>
  </div>
</section><?php } ?>

<footer>
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-md-1-6"></div>
      <div class="pure-u-md-2-3">
        <div class="pure-g">
          <div class="pure-u-1-1">
            <ul class="social-list">
              <li><a target="_blank" href="https://www.linkedin.com/company/civilian-chicago"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icons/linkedin.svg"></a></li>
              <li><a target="_blank" href="https://www.facebook.com/civilianchi"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icons/facebook.svg"></a></li>
              <li><a target="_blank" href="http://instagram.com/civilianchicago/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icons/instagram.svg"></a></li>
              <li><a target="_blank" href="https://twitter.com/civilianchi"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icons/twitter.svg"></a></li>
            </ul>
          </div>
          <div class="footer-address pure-u-lg-1-2" itemscope itemtype="http://schema.org/LocalBusiness">
            <p><span itemprop="name"><strong>CIVILIAN</strong><span class="hide"> Agency</span></span></p>
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
              <div itemprop="streetAddress">
                <p>444 North Michigan Avenue</p>
                <p>33rd Floor</p>
              </div>
              <p><span itemprop="addressLocality">Chicago</span>, <span itemprop="addressRegion">IL</span> <span itemprop="postalCode">60611</span></p>
              <p>Phone: <span itemprop="telephone">312.822.1100</span></p>
            </div>
          </div><div class="pure-u-lg-1-2">
            <p><strong>Want to learn more? Drop us a line.</strong></p>
            <p><a href="mailto:lorig@civilianagency.com" target="_blank" class="arrow-link">I want to join your team</a></p>
            <p><a href="mailto:gary@civilianagency.com" target="_blank" class="arrow-link">I want to partner with you</a></p>
            <p><a href="mailto:hello@civilianagency.com" target="_blank" class="arrow-link">I just want to chat</a></p>
          </div>
          <div class="copyright pure-u-lg-1-1">
            <p>&copy; <?php echo date('Y'); ?> CIVILIAN | Proud member of the <a href="http://www.mdc-partners.com/#agencies/civilian">MDC Network</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
