<?php
	$uptitle	= get_field('text_uptitle');
	$title	= get_field('text_title');
	$content	= get_field('text_content');
?>

<section class="cbo-text">
	<div class="text-inner cbo-container container--small">

		<?php if($uptitle): ?>
			<div class="uptitle-text cbo-uptitle slide-up">
				<?php echo esc_html($uptitle); ?>
			</div>
		<?php endif; ?>

		<?php if($title): ?>
			<div class="title-text cbo-title-2 slide-up">
				<?php echo wp_kses_post($title); ?>
			</div>
		<?php endif; ?>

		<div class="text-content cbo-cms">
			<?php echo wp_kses_post($content); ?>
		</div>
	</div>
</section>