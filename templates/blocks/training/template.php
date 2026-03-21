<?php
	$bgcolor = get_field('training_bgcolor');
	$title	= get_field('training_title');
	$chapo	= get_field('training_chapo');
?>

<section class="cbo-training <?php echo ($bgcolor === 'white') ? 'training--white' : ''; ?>">
	<div class="training-inner cbo-container <?php echo ($bgcolor === 'grey') ? 'container--padding container--nomargin' : ''; ?>">

		<?php if($title): ?>
			<div class="training-title cbo-title-2 slide-up">
				<?php echo wp_kses_post($title); ?>
			</div>
		<?php endif; ?>

		<?php if($chapo): ?>
			<div class="training-chapo cbo-cms slide-up">
				<?php echo wp_kses_post($chapo); ?>
			</div>
		<?php endif; ?>

		<div class="training-list">
			<?php
				global $post;
				$original_post = $post;
				$posts = get_field('training_list');
				if($posts):
					foreach( $posts as $post):
						setup_postdata($post);
						get_part('templates/parts/bloctraining/template');
					endforeach;
					wp_reset_postdata();
				endif;
				$post = $original_post;
				setup_postdata($post);
			?>
		</div>

		<?php get_template_part('templates/parts/button/template', null, array()); ?>
	</div>
</section>