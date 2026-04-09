<?php
    if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
		cbo_register_block_usage('calendar');
	}
    get_header();
?>
    <section class="cbo-herosimple">
        <div class="herosimple-inner cbo-container container--padding container--nomargin">
            <div class="herosimple-content">
                <h1 class="herosimple-title cbo-title-1 slide-up">
                    Calendrier des formations
                </h1>
            </div>
        </div>
    </section>

    <section class="cbo-calendar calendar--grey">
        <div class="calendar-inner cbo-container container--padding container--nomargin">
            <div class="calendar-title cbo-title-2 slide-up">
                Calendrier mensuel de toutes nos formations
            </div>

            <div class="calendar-chapo cbo-cms slide-up">
                    Accès aux fiches de chaque formation en cliquant dessus. 
            </div>

            <?php echo do_shortcode('[add_eventon]'); ?>
        </div>
    </section>
<?php
    get_footer();
?>