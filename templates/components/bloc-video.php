<?php
	$surtitre	= get_sub_field('bloc_videouptitle');
	$title	= get_sub_field('bloc_videotitle');
	$text	= get_sub_field('bloc_videotext');
	$picture	= get_sub_field('bloc_videopicture');
	$video	= get_sub_field('bloc_videovideo');
?>
<section class="cbo-video">
	<div class="cbo-container">
		<h2 class="hs-main-title" data-aos="fade-up">
			<?php if($title): ?>
				<small>
					<?php echo $surtitre ?>
				</small>
			<?php endif; ?>
			<?php if($title): ?>
				<?php echo $title ?>
			<?php endif; ?>
		</h2>

		<?php if($text): ?>
			<div class="hs-cms video-text">
				<?php echo $text ?>
			</div>
		<?php endif; ?>

		<div class="video-player cbo-picture-cover" data-aos="fade-up">
			<img
				decoding="async"
				src="<?php echo $picture['sizes']['xlarge']; ?>"
				srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
				alt="<?php echo $picture['alt']; ?>" sizes="100vw"
				loading="lazy"
				width="1000" height="1000"
			>
			<i class="icon icon--player"></i>
			<video controls preload="none">
				<source loading="lazy" type="video/mp4" src="<?php echo $video['url'] ?>">
			</video>
		</div>
	</div>
</section>