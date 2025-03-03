<div class="cbo-page page--press">
	<section class="cbo-hero hero--filters">
		<div class="hero-inner cbo-container container--nomargin">
			<h1 class="hero-title hs-main-title" data-aos="fade-up">
				<?php single_cat_title(); ?>
			</h1>

			<div class="hero-content" data-aos="fade-up">
				<?php echo category_description(); ?>
			</div>
		</div>
		<div class="categories-list" data-aos="fade-up">
			<a class="list-el" href="<?php echo home_url(); ?>/category/presse/">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/images/picto-presse.png"
					alt="Revue de presse HS2" sizes="100vw"
					loading="lazy"
					width="103" height="68"
				>
				<span class="el-text">
					<?php _e("Revues de presse", "wpbootstrap"); ?>
				</span>
			</a>
			<a class="list-el" href="<?php echo home_url(); ?>/category/evenement/">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/images/picto-events.png"
					alt="Événements HS2" sizes="100vw"
					loading="lazy"
					width="103" height="68"
				>
				<span class="el-text">
					<?php _e("Les évènements", "wpbootstrap"); ?>
				</span>
			</a>
		</div>
	</section>

	<section class="cbo-container">
		<div class="listing-press">
			<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						get_template_part('templates/content/content','press');
					endwhile;
					if (function_exists('page_navi')) {
						page_navi();
					} else {
				}
				endif;
			?>
		</div>
	</section>
</div>