<?php
/*
Template Name: Old Events
*/
get_header();
?>
<div class="cbo-page page-events page-old-events">
	<section class="cbo-hero">
		<div class="hero-inner container">
			<h1 class="hero-title hs-main-title" data-aos="fade-up">
				Événements passés
			</h1>
		</div>
	</section>

	<div class="hs-section">
		<div class="container">
			<div class="listing-events">
				<?php
					$current_page = get_query_var('paged');
					$current_page = max(1, $current_page);
					$per_page = 8;
					$args = array(
						'post_type' => 'post',
						'meta_key' => 'event_start',
						'meta_value' => date('Ymd'),
						'meta_compare' => '<',
						'posts_per_page' => $per_page,
						'orderby' => 'meta_value_num',
						'order' => 'DESC',
						'paged' => $current_page,
					);
					$query = new WP_Query($args);

					if ($query->have_posts()):
						while ($query->have_posts()): $query->the_post();
						get_template_part('templates/content/content', 'event');
					endwhile;
					if ($query->max_num_pages > 1) {
						page_navi('', '', $query);
					}
					endif;
					wp_reset_postdata();
				?>
			</div>

			<a class="hs-button button-center" href="<?php echo home_url(); ?>/category/evenement/">
				<i class="icon icon--left-arrow"></i> Nos événements à venir
			</a>
		</div>
	</div>
</div>
<?php
	get_footer();
?>