<div class="list-el">
	<div class="el-inner">
		<div class="el-picture cbo-picture-cover slide-up">
			<?php 
				the_post_thumbnail('large', array(
					'sizes'    => '(max-width:320px) 145px, (max-width:425px) 220px, 500px',
					'itemprop' => 'image',
					'loading'  => 'lazy',
					'decoding' => 'async',
				));
			?>
		</div>
		<div class="el-title cbo-title-3 slide-up">
			<?php the_title(); ?>
		</div>
		<div class="el-content cbo-cms slide-up">
			<?php the_excerpt(); ?>
		</div>
	</div>
</div>