<?php
	$title	= get_sub_field('partners_title');
	$chapo	= get_sub_field('partners_chapo');
?>
<section class="cbo-partners">
	<div class="partners-inner cbo-container">
		<?php if($title): ?>
			<h2 class="hs-main-title" data-aos="fade-up">
				<?php echo $title; ?>
			</h2>
		<?php endif; ?>

		<?php if($chapo): ?>
			<div class="partners-chapo hs-cms" data-aos="fade-up">
				<?php echo $chapo; ?>
			</div>
		<?php endif; ?>

		<div class="partners-list">
			<?php
				if( have_rows('partners_list') ):
				while( have_rows('partners_list') ): the_row();
				$logo = get_sub_field('logo');
				$link = get_sub_field('link');
			?>
				<div class="list-el">
					<a class="el-inner cbo-picture-contain" href="<?php echo $link; ?>" target="_blank">
						<img
							src="<?php echo $logo['sizes']['small']; ?>"
							srcset="<?php echo $logo['sizes']['small'] ?> 320w, <?php echo $logo['sizes']['small'] ?> 768w, <?php echo $logo['sizes']['small'] ?> 1024w"
							alt="<?php echo $logo["alt"]; ?>"
							loading="lazy"
							width="120" height="70"
						>
					</a>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>