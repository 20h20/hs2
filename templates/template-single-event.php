<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="hs-press-single-page">
		<section class="cbo-hero">
			<div class="hero-inner container">
				<h1 class="hero-title hs-main-title" data-aos="fade-up">
					<?php the_title(); ?>
				</h1>
			</div>
		</section>
		<?php
			if (have_posts()) :
			while (have_posts()) :
			the_post();
		?>
			<section class="hs-section">
				<div class="container">
					<div class="hs-cms hs-section-simple-txt" data-aos="fade-up">    
						<?php the_content(); ?>
					</div> 
				</div>
			</section>
		<?php 
			endwhile;
			else :
			endif; 
		?>
	</div>
</article>