<?php
	$surtitre	= get_sub_field('surtitre_de_la_section');
	$title	= get_sub_field('titre_de_la_section');
	$texte	= get_sub_field('zone_de_texte');
	$picture	= get_sub_field('image_de_la_section');
	$color	= get_sub_field('couleur_de_la_section');
	$picturepos	= get_sub_field('position_de_limage');
	$cover	= get_sub_field('textpicture_cover');
?>
<section class="cbo-textpicture textpicture--<?php echo $picturepos; ?>">
	<div class="textpicture-inner cbo-container">
		<?php if($title): ?>
			<h2 class="textpicture-title hs-main-title" data-aos="fade-up">
				<?php if($surtitre): ?>
					<small><?php echo $surtitre ?></small>
				<?php endif; ?>
				<?php echo $title ?>
			</h2>
		<?php endif; ?>

		<div class="textpicture-picture <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?>">
			<img
				decoding="async"
				src="<?php echo $picture['sizes']['small']; ?>"
				srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
				alt="<?php echo $picture['alt']; ?>" sizes="100vw"
				loading="lazy"
				width="768" height="768"
			>
		</div>
		<div class="textpicture-content">
			<div class="content-text hs-cms">
				<?php echo $texte ?>
			</div>
		</div>
	</div>
</section>