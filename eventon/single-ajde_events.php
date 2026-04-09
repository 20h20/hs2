<?php
	get_header();
	$accordionactive	= get_field('formation_accordionactive');
	$programmehidden	= get_field('formation_programmehidden');
	$goodtoknowhidden	= get_field('formation_goodtoknowhidden');
	$subscribhidden	= get_field('formation_subscribehidden');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('hs-page-formation'); ?> itemscope itemtype="https://schema.org/Course">

	<?php get_part('templates/parts/summary/template'); ?>

	<?php
		if($accordionactive == 0):
			get_part('templates/parts/traininghero/template');
		endif;
	?>

	<?php
		if($goodtoknowhidden == 0):
			get_part('templates/parts/tabs/template');
		endif;
	?>

	<?php
		if($programmehidden == 0):
			get_part('templates/parts/programme/template');
		endif;
	?>

	<?php
		if($subscribhidden == 0):
			get_part('templates/parts/trainingcontact/template');
		endif;
	?>

</article>

<?php
	get_footer();
?>