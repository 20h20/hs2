<?php
	$title		= get_sub_field('titre_de_la_section');
	$texte		= get_sub_field('descriptif_de_la_section');
	$color		= get_sub_field('couleur_de_la_section');
?>
<section class="hs-section hs-white-section cbo-calendar">
     <div class="container">
        <div class="hs-section-simple-txt">
            <?php if( get_sub_field('titre_de_la_section') ): ?>
                <h2 class="hs-main-title" data-aos="fade-up">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>
            <div class="hs-calendar-section_intro-txt hs-cms" data-aos="fade-up">
            	<?php echo $texte; ?>
            </div>
        </div>
        <?php echo do_shortcode('[add_eventon]'); ?>
	</div>
</section>