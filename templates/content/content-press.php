<article <?php post_class('list-el'); ?> data-aos="fade-up">
	<a class="el-inner" href="<?php the_permalink(); ?>">
		<span class="inner-picture cbo-picture-contain">
			<img
				decoding="async"
				src="<?php bloginfo('template_directory'); ?>/library/images/picto-presse.png"
				alt="Événements HS2" sizes="100vw"
				loading="lazy"
				width="103" height="68"
			>
		</span>
		<span class="inner-content">
			<h3 class="content-title">
				<?php the_title(); ?>
			</h3>
			<span class="content-date">
				Date de parution : <?php echo the_time('j M Y'); ?>
			</span>
			<span class="content-text">
				<?php the_excerpt(); ?>
			</span>
		</span>
	</a>
</article>