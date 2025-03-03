<div class="cbo-page page-events">
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

	<div class="section--events">
		<div class="cbo-container">
			<div class="listing-events">
				<?php
					$current_page = get_query_var('paged');
					$current_page = max(1, $current_page);
					$per_page = 8;
					$args = array(
						'post_type' => 'post',
						'meta_key' => 'event_start',
						'meta_value' => date('Ymd'),
						'meta_compare' => '>=',
						'posts_per_page' => $per_page,
						'orderby' => 'meta_value_num',
						'order' => 'ASC',
						'paged' => $current_page,
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();
							get_template_part('templates/content/content', 'event');
						}
						if ($query->max_num_pages > 1) {
							page_navi('', '', $query);
						}
					} else {
						echo '<p>Aucun événement à venir.</p>';
					}
					wp_reset_postdata();
				?>
			</div>

			<a class="hs-button button-center" href="<?php echo home_url(); ?>/nos-evenement-passes/" >
				Nos événements passés <i class="icon icon--right-arrow"></i>
			</a>
		</div>
	</div>
</div>