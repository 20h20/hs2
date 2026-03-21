<?php
	if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
		cbo_register_block_usage('training');
	}
	evo_get_page_header();

	global $eventon;
	get_header();
	$tax = get_query_var( 'taxonomy' );
	$term = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term, $tax );
	$lang = isset($_GET['lang']) ? $_GET['lang'] : 'L1';
	$tax_name = EVO()->frontend->get_localized_event_tax_names_by_slug($tax, $lang);
	$term_name = evo_lang_get('evolang_'. $tax .'_'. $term->term_id, $term->name, $lang);
?>

<div class="page--eventype">
	<section class="cbo-herosimple">
		<div class="herosimple-inner cbo-container container--padding container--nomargin">
			<div class="herosimple-content">
				<h1 class="herosimple-title cbo-title-1 slide-up" itemprop="name">
					<?php single_cat_title(); ?>
				</h1>

				<div class="herosimple-text cbo-cms cbo-chapo slide-up">
					<?php echo category_description(); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="cbo-training">
		<div class="training-inner cbo-container container--nomargin container--padding">
			<div class="training-chapo cbo-cms slide-up">
				Retrouvez ici toutes nos formations liées à :<br>
				<strong><?php single_cat_title(); ?></strong>
			</div>

			<div class="training-list">
				<?php
					$args = array(
						'post_type' => array('ajde_events'),
						'posts_per_page' => '999',
						'tax_query' => array(
							array(
								'taxonomy' => 'event_type',
								'field' => 'slug',
								'terms' => $term,
							),
						),
						'orderby' => 'title',
						'order' => 'ASC'
					);
					$query = new WP_Query($args);
					if ($query->have_posts()) :
						while ($query->have_posts()) :
							$query->the_post();
							get_part('templates/parts/bloctraining/template');
						endwhile;
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</section>
</div>

<?php
	get_footer();
?>