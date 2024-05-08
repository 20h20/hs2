<?php
	get_header();
?>
    <div class="hs-page-flexible">
        <section class="cbo-hero">
            <div class="hero-inner container">
                <h1 class="hero-title hs-main-title" data-aos="fade-up">
                    Calendrier des formations
                </h1>
            </div>
        </section>
    </div>

    <section class="hs-section hs-calendar-section hs-white-section">
     <div class="container">
        <div class="hs-section-simple-txt">    
            <h2 class="hs-main-title" data-aos="fade-up">Calendrier mensuel de toutes nos formations</h2>
            <div class="hs-calendar-section_intro-txt hs-cms" data-aos="fade-up">
                Accès aux fiches de chaque formation en cliquant dessus. 
            </div>
        </div> 
        <?php echo do_shortcode('[add_eventon]'); ?>
	</div>
</section>
<?php
	get_footer();
?>