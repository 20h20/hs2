<?php
	$uptitle	= get_field('video_uptitle');
	$title	= get_field('video_title');
	$text	= get_field('video_chapo');
	$picture	= get_field('video_picture');
	$video	= get_field('video_id');
?>
<section class="cbo-video">
	<div class="video-inner cbo-container">

		<?php if($uptitle): ?>
			<div class="video-uptitle cbo-uptitle slide-up">
				<?php echo esc_html($uptitle); ?>
			</div>
		<?php endif; ?>

		<?php if($title): ?>
			<div class="video-title cbo-title-2 slide-up">
				<?php echo wp_kses_post($title); ?>
			</div>
		<?php endif; ?>

		<?php if($text): ?>
			<div class="cbo-cms video-text slide-up">
				<?php echo wp_kses_post($text); ?>
			</div>
		<?php endif; ?>

		<div class="video-player cbo-picture-cover slide-up">
			<img
				src="<?php echo esc_url($picture['sizes']['medium']); ?>"
				srcset="<?php echo esc_url($picture['sizes']['small']); ?> 320w, 
					<?php echo esc_url($picture['sizes']['large']); ?> 768w"
				alt="<?php echo esc_attr($picture['alt']); ?>"
				sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
				loading="lazy"
				decoding="async"
				width="1000"
				height="1000"
				class="player-picture"
			>
			<i class="icon icon--player" aria-hidden="true"></i>
			<meta itemprop="name" content="<?php echo esc_attr($video['title']); ?>">
			<meta itemprop="description" content="<?php echo esc_attr($video['description']); ?>">
			<meta itemprop="uploadDate" content="<?php echo date('Y-m-d', strtotime($video['date'])); ?>">
			<meta itemprop="thumbnailUrl" content="<?php echo $picture['sizes']['xlarge']; ?>">
			<meta itemprop="interactionCount" content="12345">
			<meta itemprop="publisher" content="Cybee">
			<video controls preload="none">
				<source type="video/mp4" src="<?php echo esc_url($video['url']); ?>">
			</video>
		</div>
	</div>
</section>