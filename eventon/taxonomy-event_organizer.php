<?php
	if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
		cbo_register_block_usage('text');
		cbo_register_block_usage('calendar');
	}
	evo_get_page_header();

	$taxonomy = get_query_var( 'taxonomy' );
	$term = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term, $taxonomy );
	$TAX = new EVO_Tax();
	do_action('eventon_before_main_content');
	$temp_data = $TAX->get_term_data( $taxonomy, $term->term_id); 
	$location_term_name = !empty($term->name) ? esc_html($term->name) : '';
?>

<div class="page--eventlocation">
	<section class="cbo-herosimple">
		<div class="herosimple-inner cbo-container container--padding container--nomargin">
			<div class="herosimple-content">
				<h1 class="herosimple-title cbo-title-1 slide-up" itemprop="name">
					<?php echo $location_term_name ?: esc_html($term->name); ?>
				</h1>

				<div class="herosimple-text cbo-cms cbo-chapo slide-up">
					<?php if(!empty($temp_data->location_address)):?>
						<?php echo $temp_data->location_address;?>
					<?php endif;?>
					<?php if(!empty($temp_data->loc_phone)):?>
						<?php echo $temp_data->loc_phone;?>
					<?php endif;?>
					<?php if(!empty($temp_data->loc_email)):?>
						<?php echo $temp_data->loc_email;?>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

	<?php if (!empty($temp_data->description)) : ?>
		<section class="cbo-text">
			<div class="text-inner cbo-container container--small">
				<div class="text-content content--center cbo-cms">
					<?php echo wpautop(wptexturize(wp_kses_post($temp_data->description))); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="cbo-calendar calendar--grey">
		<div class="calendar-inner cbo-container container--padding container--nomargin">
			<?php do_action('evo_taxlb_upcoming_events', $taxonomy, $temp_data); ?>
		</div>
	</section>
</div>

<?php
	evo_get_page_footer();
?>