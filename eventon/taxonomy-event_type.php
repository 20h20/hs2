<?php		
	global $eventon;
	get_header();
	$tax = get_query_var( 'taxonomy' );
	$term = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term, $tax );
	$lang = isset($_GET['lang']) ? $_GET['lang'] : 'L1';
	$tax_name = EVO()->frontend->get_localized_event_tax_names_by_slug($tax, $lang);
	$term_name = evo_lang_get('evolang_'. $tax .'_'. $term->term_id, $term->name, $lang);
?>
	<div class="hs-cat-page">
		<section class="cbo-hero">
			<div class="hero-inner container">
				<h1 class="hero-title hs-main-title" data-aos="fade-up">
					<?php single_cat_title(); ?>
				</h1>
				<div class="hero-content" data-aos="fade-up">
					<?php echo category_description(); ?>
				</div>
			</div>
		</section>

		<section class="hs-grey-section hs-section hs-metier">
			<div class="container">
				<div class="hs-intro-section" data-aos="fade-up">
					Retrouvez ici toutes nos formations liées à :<br>
					<strong><?php single_cat_title(); ?></strong>
				</div>

				<div class="metiers-list">
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
						?>
							<a class="list-el" href="<?php the_permalink(); ?>" data-aos="fade-up">
								<span class="el-inner">
									<h3 class="el-title">
										<?php the_title(); ?>
									</h3>
								</span>
							</a>
						<?php
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