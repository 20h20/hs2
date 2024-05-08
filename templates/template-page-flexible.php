<?php
	/* Template Name: Template Page flexible */
	get_header();
?>
    <div class="hs-page-flexible">
		<?php
			global $flexible_count;
			if( have_rows('flexible_layout') ):
				while ( have_rows('flexible_layout') ) : the_row();
					++$flexible_count;
					///////////////////
					//  HERO
					if( get_row_layout() == 'bloc_hero' ): 
						get_template_part( 'templates/components/bloc-hero');

					///////////////////
					//  BIO
					elseif( get_row_layout() == 'bloc_biographies' ):
						get_template_part( 'templates/components/bloc-biographie');

					///////////////////
					//  CONTACT
					elseif( get_row_layout() == 'bloc_de_contact' ): 
						get_template_part( 'templates/components/bloc-contact');

					///////////////////
					//  SIMPLE TEXTE
					elseif( get_row_layout() == 'bloc_de_texte_simple' ): 
						get_template_part( 'templates/components/bloc-simple-txt');

					///////////////////
					//  BLOC METIER
					elseif( get_row_layout() == 'bloc_formations_par_metier' ): 
						get_template_part( 'templates/components/bloc-metier');

					///////////////////
					//  BLOC CTA
					elseif( get_row_layout() == 'bloc_call_to_action' ): 
						get_template_part( 'templates/components/bloc-cta');

					///////////////////
					//  BLOC CALENDRIER
					elseif( get_row_layout() == 'bloc_calendrier' ): 
						get_template_part( 'templates/components/bloc-calendrier');

					///////////////////
					//  BLOC TEXTE ET IMAGE
					elseif( get_row_layout() == 'bloc_texte_et_image' ): 
						get_template_part( 'templates/components/bloc-texte-image');

					///////////////////
					//  BLOC FICHES
					elseif( get_row_layout() == 'bloc_fiches' ): 
						get_template_part( 'templates/components/bloc-fiches');

					///////////////////
					//  BLOC PARTENAIRES
					elseif( get_row_layout() == 'bloc_partners' ): 
						get_template_part( 'templates/components/bloc-partners');
						
					endif;
				endwhile;
			endif;
		?>
	</div>
<?php
	get_footer();
?>