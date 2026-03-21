<?php
	$uptitle	= get_field('biography_uptitle');
	$title	= get_field('biography_title');
?>

<div class="cbo-biography">
	<div class="biography-inner cbo-container">

		<?php if($uptitle): ?>
			<div class="biography-uptitle cbo-uptitle slide-up">
				<?php echo esc_html($uptitle); ?>
			</div>
		<?php endif; ?>

		<?php if($title): ?>
			<div class="biography-title cbo-title-2 slide-up">
				<?php echo wp_kses_post($title); ?>
			</div>
		<?php endif; ?>

		<div class="biography-list">
			<?php
				$acf_posts = get_field('biography_list');
				global $post;
				$original_post = $post;
				foreach ($acf_posts as $post):
					setup_postdata($post);
					get_part('templates/parts/blocbiography/template');
				endforeach;
				$post = $original_post;
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>