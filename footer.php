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
          <div class="footer-address pure-u-lg-1-2">
            <p><strong>CIVILIAN</strong></p>
            <p>444 North Michigan Avenue</p>
            <p>33rd Floor</p>
            <p>Chicago, IL 60611</p>
            <p>Phone: 312.822.1100</p>
          </div><div class="pure-u-lg-1-2">
            <p><strong>Want to learn more? Drop us a line.</strong></p>
            <p><a href="#" class="arrow-link">I want to join your team</a></p>
            <p><a href="#" class="arrow-link">I want to join your client list</a></p>
            <p><a href="#" class="arrow-link">I just want to chat</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
