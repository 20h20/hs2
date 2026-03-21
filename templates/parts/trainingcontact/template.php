<?php
	$posts = get_field('form');
	if( $posts ):
?>
	<section id="scroll-contact-single" class="cbo-trainingcontact">
		<div class="cbo-picture-cover">
			<img
				decoding="async"
				src="<?php bloginfo('template_directory'); ?>/library/images/image-formation-inscription.jpg"
				alt="" sizes="100vw"
				loading="lazy"
				width="2000" height="2000"
			>
		</div>

		<div class="trainingcontact-inner cbo-container container--padding container--nomargin">
			<div class="trainingcontact-content">
				<h3 class="content-title cbo-title-2 slide-up">
					S'inscrire à la formation
				</h3>

				<div class="content-form cbo-form slide-up" data-formation-id="<?php echo get_the_ID(); ?>" data-formation-nom="<?php echo esc_attr(get_the_title()); ?>">
					<?php
						foreach( $posts as $p ):
							$cf7_id = $p->ID;
							echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
						endforeach;
					?>
				</div>
			</div>
		</div>
	</section>
<?php
	endif;
?>