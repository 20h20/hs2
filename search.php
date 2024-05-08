<?php
	get_header();
?>
	<div class="page-search hs-press-page">
		<section class="cbo-hero">
			<div class="hero-inner container">
				<h1 class="hero-title hs-main-title" data-aos="fade-up">
					Votre recherche :
				</h1>

				<div class="hero-content" data-aos="fade-up">
					<?php printf( __( '%s'), get_search_query() ); ?>
				</div>
			</div>
		</section>

		<div class="hs-press-page_listing-container">
			<div class="container">
				<div class="listing-press">
					<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
								get_template_part('templates/content/content','press');
							endwhile ;
						page_navi();
						else :
					?>
						<div class="container">
							<div class="sectiontxt-inner mo-align-center mo-cms">
								<div class="hs-cms" style="text-align: center;">
									<h3 data-aos="fade-up">
										<?php _e("Aucun article", "wpbootstrap"); ?>
									</h3>
									<div data-aos="fade-up">
										<p><?php _e("Aucun article n'a été trouvé sur le site"); ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
<?php
	get_footer();
?>