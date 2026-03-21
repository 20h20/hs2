<?php
	if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
	}
	get_header();
?>

<div class="page--archive">
	<section class="cbo-herosimple herosimple--archive">
		<div class="herosimple-inner cbo-container container--padding container--nomargin">
			<div class="herosimple-content">
				<h1 class="herosimple-title cbo-title-1 slide-up">
					<?php single_cat_title(); ?>
				</h1>

				<div class="herosimple-text cbo-cms cbo-chapo slide-up">
					<?php echo category_description(); ?>
				</div>

				<div class="herosimple-list slide-up">
					<a class="list-el" href="<?php echo home_url(); ?>/category/presse/">
						<span class="el-picture cbo-picture-contain">
							<img
								decoding="async"
								src="<?php bloginfo('template_directory'); ?>/library/images/picto-presse.png"
								alt="" sizes="100vw"
								loading="lazy"
								width="103" height="68"
							>
						</span>
						<span class="el-text">
							<?php _e("Revues de presse", "wpbootstrap"); ?>
						</span>
					</a>

					<a class="list-el" href="<?php echo home_url(); ?>/category/evenement/">
						<span class="el-picture cbo-picture-contain">
							<img
								decoding="async"
								src="<?php bloginfo('template_directory'); ?>/library/images/picto-events.png"
								alt="" sizes="100vw"
								loading="lazy"
								width="103" height="68"
							>
						</span>
						<span class="el-text">
							<?php _e("Les évènements", "wpbootstrap"); ?>
						</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php 
		if(in_category(9)){ 
			include 'templates/template-archive-presse.php';
		}
		if(in_category(10)){
			include 'templates/template-archive-event.php';
		}
	?>
</div>

<?php
	get_footer();
?>