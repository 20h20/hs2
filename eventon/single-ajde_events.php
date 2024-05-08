<?php
	get_header();
	$resume		= get_field('formation_resume');
	$form_date		= get_field('date_de_la_formation');
	$form_day		= get_field('nombre_de_jours');
	$form_hours		= get_field('nombre_dheures');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hs-page-formation'); ?>role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<section class="formation-hero container">
		<div class="hero-inner hs-relative" data-aos="fade-up">
			<div class="hero-content">
				<div class="cbo-breadcrumb">
					<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
				</div>
				<h1 class="content-title">
					<?php the_title(); ?>
				</h1>
				<?php
					do_action('eventon_single_content');
				?>
				<span class="content-clock">
					<i class="icon icon--clock"></i><?php echo $form_day; ?> - <?php echo $form_hours; ?>
				</span>
				<?php echo $resume; ?>
				<div class="cbo-social">
					<?php echo do_shortcode( '<div class="share-title cbo-small">Partager la formation</div>[social_warfare]' ); ?>
				</div>
			</div>
		</div>
		<a class="hs-button contact-scroll" href="#scroll-contact-single" data-aos="fade-left">
			S'inscrire <i class="icon icon--bottom-arrow"></i>
		</a>
	</section>

	<section class="hs-grey-section hs-section hs-skills">
		<a href="<?php the_field('fiche_de_la_formation'); ?>" class="hs-button hs-download button-center" target="_blank" data-aos="fade-up">
			Télécharger la fiche de cette formation
		</a>
		<h2 class="hs-main-title" data-aos="fade-up">
			<small>Bon à savoir</small>
			sur cette formation
		</h2>

		<div class="container">
			<ul class="hs-accordeon" data-aos="fade-up">
				<?php if( have_rows('objectifs') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--objectif"></i> Objectifs</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('objectifs') ): the_row(); ?>
								<li><?php the_sub_field('objectif'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('liste_des_pre-requis') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--checklist"></i> Pré-requis</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('liste_des_pre-requis') ): the_row(); ?>
								<li><?php the_sub_field('pre-requis'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('methodes-pedagogique') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--pedagogie"></i> Méthode pédagogique</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('methodes-pedagogique') ): the_row(); ?>
								<li><?php the_sub_field('methodes_pedagogique'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('public-vise') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--public"></i> Public visé</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('public-vise') ): the_row(); ?>
								<li><?php the_sub_field('public_vise'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('certifications') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--certification"></i> Certification</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('certifications') ): the_row(); ?>
								<li><?php the_sub_field('certifications'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('liste_du_materiel') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--materiel"></i> Matériel</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('liste_du_materiel') ): the_row(); ?>
								<li><?php the_sub_field('materiel'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('formateurs') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--trainer"></i> Formateurs</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('formateurs') ): the_row(); ?>
								<li><strong><?php the_sub_field('nom_et_prenom_du_formateur'); ?></strong></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('liste_bilan_qualite') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--evaluation-qualite"></i> Évaluation qualité</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('liste_bilan_qualite') ): the_row(); ?>
								<li><?php the_sub_field('bilan_qualite'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if( have_rows('liste_recos') ): ?>
					<li class="hs-cms">
						<a class="toggle hs-accordeon_title" href="javascript:void(0);"><i class="icon icon--more"></i> Pour aller plus loin</a>
						<ul class="hs-accordion-inner">
							<?php while( have_rows('liste_recos') ): the_row(); ?>
								<li><?php the_sub_field('recos'); ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endif; ?>
			</ul>

			<div class="hs-onglets-container hs-relative" data-aos="fade-up">
				<div class="hs-onglets">
					<?php if( have_rows('objectifs') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_objectifs" onclick="javascript:change_onglet('objectifs');">
							<i class="icon icon--objectif"></i> Objectifs
						</span>
					<?php endif; ?>

					<?php if( have_rows('liste_des_pre-requis') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_requis" onclick="javascript:change_onglet('requis');">
							<i class="icon icon--checklist"></i> Pré-requis
						</span>
					<?php endif; ?>

					<?php if( have_rows('methodes-pedagogique') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_pedagogie" onclick="javascript:change_onglet('pedagogie');">
							<i class="icon icon--pedagogie"></i> Méthode pédagogique
						</span>
					<?php endif; ?>

					<?php if( have_rows('public-vise') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_public" onclick="javascript:change_onglet('public');">
							<i class="icon icon--public"></i> Public visé
						</span>
					<?php endif; ?>

					<?php if( have_rows('certifications') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_certif" onclick="javascript:change_onglet('certif');">
							<i class="icon icon--certification"></i> Certification
						</span>
					<?php endif; ?>

					<?php if( have_rows('liste_du_materiel') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_materiel" onclick="javascript:change_onglet('materiel');">
							<i class="icon icon--materiel"></i> Matériel
						</span>
					<?php endif; ?>

					<?php if( have_rows('formateurs') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_formateurs" onclick="javascript:change_onglet('formateurs');">
							<i class="icon icon--trainer"></i> Formateurs
						</span>
					<?php endif; ?>

					<?php if( have_rows('liste_bilan_qualite') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_qualite" onclick="javascript:change_onglet('qualite');">
							<i class="icon icon--evaluation-qualite"></i> Évaluation qualité
						</span>
					<?php endif; ?>

					<?php if( have_rows('liste_recos') ): ?>
						<span class="onglet_0 hs-onglet_title" id="onglet_recos" onclick="javascript:change_onglet('recos');">
							<i class="icon icon--more"></i> Pour aller plus loin
						</span>
					<?php endif; ?>
				</div>

				<?php if( have_rows('objectifs') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_objectifs">
						<ul>
							<?php while( have_rows('objectifs') ): the_row(); ?>
								<li><?php the_sub_field('objectif'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('liste_des_pre-requis') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_requis">
						<ul>
							<?php while( have_rows('liste_des_pre-requis') ): the_row(); ?>
								<li><?php the_sub_field('pre-requis'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('methodes-pedagogique') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_pedagogie">
						<ul>
							<?php while( have_rows('methodes-pedagogique') ): the_row(); ?>
								<li><?php the_sub_field('methodes_pedagogique'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('public-vise') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_public">
						<ul>
							<?php while( have_rows('public-vise') ): the_row(); ?>
								<li><?php the_sub_field('public_vise'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('certifications') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_certif">
						<ul>
							<?php while( have_rows('certifications') ): the_row(); ?>
								<li><?php the_sub_field('certifications'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('liste_du_materiel') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_materiel">
						<ul>
							<?php while( have_rows('liste_du_materiel') ): the_row(); ?>
								<li><?php the_sub_field('materiel'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('formateurs') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_formateurs">
						<div class="hs-formateurs-container">
							<?php while( have_rows('formateurs') ): the_row(); ?>
								<div class="hs-bloc-formateurs">
									<span class="hs-about-form_content-user-pic">
										<span class="pic hs-relative" style="background:url(<?php the_sub_field('photo_du_formateur'); ?>) no-repeat center;background-size:cover"></span>
										<span class="no-pic"><i class="icon icon--trainer"></i></span>
									</span>
									<span class="hs-about-form_content-user-name"><strong><?php the_sub_field('nom_et_prenom_du_formateur'); ?></strong></span>
								</div>
							<?php endwhile;?>
						</div>
					</div>
				<?php endif; ?>

				<?php if( have_rows('liste_bilan_qualite') ): ?>
					<div class="hs-onglets_content" id="contenu_onglet_qualite">
						<ul>
							<?php  while( have_rows('liste_bilan_qualite') ): the_row(); ?>
								<li><?php the_sub_field('bilan_qualite'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('liste_recos') ): ?>
					<div class="hs-onglets_content hs-cms" id="contenu_onglet_recos">
						<ul>
							<?php while( have_rows('liste_recos') ): the_row(); ?>
								<li><?php the_sub_field('recos'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
			
	<section class="hs-blue-section hs-section">
		<div class="container">
			<h3 class="hs-main-title" data-aos="fade-up">Programme du cours</h3>
			<div class="hs-page-formation-programme hs-cms" data-aos="fade-up">
				<?php
					if( have_rows('programme') ):
					while( have_rows('programme') ): the_row();
				?>
					<?php the_sub_field('programme_du_jour'); ?>
				<?php
					endwhile;
					endif;
				?>
			</div>
		</div>
	</section>

	<section id="scroll-contact-single" class="cbo-formationcontact">
		<div class="formationcontact-inner">
			<div class="cbo-picture-cover">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/images/image-formation-inscription.jpg"
					alt="HS2, centre de formation en cybersécurité" sizes="100vw"
					loading="lazy"
					width="2000" height="2000"
				>
            </div>

			<div class="formationcontact-content">
				<div class="container content-inner">
					<div class="formationcontact-title" data-aos="fade-right">
						<h3 class="hs-main-title">S'inscrire à la formation</h3>
					</div>
					<div class="formationcontact-form hs-white-bloc" data-aos="fade-left">

						<?php
							$posts = get_field('form');
							if( $posts ):
								foreach( $posts as $p ):
									$cf7_id= $p->ID;
									echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
								endforeach;
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</article>

	
<script>
	function change_onglet(name){
		document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 hs-onglet_title';
		document.getElementById('onglet_'+name).className = 'hs-onglet_title-active hs-onglet_title';
		document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
		document.getElementById('contenu_onglet_'+name).style.display = 'block';
		anc_onglet = name;
	}
	var anc_onglet = 'objectifs';
	change_onglet(anc_onglet);
</script>
<?php  get_footer(); ?>