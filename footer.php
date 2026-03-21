	</main>
	
	<div class="overlay-search"role="dialog" aria-modal="true" aria-labelledby="search-title">
		<button type="button" class="search-close" aria-label="Fermer la recherche">
			<i class="icon icon--close" aria-hidden="true"></i>
		</button>
		<div class="cbo-form">
			<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
				<input name="s" id="s" type="search" placeholder="<?php _e('Votre recherche'); ?>" data-provide="typeahead" data-items="4">
				<button class="cbo-button" type="submit">Rechercher</button>
			</form>
		</div>
	</div>

	<button class="cbo-up" aria-label="Revenir en haut">
		<i class="icon icon--bottom-arrow" aria-hidden="true"></i>
	</button>

	<footer itemscope itemtype="http://schema.org/WPFooter" role="contentinfo">
		<div class="footer-inner cbo-container container--padding container--nomargin">
			<a class="footer-logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>/" rel="home" aria-label="Revenir à l'accueil">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/images/logo-hs2-footer.svg"
					alt="<?php echo get_bloginfo('description'); ?>" sizes="100vw"
					width="120" height="50"
					itemprop="logo"
					loading="lazy"
				>
			</a>

			<div class="col-footer">
				<span class="footer-title">
					Nos formations par catégories
					<i class="icon icon--right-arrow" aria-hidden="true"></i>
				</span>
				<ul class="footer-nav">
					<li><a href="<?php echo home_url(); ?>/event-type/vie-privee-et-droit-de-la-cybersecurite/">Vie privée et droit de la cybersécurité</a></li>
					<li><a href="<?php echo home_url(); ?>/event-type/continuite-dactivite/">Continuité d’activité</a></li>
					<li><a href="<?php echo home_url(); ?>/event-type/cybersecurite-organisationnelle/">Cybersécurité organisationnelle</a></li>
					<li><a href="<?php echo home_url(); ?>/event-type/cybersecurite-technique/">Cybersécurité technique</a></li>
				</ul>
			</div>

			<div class="col-footer">
				<span class="footer-title">
					À propos
					<i class="icon icon--right-arrow" aria-hidden="true"></i>
				</span>
				<ul class="footer-nav">
					<li><a href="<?php echo home_url(); ?>/qui-sommes-nous/">Qui sommes nous ?</a></li>
					<li><a href="<?php echo home_url(); ?>/engagement-qualite/">Notre engagement qualité</a></li>
					<li><a href="<?php echo home_url(); ?>/reglement-de-certification-hs2/">La certification HS2</a></li>
					<li><a href="<?php echo home_url(); ?>/contact">Nous contacter</a></li>
				</ul>
			</div>
			<div class="col-footer">
				<span class="footer-title">
					Nos événements
					<i class="icon icon--right-arrow" aria-hidden="true"></i>
				</span>
				<ul class="footer-nav">
					<?php
						$current_page = get_query_var('paged');
						$current_page = max(1, $current_page);
						$per_page = 4;
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
								?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php
							}
						} else {
							echo '<p>Aucun événement à venir.</p>';
						}
						wp_reset_postdata();
					?>
				</ul>
			</div>
			<div class="col-footer footer-newsletter">
				<span class="footer-title">S'inscrire à la newsletter</span>
				<p>Nous prévoyons de changer de logiciel de newsletter, aussi les inscriptions sont provisoirement suspendues.</p>
			</div>
		</div>
	</footer>

	<div class="hs-footer-bot">
		<div class="footer-logo">
			<img
				decoding="async"
				src="<?php bloginfo('template_directory'); ?>/library/images/logo-qualiopi.png"
				alt="formation certifiée qualiopi" sizes="100vw"
				loading="lazy"
				width="150" height="135"
			>
			<img
				decoding="async"
				src="<?php bloginfo('template_directory'); ?>/library/images/orange-campus-logo.svg"
				alt="formation campus cyber" sizes="100vw"
				loading="lazy"
				width="150" height="135"
			>
		</div>

		©HS2 <?php echo date('Y')?> - <a href="<?php echo home_url(); ?>/vie-privee/">Vie privée</a> - <a href="<?php echo home_url(); ?>/mentions-legales/">Mentions légales</a> -
		<a href="<?php echo home_url(); ?>/cgv-hs2/">CGV</a><br />
		<span class="footer-organisme">
			N° d’organisme : 11922236092 
			<img loading="lazy" src="<?php bloginfo('template_directory'); ?>/library/images/logo-datatocke.png" alt="Datatocké" width="24" height="24">
		</span>
		Hébergé avec &lt;3 par <a href="https://www.digdeo.fr/" target="_blank">DigDeo</a>
	</div>

	<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
	<?php wp_footer(); ?>
</body>
</html>