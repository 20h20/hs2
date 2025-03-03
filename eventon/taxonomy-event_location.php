<?php	
	evo_get_page_header();

	$help = new evo_helper();

	$taxonomy = get_query_var( 'taxonomy' );
	$term = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term, $taxonomy );

	$TAX = new EVO_Tax();

	do_action('eventon_before_main_content');
	
	$temp_data = $TAX->get_term_data( $taxonomy, $term->term_id); 


	// location link
		$location_link_target = $location_term_name = $location_term_link = '';
		if( !empty( $temp_data->location_link ) ){
			$location_link_target = (!empty($temp_data->location_link_target) && $temp_data->location_link_target == 'yes')? '_blank':'';

			$location_term_link = $temp_data->location_link;

			$location_term_name = $location_term_link ? 
				'<a target="'.$location_link_target.'" href="'. $location_term_link .'">' .  $term->name . '</a>':
				 $term->name;
		}
?>
<div class="cbo-page page--eventlocation">
	<section class="cbo-hero">
		<div class="hero-inner container">
			<h1 class="hero-title hs-main-title" data-aos="fade-up">
				<?php echo $location_term_name;?>
			</h1>

			<div class="hero-content" data-aos="fade-up">
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
	</section>

	<?php
		if( !empty( $temp_data->description )):
	?>
		<section class="cbo-text">
			<div class="text-inner cbo-container">
				<div class="hs-cms" data-aos="fade-up">
					<?php echo $temp_data->description;?>
				</div>
			</div>
		</section>
	<?php
		endif;
	?>

	<section class="cbo-calendar">
		<div class="calendar-inner cbo-container">
			<?php do_action('evo_taxlb_upcoming_events', $taxonomy, $temp_data); ?>
		</div>
	</section>
</div>
<?php evo_get_page_footer(); ?>