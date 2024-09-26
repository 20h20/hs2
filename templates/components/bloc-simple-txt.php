<?php
	$surtitre	= get_sub_field('surtitre_de_la_section');
	$title	= get_sub_field('titre_de_la_section');
	$texte	= get_sub_field('zone_de_texte_de_la_section');
	$color	= get_sub_field('couleur_de_la_section');
?>
<section class="cbo-text hs-<?php echo $color ?>-section">
    <div class="text-inner cbo-container">
        <?php if($title): ?>
            <h2 class="hs-main-title" data-aos="fade-up">
                <small>
                    <?php echo $surtitre ?>
                 </small>
                 <?php echo $title ?>
            </h2>
        <?php endif; ?>
        <div class="hs-cms" data-aos="fade-up">
            <?php echo $texte ?>
        </div>
    </div>
</section>