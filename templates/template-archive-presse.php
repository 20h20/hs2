<section class="cbo-press">
	<div class="press-inner cbo-container">
		<div class="press-list">
			<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						get_part('templates/parts/blocpress/template');
					endwhile;
					if (function_exists('page_navi')) {
						page_navi();
					} else {
				}
				endif;
			?>
		</div>
	</div>
</section>