<?php 
	function wpc_show_admin_bar() {
		return false;
	}
	add_filter('show_admin_bar' , 'wpc_show_admin_bar');

	/* --------------------------
	   PERSONNALISATION
	-------------------------- */
	/* Suppression des liens de l'admin bar */
	add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );
	function remove_wp_nodes() 
	{
		global $wp_admin_bar;  
		if( !current_user_can('developer') ){

			$wp_admin_bar->remove_node( 'wp-logo' );
			$wp_admin_bar->remove_node( 'new-post' );
			$wp_admin_bar->remove_node( 'new-link' );
			$wp_admin_bar->remove_node( 'new-page' );
			$wp_admin_bar->remove_node( 'comments' );
			$wp_admin_bar->remove_node( 'updates' );
		}
	}

	/* Suppression du dashboard */
	add_filter( 'current_screen', 'dashboard_redirect' );
	function dashboard_redirect( $url ) {
		$screen = get_current_screen();
		if($screen->base == 'dashboard')
			wp_redirect('edit.php?post_type=page');
	}

	/* Autoriser l'upload des fichiers SVG */
	function wpc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'wpc_mime_types');

	/* Pied de page administration */
	function remove_footer_admin () {
		echo 'Proudly handcrafted by <a href="http://julien-brochard.fr/">Julien B</a>';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');

