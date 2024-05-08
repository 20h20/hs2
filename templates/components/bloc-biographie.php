<?php
	$title	= get_sub_field('titre_de_la_section');
	$surtitre	= get_sub_field('surtitre_de_la_section');
?>
<div class="cbo-bio hs-section">
	<div class="container">
		<?php if($title): ?>
			<h2 class="hs-main-title" data-aos="fade-up">
				<small><?php echo $surtitre ?></small>
				<?php echo $title; ?>
			</h2>
		<?php endif; ?>

		<div class="bio-list">
			<?php
				if( have_rows('bloc_biographie') ):
				while ( have_rows('bloc_biographie') ) : the_row();
				$picture	= get_sub_field('image');
				$name	= get_sub_field('nom_et_prenom');
				$bio	= get_sub_field('bio');
			?>
				<div class="list-el" data-aos="fade-up">
					<div class="el-inner">
						<div class="el-picture cbo-picture-cover">
							<img
								decoding="async"
								src="<?php echo $picture['sizes']['small']; ?>"
								srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['medium']; ?> 768w, <?php echo $picture['sizes']['medium']; ?> 1024w"
								alt="<?php echo $picture['alt']; ?>" sizes="100vw"
								loading="lazy"
								width="768" height="768"
							>
						</div>
						<div class="el-title">
							<?php echo $name; ?>
						</div>
						<div class="el-content hs-cms">
							<?php echo $bio; ?>
						</div>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</div>