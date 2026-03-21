<?php
	if (function_exists('cbo_register_block_usage')) {
		cbo_register_block_usage('herosimple');
	}
	get_header();

	global $wp_query;
	$total_results  = (int) $wp_query->found_posts;
	$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
	$current_page   = max(1, (int) get_query_var('paged'));
	$offset	= ($current_page - 1) * $posts_per_page;
	$first	= $offset + 1;
	$last	= min($offset + $posts_per_page, $total_results);
?>
	<div class="page--search">
		<section class="cbo-herosimple">
			<div class="herosimple-inner cbo-container container--padding container--nomargin">
				<div class="herosimple-content">
					<h1 class="herosimple-title cbo-title-1 slide-up">
						Votre recherche :
					</h1>
					<div class="herosimple-text cbo-cms cbo-chapo slide-up">
						<strong>«&nbsp;<?php echo esc_html(get_search_query()); ?>&nbsp;»</strong>
					</div>
				</div>
			</div>
		</section>
		
		<section class="cbo-press">
			<div class="press-inner cbo-container">
				<?php if ($total_results > 0) : ?>
					<p class="search-count slide-up" aria-live="polite">
						<?php
							printf(
								__('Affichage des résultats <strong>%1$d à %2$d</strong> sur un total de <strong>%3$d</strong>', 'textdomain'),
								(int) $first,
								(int) $last,
								(int) $total_results
							);
						?>
					</p>
				<?php endif; ?>

				<div class="press-list">
					<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
							get_part('templates/parts/blocpress/template');
							endwhile ;
						page_navi();
						else :
					?>
						<div class="cbo-uptitle">
							Aucun article ne correspond à votre recherche
						</div>
					<?php
						endif;
					?>
				</div>
			</div>
		</section>
	</div>
<?php
	get_footer();
?>