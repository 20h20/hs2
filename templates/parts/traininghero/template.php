<?php
	get_header();
	$current_event_id = get_the_ID();
	$repeats = get_post_meta($current_event_id, 'repeat_intervals', true);
	$repeats = maybe_unserialize($repeats);
	$resume		= get_field('formation_resume');
	$form_day		= get_field('nombre_de_jours');
	$form_hours		= get_field('nombre_dheures');
?>

<section class="cbo-traininghero">
	<div class="traininghero-inner cbo-container container--nomargin container--padding">
		<div class="traininghero-content">
			<div class="cbo-breadcrumb slide-up">
				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
			</div>

			<h1 class="content-title cbo-title-2 slide-up">
				<?php the_title(); ?>
			</h1>

			<?php
				if (!empty($repeats) && is_array($repeats)) {
					$has_valid_dates = false;
					echo '<div class="content-nextdates slide-up">';
					echo '<h3 class="nextdates-title cbo-title-4">Prochaines Dates de la Formation</h3>';
					echo '<ul class="nextdates-list">';
					$current_timestamp = current_time('timestamp');
					foreach ($repeats as $repeat) {
						if (isset($repeat[0]) && isset($repeat[1])) {
							$start_date = $repeat[0];
							if ($start_date >= $current_timestamp) {
								$start_date_formatted = date('d/m/Y', $start_date);
								$end_date = date('d/m/Y', $repeat[1]);
								echo '<li>Du ' . $start_date_formatted . ' au ' . $end_date . '</li>';
								$has_valid_dates = true;
							}
						}
					}
					if (!$has_valid_dates) {
						echo '<li>Pas encore de dates pour cette formation.</li>';
					}
					echo '</ul>';
					echo '</div>';
				} else {
					echo '<p>Pas encore de dates pour cette formation.</p>';
				}
			?>
			<span class="content-clock slide-up">
				<i class="icon icon--clock"></i><?php echo esc_html($form_day); ?><br/>
				<?php echo esc_html($form_hours); ?>
			</span>

			<div class="content-text cbo-cms">
				<?php echo wp_kses_post($resume); ?>
			</div>
		</div>
	</div>
</section>