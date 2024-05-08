<?php
	$title	= get_sub_field('partners_title');
?>
<section class="cbo-partners hs-section">
	<div class="partners-inner">
		<div class="container">
			<?php if($title): ?>
				<h2 class="hs-main-title" data-aos="fade-up">
					<?php echo $title; ?>
				</h2>
			<?php endif; ?>

			<div class="partners-list">
				<?php
					if( have_rows('partners_list') ):
					while( have_rows('partners_list') ): the_row();
					$logo = get_sub_field('logo');
				?>
					<div class="list-el">
						<div class="el-inner cbo-picture-contain">
							<img
								src="<?php echo $logo['sizes']['small']; ?>"
								srcset="<?php echo $logo['sizes']['small'] ?> 320w, <?php echo $logo['sizes']['small'] ?> 768w, <?php echo $logo['sizes']['small'] ?> 1024w"
								alt="<?php echo $logo["alt"]; ?>"
								loading="lazy"
								width="120" height="70"
							>
						</div>
					</div>
				<?php
					endwhile;
					endif;
				?>
			</div>
		</div>
	</div>
</section>