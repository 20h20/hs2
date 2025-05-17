<?php
	$titre	= get_sub_field('titre_principal');
	$texte	= get_sub_field('petit_texte_dintroduction');
    $addsummary	= get_sub_field('summary_active');
?>
<section class="cbo-hero">
    <div class="hero-inner cbo-container container--nomargin">
        <?php if($titre): ?>
            <h1 class="hero-title hs-main-title" data-aos="fade-up">
                <?php echo $titre ?>
            </h1>
        <?php endif; ?>

        <?php if($texte): ?>
            <div class="hero-content" data-aos="fade-up">
                <?php echo $texte ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if($addsummary == 1): ?>
        <div class="cbo-share">
            <input class="share-input" type="checkbox" id="checkbox">
            <label class="share-label" for="checkbox">
                Table des matières <i class="icon icon--bottom-arrow"></i>
            </label>
            <ul class="share-options" data-title="Table des matières"></ul>
        </div>
    <?php endif; ?>
</section>