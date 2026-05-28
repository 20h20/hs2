<?php
	$excerpt = get_the_excerpt();
	$limited_excerpt = wp_trim_words($excerpt, 16, '...');
?>
<article <?php post_class('list-el'); ?> itemscope itemtype="https://schema.org/Course">
	<a class="el-inner slide-up" href="<?php the_permalink(); ?>" itemprop="url" aria-label="Voir la formation <?php the_title(); ?>">
		<span class="el-picture cbo-picture-cover slide-up">
			<?php
				if (has_post_thumbnail(get_the_ID())) {
					the_post_thumbnail('small', array(
						'sizes'    => '(max-width:320px) 145px, (max-width:425px) 220px, 500px',
						'itemprop' => 'image',
						'loading'  => 'lazy',
						'decoding' => 'async',
					));
				} else {
					echo '<img src="' . get_template_directory_uri() . '/library/images/logo-hs2.svg" alt="Image par défaut" class="picture-none" itemprop="image" loading="lazy" decoding="async">';
				}
			?>
		</span>

		<span class="el-content">
			<span class="content-top slide-up">
				<h3 class="content-title cbo-title-4" itemprop="name">
					<?php the_title(); ?>
				</h3>

				<span class="content-text slide-up" itemprop="description">
					<?php echo $limited_excerpt; ?>
				</span>
			</span>

			<span class="content-link cbo-link slide-up">
				<span class="link-inner">
					<span class="link-txt">
						Voir la formation
					</span>
					<i class="icon icon--right-arrow" aria-hidden="true"></i>
				</span>
			</span>
		</span>
	</a>
</article>