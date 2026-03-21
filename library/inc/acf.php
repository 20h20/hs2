<?php
	require get_template_directory() . '/templates/blocks/biography/block.php';
	require get_template_directory() . '/templates/blocks/calendar/block.php';
	require get_template_directory() . '/templates/blocks/categories/block.php';
	require get_template_directory() . '/templates/blocks/contact/block.php';
	require get_template_directory() . '/templates/blocks/events/block.php';
	require get_template_directory() . '/templates/blocks/file/block.php';
	require get_template_directory() . '/templates/blocks/herorich/block.php';
	require get_template_directory() . '/templates/blocks/herosimple/block.php';
	require get_template_directory() . '/templates/blocks/jobs/block.php';
	require get_template_directory() . '/templates/blocks/partners/block.php';
	require get_template_directory() . '/templates/blocks/training/block.php';
	require get_template_directory() . '/templates/blocks/text/block.php';
	require get_template_directory() . '/templates/blocks/textpicture/block.php';
	require get_template_directory() . '/templates/blocks/video/block.php';

	function allow_only_custom_blocks( $allowed_blocks, $editor_context ) {
		return array(
			'acf/biography',
			'acf/calendar',
			'acf/categories',
			'acf/contact',
			'acf/events',
			'acf/file',
			'acf/herorich',
			'acf/herosimple',
			'acf/jobs',
			'acf/partners',
			'acf/training',
			'acf/text',
			'acf/textpicture',
			'acf/video',
		);
	}
	add_filter( 'allowed_block_types_all', 'allow_only_custom_blocks', 10, 2 );


	/* ************************* */
	/* ADD NEW CATEGORIES INTO ACF BLOCK REGISTER */
	/* ************************* */
	function add_custom_block_categories($categories) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'text',
					'title' => __('Texte'),
					'icon'  => null,
				),
				array(
					'slug'  => 'blocs',
					'title' => __('Liste de blocs'),
					'icon'  => null,
				),
				array(
					'slug'  => 'hero',
					'title' => __('En-tête'),
					'icon'  => null,
				),
				array(
					'slug'  => 'relationel',
					'title' => __('Relation'),
					'icon'  => null,
				),
			)
		);
	}
	add_filter('block_categories_all', 'add_custom_block_categories');

?>