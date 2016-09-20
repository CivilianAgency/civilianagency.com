<section class="facts">
  <div class="grid-wrapper">
    <div class="pure-g">
      <div class="pure-u-md-1-6"></div>
      <div class="pure-u-md-2-3">
        <h3 class="title-boxed">CVLN Fun Fact</h3>
        <div class="fact">
          <?php
          //wp_reset_query();
          //echo get_the_ID();
          //echo var_dump(get_fields());
          if (get_field('fact')) {
            $fact = get_field('fact');
          } else {
            $fact_query = new WP_Query(array('post_type' => 'fact', 'posts_per_page' => 1, 'orderby' => 'rand'));
            $fact = $fact_query->get_posts()[0];
          }
          echo $fact->post_content;
          ?>
        </div>
    </div>
  </div>
</section>

<footer>
</footer>

<?php wp_footer(); ?>

</body>
</html>
