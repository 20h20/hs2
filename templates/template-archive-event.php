<div class="cbo-page page-events">
	<section class="cbo-hero">
		<div class="hero-inner container">
			<h1 class="hero-title hs-main-title" data-aos="fade-up">
				<?php single_cat_title(); ?>
			</h1>
			<div class="hero-content" data-aos="fade-up">
				<?php echo category_description(); ?>
			</div>
		</div>
		<div class="categories-list" data-aos="fade-up">
			<a class="list-el" href="<?php echo home_url(); ?>/category/presse/">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/images/picto-presse.png"
					alt="Revue de presse HS2" sizes="100vw"
					loading="lazy"
					width="103" height="68"
				>
				<span class="el-text">
					Revues de presse
				</span>
			</a>
			<a class="list-el" href="<?php echo home_url(); ?>/category/evenement/">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/images/picto-events.png"
					alt="Événements HS2" sizes="100vw"
					loading="lazy"
					width="103" height="68"
				>
				<span class="el-text">
					Les évènements
				</span>
			</a>
		</div>
	</section>

	<div class="hs-section">
		<div class="container">
			<div class="listing-events">
				<?php
					$current_page = get_query_var('paged');
					$current_page = max( 1, $current_page );
					$per_page = 8;
					$args = array(  
						'post_type' => 'post',
						'meta_key' => 'event_start',
						'posts_per_page' => $per_page,
						'orderby' => 'meta_value_num',
						'paged' => $current_page,
					);
					$query = new WP_Query( $args );
					if($query->have_posts()):
						while ( $query->have_posts() ) : $query->the_post(); 
						get_template_part('templates/content/content','event');
						endwhile;
						echo page_navi();
						endif;
					wp_reset_query(); 
				?>
			</div>
		</div>
	</div>
</div>