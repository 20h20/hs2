<?php
	$titre	= get_sub_field('titre_principal');
	$texte	= get_sub_field('petit_texte_dintroduction');
?>
<section class="cbo-hero">
    <div class="hero-inner container">
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
</section>