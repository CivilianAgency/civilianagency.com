<?php if (get_field('featured_case')) { $case = get_field('featured_case'); ?><section class="case-other-link-wrap">
	<a class="case-other-link turquoise" href="<?php the_permalink($case->ID); ?>">
		<div class="title-boxed-wrap"><h2 class="title-boxed">CVLN Case Stories</h2></div>
		<h2 class="case-other-link-title"><?php echo $case->post_title; ?></h2>
	</a>
</section><?php } ?>
