<article <?php post_class('list-el'); ?> itemscope itemtype="https://schema.org/Article">
	<meta itemprop="url" content="<?php the_permalink(); ?>">
	<meta itemprop="headline" content="<?php echo esc_attr( get_the_title() ); ?>">
	<meta itemprop="dateModified" content="<?php echo get_the_modified_date('c'); ?>">

	<a class="el-inner slide-up" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?> - <?php esc_attr_e('Lire l\'article complet', 'textdomain'); ?>">

		<span class="inner-picture cbo-picture-contain slide-up" aria-hidden="true">
			<img
				decoding="async"
				src="<?php bloginfo('template_directory'); ?>/library/images/picto-presse.png"
				alt=""
				sizes="100vw"
				loading="lazy"
				width="103"
				height="68"
				role="presentation"
			>
		</span>

		<span class="inner-content" itemscope itemtype="https://schema.org/Article">
			<h3 class="content-title cbo-title-4 slide-up" itemprop="headline">
				<?php the_title(); ?>
			</h3>

			<span class="content-date slide-up">
				<span>Date de parution :</span>
				<time itemprop="datePublished" datetime="<?php echo get_the_date('c'); ?>" aria-label="<?php echo 'Date de parution : ' . get_the_date('j F Y'); ?>">
					<?php echo get_the_date('j M Y'); ?>
				</time>
			</span>

			<span class="content-text slide-up" itemprop="description">
				<?php the_excerpt(); ?>
			</span>
		</span>
	</a>
</article>