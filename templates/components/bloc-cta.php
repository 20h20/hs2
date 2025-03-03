<?php	
	$picture	= get_sub_field('image_du_call_to_action');
	$title	= get_sub_field('titre_du_call_to_action');
	$desc	= get_sub_field('court_texte_du_call_to_action');
	$link	= get_sub_field('texte_du_lien');
	$url	= get_sub_field('lien_vers_la_page');
?>
<section class="cbo-cta">
	<div class="cta-inner cbo-container container--padding container--nomargin">
		<div class="cta-content">
			<?php if($title): ?>
				<h3 class="content-title hs-main-title" data-aos="fade-up">
					<?php echo $title ?>
				</h3>
			<?php endif; ?>

			<?php if($desc): ?>
				<div class="content-text" data-aos="fade-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>

			<?php if($link): ?>
				<a class="hs-button" href="<?php echo $url ?>" data-aos="fade-up">
					<?php echo $link ?> <i class="icon icon--right-arrow"></i>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="cta-picture cbo-picture-cover">
		<img
			decoding="async"
			src="<?php echo $picture['sizes']['small']; ?>"
			srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
			alt="<?php echo $picture['alt']; ?>" sizes="100vw"
			loading="lazy"
			width="1900" height="768"
		>
	</div>
</section>