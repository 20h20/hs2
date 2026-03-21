<?php
	$icon	= get_sub_field('icon');
	$title	= get_sub_field('title');
	$content	= get_sub_field('content');
	$link	= get_sub_field('link');
	$color	= get_sub_field('color');
?>
<a class="list-el" href="<?php echo esc_url($link['url']); ?>" itemprop="url" aria-label="Découvrir la catégorie <?php echo esc_html($title); ?>">
	<span class="el-inner slide-up">
		<?php if($icon): ?>
			<span class="el-picture cbo-picture-contain">
				<img
					src="<?php echo esc_url($icon['sizes']['small']); ?>"
					srcset="<?php echo esc_url($icon['sizes']['small']); ?> 320w, 
						<?php echo esc_url($icon['sizes']['small']); ?> 768w"
					alt=""
					role="presentation"
					sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
					loading="lazy"
					decoding="async"
					width="89"
					height="97"
				>
			</span>
		<?php endif; ?>

		<?php if($title): ?>
			<h3 class="cbo-title-4 el-title slide-up" itemprop="name">
				<?php echo esc_html($title); ?>
			</h3>
		<?php endif; ?>

		<?php if($content): ?>
			<div class="el-content" itemprop="description">
				<?php echo wp_kses_post($content); ?>
			</div>
		<?php endif; ?>

		<span class="el-border" aria-hidden="true" style="background:<?php echo $color; ?>"></span>
	</span>
</a>