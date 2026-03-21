<?php
	$title	= get_field('herorich_title');
	$content	= get_field('herorich_content');
?>

<section class="cbo-herorich">
	<div class="herorich-inner cbo-container container--padding container--nomargin">
		<div class="herorich-picture cbo-picture-cover">
			<img
				decoding="async"
				src="<?php bloginfo('template_directory'); ?>/library/images/home-hero.webp"
				alt="HS2, centre de formation en cybersécurité" sizes="100vw"
				width="2000" height="700"
				itemprop="logo"
			>
		</div>

		<div class="herorich-content">
			<?php if($title): ?>
				<h1 class="herorich-title cbo-title-1 slide-up">
					<?php echo esc_html($title); ?>
				</h1>
			<?php endif; ?>

			<?php if($content): ?>
				<div class="herorich-text cbo-cms cbo-chapo slide-up">
					<?php echo wp_kses_post($content); ?>
				</div>
			<?php endif; ?>

			<?php get_template_part('templates/parts/button/template', null, array()); ?>
		</div>
	</div>
</section>