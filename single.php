<?php
	if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
	}
	get_header();

	// Détecte si le contenu contient des blocs Gutenberg
	function cbo_has_blocks_content(): bool {
		global $post;
		return !empty($post->post_content) && has_blocks($post->post_content);
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Event">
	<section class="cbo-herosimple">
		<div class="herosimple-inner cbo-container container--padding container--nomargin">
			<div class="herosimple-content">
				<h1 class="herosimple-title cbo-title-1 slide-up" itemprop="name">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>
	</section>

	<?php
		if (have_posts()) : the_post();
			// Pour les pages utilisant ACF
			if (cbo_has_blocks_content()) :
				the_content();
			else :
			// Pour les pages ne passant pas par ACF
	?>
		<section class="cbo-text">
			<div class="text-inner cbo-container container--small">
				<div class="text-content cbo-cms">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	<?php 
		endif;
		endif;
	?>

</article>

<?php
	get_footer();
?>