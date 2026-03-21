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
						get_part('templates/parts/blocevent/template');
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

		<div class="buttons-container slide-up">
			<a class="cbo-button" href="<?php echo home_url(); ?>/nos-evenement-passes/">
				Nos événements passés
			</a>
		</div>
	</div>
</section>