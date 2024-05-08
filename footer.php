    <div class="hs-overlay-search">
        <button type="button" class="search-close" aria-label="Fermer la modale">
            <i class="icon icon--close"></i>
		</button>
		<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
			<input name="s" id="s" type="text" placeholder="<?php _e('Votre recherche'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
			<button class="hs-button" type="submit">Rechercher</button>
		</form>
	</div>

    <footer>
        <div class="hs-footer-logo">
        	<a class="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                <i class="icon icon--logo-hs2"></i>
            </a>
        </div>

        <div class="hs-col-footer">
        	<span class="footer-title">
                Nos formations par catégories
                <i class="icon icon--right-arrow"></i>
            </span>
        	<ul class="footer-nav">
            	<li><a href="<?php echo home_url(); ?>/category/vie-privee-et-droit-de-la-cybersecurite/">Vie privée et droit de la cybersécurité</a></li>
            	<li><a href="<?php echo home_url(); ?>/category/continuite-dactivite/">Continuité d’activité</a></li>
                <li><a href="<?php echo home_url(); ?>/category/cybersecurite-organisationnelle/">Cybersécurité organisationnelle</a></li>
            	<li><a href="<?php echo home_url(); ?>/category/cybersecurite-technique/">Cybersécurité technique</a></li>
            </ul>
        </div>
        <div class="hs-col-footer">
        	<span class="footer-title">
                À propos
                <i class="icon icon--right-arrow"></i>
            </span>
        	<ul class="footer-nav">
            	<li><a href="<?php echo home_url(); ?>/qui-sommes-nous/">Qui sommes nous ?</a></li>
                <li><a href="<?php echo home_url(); ?>/engagement-qualite/">Notre engagement qualité</a></li>
                <li><a href="<?php echo home_url(); ?>/reglement-de-certification-hs2/">La certification HS2</a></li>
                <li><a href="<?php echo home_url(); ?>/contact">Nous contacter</a></li>
            </ul>
        </div>
        <div class="hs-col-footer">
        	<span class="footer-title">
                Nos événements
                <i class="icon icon--right-arrow"></i>
            </span>
            <ul class="footer-nav">
				<?php
					query_posts('showposts=4&cat=10&orderby=date&order=DSC');
                    if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>        
                <?php
                    endwhile;
                    endif;
                    wp_reset_query();
                ?>
            </ul>
        </div>
        <div class="hs-col-footer footer-newsletter">
        	<span class="footer-title">S'inscrire à la newsletter</span>
            <?php echo do_shortcode('[mailpoet_form id="7"]'); ?>
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
        <span class="footer-organisme">N° d’organisme : 11922236092 <img loading="lazy" src="<?php bloginfo('template_directory'); ?>/library/images/logo-datatocke.png" alt="Datatocké"></span>
       	Hébergé avec &lt;3 par <a href="https://www.digdeo.fr/" target="_blank">DigDeo</a>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
	<?php wp_footer(); ?>
</body>
</html>
