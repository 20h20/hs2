<?php
	$title	= get_sub_field('relation_title');
	$bgcolor	= get_sub_field('relation_bgcolor');
	$addbt	= get_sub_field('relation_addbt');
	$txtbt	= get_sub_field('relation_libellebt');
	$urlbt	= get_sub_field('relation_urlbt');
?>
<section class="cbo-relation <?php if($bgcolor == 'grey'): ?>hs-grey-section<?php endif; ?>">
	<div class="relation-inner cbo-container">
		<?php if($title): ?>
			<div class="relation-title cbo-title-2" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="relation-list metiers-list">
			<?php
				global $post;
				$original_post = $post;
				$posts = get_sub_field('relation_list');
				if($posts):
					foreach( $posts as $post):
						setup_postdata($post);
			?>
				<a class="list-el" href="<?php the_permalink(); ?>" data-aos="fade-up">
					<span class="el-inner">
						<h3 class="el-title">
							<?php the_title(); ?>
						</h3>
					</span>
				</a>
			<?php
				endforeach;
					wp_reset_postdata();
				endif;
				$post = $original_post;
				setup_postdata($post);
			?>
		</div>

		<?php if($addbt == 1): ?>
			<div class="relations-button">
				<a class="hs-button" href="<?php echo $urlbt ?>" itemprop="url">
					<?php echo $txtbt ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>