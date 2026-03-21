<?php
	$title	= get_field('herosimple_title');
	$content	= get_field('herosimple_content');
?>

<section class="cbo-herosimple">
	<div class="herosimple-inner cbo-container container--padding container--nomargin">
		<div class="herosimple-content">
			<?php if($title): ?>
				<h1 class="herosimple-title cbo-title-1 slide-up">
					<?php echo esc_html($title); ?>
				</h1>
			<?php endif; ?>

			<?php if($content): ?>
				<div class="herosimple-text cbo-cms cbo-chapo slide-up">
					<?php echo wp_kses_post($content); ?>
				</div>
			<?php endif; ?>

			<?php get_template_part('templates/parts/button/template', null, array()); ?>
		</div>
	</div>
</section>