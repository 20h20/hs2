<?php
	if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
		cbo_register_block_usage('calendar');
	}
	get_header();
?>
	<div class="cbo--404">
		<section class="cbo-herosimple">
			<div class="herosimple-inner cbo-container container--padding container--nomargin">
				<div class="herosimple-content">
					<h1 class="herosimple-title cbo-title-1 slide-up">
						Erreur 404
					</h1>

					<div class="herosimple-text cbo-cms cbo-chapo slide-up">
						La page que vous cherchez est introuvable
					</div>

					<div class="button-container">
						<a class="cbo-button button--back" href="<?php echo home_url(); ?>">
							Revenir à l'accueil
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="cbo-calendar">
			<div class="calendar-inner cbo-container">
				<div class="calendar-title cbo-title-2 slide-up">
					Nos prochaines formations
				</div>
				<?php echo do_shortcode('[add_eventon]'); ?>
			</div>
		</section>
	</div>
<?php
	get_footer();
?>