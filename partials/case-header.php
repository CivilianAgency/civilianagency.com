<section class="case-header">
	<?php if (get_field('video_url')) { ?><video src="<?php echo get_field('video_url'); ?>" loop autoplay muted></video><?php } ?>
	<div class="accents">
		<div class="accent right-top yellow"></div>
		<div class="accent right-bottom turquoise"></div>
		<div class="accent left-top red"></div>
		<div class="accent left-bottom yellow"></div>
	</div>
	<div class="case-header-content">
		<div class="pure-g">
			<div class="pure-u-1-1">
				<h2 class="title-boxed">CVLN Case Stories</h2>
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
