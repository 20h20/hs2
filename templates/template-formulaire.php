<?php
	/* Template Name: Template Page formulaire */
	get_header();
	$form    = get_field('shortcode_du_formulaire');
?>
<section class="cbo-contact">
	<div class="contact-inner cbo-container container--large container--nomargin container--padding">
		<div class="contact-content">
			<h1 class="hs-main-title">
				<?php the_title(); ?>
			</h1>
			<div class="content-chapo">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="contact-form">
			<?php
				$posts = $form;
				if( $posts ):
					foreach( $posts as $p ):
						$cf7_id= $p->ID;
						echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
					endforeach;
				endif;
			?>
		</div>
	</div>
</section>
<?php
	get_footer();
?>