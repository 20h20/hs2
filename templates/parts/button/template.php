<?php
	$button	= get_field('button');
	$addbutton	= get_field('button_add');
?>
<?php if($button): ?>
	<div class="button-container slide-up">
		<a class="hs-button" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" aria-label="<?php echo esc_html($button['title']); ?>">
			<?php echo esc_html($button['title']); ?>
		</a>
	</div>
<?php endif; ?>