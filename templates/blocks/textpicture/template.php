<?php
	$uptitle	= get_field('textpicture_uptitle');
	$title	= get_field('textpicture_title');
	$content	= get_field('textpicture_content');
	$picturepos	= get_field('textpicture_picturepos');
	$picture	= get_field('textpicture_picture');
	$cover	= get_field('textpicture_picturecover');
?>

<section class="cbo-textpicture textpicture--<?php echo $picturepos; ?>">
	<div class="textpicture-inner cbo-container">
		
		<?php if($uptitle): ?>
			<div class="textpicture-uptitle cbo-uptitle slide-up">
				<?php echo esc_html($uptitle); ?>
			</div>
		<?php endif; ?>

		<?php if($title): ?>
			<div class="textpicture-title cbo-title-2 slide-up">
				<?php echo wp_kses_post($title); ?>
			</div>
		<?php endif; ?>

		<div class="textpicture-content slide-up">
			<div class="textpicture-picture <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?>">
				<img
					src="<?php echo esc_url($picture['sizes']['medium']); ?>"
					srcset="<?php echo esc_url($picture['sizes']['small']); ?> 320w, 
						<?php echo esc_url($picture['sizes']['medium']); ?> 768w, 
						<?php echo esc_url($picture['sizes']['large']); ?> 1024w"
					alt="<?php echo esc_attr($picture['alt']); ?>"
					sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
					loading="lazy"
					decoding="async"
					width="1000" 
					height="1000"
				>
			</div>

			<div class="content-text cbo-cms">
				<?php echo wp_kses_post($content); ?>
			</div>
		</div>
	</div>
</section>