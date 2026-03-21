<?php
	/*
	Template Name: Old Events
	*/
	if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
	}
	get_header();
?>

<div class="cbo-page page-events page-old-events">
	<section class="cbo-herosimple">
		<div class="herosimple-inner cbo-container container--padding container--nomargin">
			<div class="herosimple-content">
				<h1 class="herosimple-title cbo-title-1 slide-up">
					Événements passés
				</h1>
			</div>
		</div>
	</section>

	<section class="cbo-events">
		<div class="events-inner cbo-container">
			<div class="events-list">
				<?php
					$current_page = get_query_var('paged');
					$current_page = max(1, $current_page);
					$per_page = 9;
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
						get_part('templates/parts/blocevent/template');
					endwhile;
					if ($query->max_num_pages > 1) {
						page_navi('', '', $query);
					}
					endif;
					wp_reset_postdata();
				?>
			</div>

			<div class="buttons-container slide-up">
				<a class="cbo-button button--back" href="<?php echo home_url(); ?>/category/evenement/">
					Nos événements à venir
				</a>
			</div>
		</div>
	</section>
</div>

<?php
	get_footer();
?>