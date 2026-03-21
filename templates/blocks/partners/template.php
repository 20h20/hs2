<?php
	$title	= get_field('partners_title');
	$chapo	= get_field('partners_chapo');
?>
<section class="cbo-partners">
	<div class="partners-inner cbo-container">
		<?php if($title): ?>
			<div class="cbo-title-2">
				<?php echo wp_kses_post($title); ?>
			</div>
		<?php endif; ?>

		<?php if($chapo): ?>
			<div class="partners-chapo cbo-cms">
				<?php echo wp_kses_post($chapo); ?>
			</div>
		<?php endif; ?>

		<div class="partners-list">
			<?php
				if( have_rows('partners_list') ):
				while( have_rows('partners_list') ): the_row();
				$logo = get_sub_field('logo');
				$link = get_sub_field('link');
				$name = get_sub_field('name');
			?>
				<div class="list-el">
					<a class="el-inner cbo-picture-contain" href="<?php echo $link; ?>" target="_blank" title="Site <?php echo esc_html($name); ?> - ouverture d'une nouvelle fenêtre" rel="noopener">
						<img
							src="<?php echo esc_url($logo['sizes']['small']); ?>"
							srcset="<?php echo esc_url($logo['sizes']['small']); ?> 320w, 
								<?php echo esc_url($logo['sizes']['small']); ?> 768w, 
								<?php echo esc_url($logo['sizes']['small']); ?> 1024w"
							alt="<?php echo esc_attr($logo['alt']); ?>"
							sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
							width="120" height="100"
							loading="lazy"
							decoding="async"
						>
					</a>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>