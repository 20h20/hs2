<?php
	function cbo_trainer() { 
		register_post_type( 'trainer',
		array( 'labels' => array(
			'name' => __( 'Nos formateurs', 'bonestheme' ),
			'singular_name' => __( 'Formateur', 'bonestheme' ),
			'all_items' => __( 'Tous les formateur', 'bonestheme' ), 
			'add_new' => __( 'Ajouter', 'bonestheme' ), 
			'add_new_item' => __( 'Ajouter un formateur', 'bonestheme' ),
			'edit' => __( 'Modifier', 'bonestheme' ),
			'edit_item' => __( 'Modifier un formateur', 'bonestheme' ),
			'new_item' => __( 'Nouveau formateur', 'bonestheme' ),
			'view_item' => __( 'Voir le formateur', 'bonestheme' ),
			'search_items' => __( 'Rechercher', 'bonestheme' ),
			'not_found' =>  __( 'Aucun formateur trouvé.', 'bonestheme' ),
			'not_found_in_trash' => __( 'Aucun formateur dans la corbeille', 'bonestheme' ),
			'parent_item_colon' => ''
		),
		'description' => __( 'Ceci est une formateur d\'exemple', 'bonestheme' ),
		'public' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 3, 
		'menu_icon' => 'dashicons-welcome-learn-more',
		'rewrite'	=> array( 'slug' => 'formateur', 'with_front'   => false ), // slug du single
		'has_archive' => 'nos-formateurs', // slug de la page d'archive
		'capability_type' => 'post',
		'hierarchical' => false,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'), 
	)); }
	add_action( 'init', 'cbo_trainer');
?>