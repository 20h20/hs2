<?php

	function bones_ahoy() {
	 	require_once( 'library/inc/custom-cleanup.php' );
	 	require_once( 'library/inc/custom-admin.php' );
	}
	add_action( 'after_setup_theme', 'bones_ahoy' );

	/* ************************* */
	// Register menu
	/* ************************* */
	add_theme_support( 'menus' );
	register_nav_menus(
		array(
			'main-nav' => 'Menu principal',  
			'footer-nav' => 'Menu footer'
		)
	);

	/* ************************* */
	// Pic size
	/* ************************* */
	add_image_size('xsmall', 320, 320, false);
	add_image_size('small', 768, 768, false);
	add_image_size('medium', 1200, 1200, false);
	add_image_size('xlarge', 1920, 1920, false);

	/* ************************* */
	// STYLES
	/* ************************* */
	function ma_styles(){
		wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '1.0', 'all');
	}
	add_action('wp_enqueue_scripts', 'ma_styles', 500);

	/* ************************* */
	/* DISABLE GUTEMBERG */
	/* ************************* */
	add_filter('use_block_editor_for_post', '__return_false', 10);
	add_filter('use_block_editor_for_post_type', '__return_false', 10);

	/* ************************* */
	/* CUSTOM LOGIN */
	/* ************************* */
	function childtheme_custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/library/css/style.css" />';
	}
	add_action('login_head', 'childtheme_custom_login');

	/* ************************* */
	/* CRÉATION PAGINATION */
	/* ************************* */
	function page_navi($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		echo $before.'<ul class="cbo-pagination">'."";

		$prevposts = get_previous_posts_link('Précédent');
		if($prevposts) { echo '<li class="cbo-paginate-prev">' . $prevposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#">Précédent</a></li>'; }

		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="active"><a href="#">'.$i.'</a></li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}

		$nextposts = get_next_posts_link('Suivant');
		if($nextposts) { echo '<li class="cbo-paginate-next">' . $nextposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#">Suivant</a></li>'; }
		
		echo '</ul>'.$after."";
	}

	/* ************************* */
	/* Add button to wysiwyg editor */
	/* ************************* */
	function add_style_select_button($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'add_style_select_button');
	function my_mce_before_init_insert_formats( $init_array ) {
		$style_formats = array(
			array(  
				'title' => 'Bouton bleu',  
				'block' => 'a',  
				'classes' => 'hs-button',
				'wrapper' => true,
				'attributes' => array(
					'href' => '#'
				)
			),
			array(  
				'title' => 'Bouton blanc',  
				'block' => 'a',  
				'classes' => 'hs-button button-white',
				'wrapper' => true,
				'attributes' => array(
					'href' => '#'
				)
			),  
		);
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

	/* ************************* */
	/* AFFICHAGE DE 8 EVENT PAR PAGE - ARCHIVE EVENTS */
	/* ************************* */
	function custom_posts_per_page( $query ) {
		if ( $query->is_category('10') ) {
			set_query_var('posts_per_page', 8);
		}
	}
	add_action( 'pre_get_posts', 'custom_posts_per_page' );

	/* ************************* */
	/* LIMITATION CARACTÈRES ZONE D'EXTRAIT */
	/* ************************* */
	function new_excerpt_length($length) {
		return 26;
	}
	add_filter('excerpt_length', 'new_excerpt_length');

	/* ************************* */
	/* POINTS DE SUPENSIONS THE EXERPT */
	/* ************************* */
	function wp_bootstrap_excerpt_more($more) {
		global $post;
		return '... ';
	}
	add_filter('excerpt_more', 'wp_bootstrap_excerpt_more');

	/* ************************* */
	/* OHY : hide yoast header */
	/* ************************* */
	add_filter( 'wpseo_hide_version', '__return_true' );

?>