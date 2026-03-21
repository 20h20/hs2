<section id="scroll-programme-single" class="cbo-programme">
	<div class="programme-inner cbo-container container--padding container--nomargin">
		<h3 class="programme-title cbo-title-2 slide-up">
			Programme du cours
		</h3>

		<div class="programme-content cbo-cms">
			<?php
				if( have_rows('programme') ):
				while( have_rows('programme') ): the_row();
					$programme	= get_sub_field('programme_du_jour');
					echo wp_kses_post($programme);
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>