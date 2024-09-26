<?php
	$title	= get_sub_field('title');
?>
<section class="cbo-fiches">
	<div class="fiches-inner cbo-container">
		<?php if($title): ?>
			<h2 class="hs-main-title" data-aos="fade-up">
				<?php echo $title; ?>
			</h2>
		<?php endif; ?>

		<div class="fiches-list">
			<?php
				if( have_rows('fiches') ):
				while ( have_rows('fiches') ) : the_row();
				$file	= get_sub_field('joindre_un_fichier');
				$title	= get_sub_field('titre_de_la_fiche');
			?>
				<a class="list-el" href="<?php echo $file; ?>" target="_blank">
					<span class="el-inner">
						<span class="el-picture cbo-picture-contain">
							<img
								decoding="async"
								src="<?php bloginfo('template_directory'); ?>/library/images/picto-presse.png"
								alt="Fiche formation HS2" sizes="100vw"
								loading="lazy"
								width="103" height="68"
							>
						</span>
						<h3 class="el-title">
							<?php echo $title; ?>
						</h3>
					</span>
				</a>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>