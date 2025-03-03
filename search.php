<?php
	get_header();
?>
	<div class="cbo-page page--search">
		<section class="cbo-hero">
			<div class="hero-inner cbo-container container--nomargin">
				<h1 class="hero-title hs-main-title" data-aos="fade-up">
					Votre recherche :
				</h1>

				<div class="hero-content" data-aos="fade-up">
					<?php printf( __( '%s'), get_search_query() ); ?>
				</div>
			</div>
		</section>

		<div class="listing-press cbo-container">
			<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						get_template_part('templates/content/content','press');
					endwhile ;
				page_navi();
				else :
			?>
				<section class="cbo-text">
					<div class="text-inner cbo-container">
						<h4 class="hs-main-title" data-aos="fade-up">
							<?php _e("Aucun article", "wpbootstrap"); ?>
						</h4>
					</div>
				</section>
			<?php
				endif;
			?>
		</div>
	</div>
<?php
	get_footer();
?>