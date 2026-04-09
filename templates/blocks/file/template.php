<?php
    $title	= get_field('file_title');
    $chapo	= get_field('file_chapo');
?>
<section class="cbo-file">
    <div class="file-inner cbo-container">

        <?php if($content): ?>
            <div class="file-title cbo-title-2 slide-up">
                <?php echo wp_kses_post($title); ?>
            </div>
        <?php endif; ?>

        <?php if($content): ?>
            <div class="file-chapo cbo-cms slide-up">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

		<div class="file-list">
			<?php
				if( have_rows('file-list') ):
				while ( have_rows('file-list') ) : the_row();
				$file	= get_sub_field('file');
				$title	= get_sub_field('title');
			?>
				<a
					class="list-el" 
					aria-label="<?php echo esc_attr(wp_strip_all_tags($title)); ?> (PDF, nouvelle fenêtre)"
					<?php if($file): ?>href="<?php echo esc_url($file['url']); ?>"<?php endif; ?>
					target="_blank"
					rel="noopener noreferrer"
				>
					<span class="el-inner">
						<span class="el-picture cbo-picture-contain">
							<img
								decoding="async"
								src="<?php bloginfo('template_directory'); ?>/library/images/picto-presse.png"
								sizes="100vw"
								aria-hidden="true"
								loading="lazy"
								width="103" height="68"
							>
						</span>
						<h3 class="el-title cbo-title-4">
                            <?php echo wp_kses_post($title); ?>
						</h3>
					</span>
				</a>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>