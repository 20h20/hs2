<?php
  /* Nettoyage du wp_head */
  function bones_head_cleanup() {
    // editURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // Remove Emoji Styles
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
  }







  function disable_embed(){
    wp_dequeue_script( 'wp-embed' ) ;
    }
    add_action( 'wp_footer', 'disable_embed' ) ;





  /* Nettoyage titre et meta description */

  function rw_title( $title, $sep, $seplocation ) {
    global $page, $paged;

    // Don't affect in feeds.
    if ( is_feed() ) return $title;

    // Add the blog's name
    if ( 'right' == $seplocation ) {
      $title .= get_bloginfo( 'name' );
    } else {
      $title = get_bloginfo( 'name' ) . $title;
    }

    // Set separator
    if($sep == '')
      $sep = '-';

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) {
      $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
    }

    return $title;
  }

  // remove WP version from RSS
  function bones_rss_version(){ 
    return ''; 
  }

  // remove WP version from scripts
  function bones_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
    return $src;
  }

  // remove injected CSS for recent comments widget
  function bones_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
  }

  // remove injected CSS from recent comments widget
  function bones_remove_recent_comments_style() {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
      remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
  }

  // remove injected CSS from gallery
  function bones_gallery_style($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
  }

  // remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
  function bones_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }

  // edit excerpt more
  function bones_excerpt_more($more) {
    global $post;
    return '...';
  }

  /* --------------------------
    THEME SUPPORT
  -------------------------- */
  function bones_theme_support() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(125, 125, true);

    // RSS thingy

    add_theme_support('automatic-feed-links');
    add_theme_support( 'html5', array(
      'comment-list',
      'search-form',
      'comment-form'
    ));
  }

	/* --------------------------
	   REMOVE STYLES
	-------------------------- */
	function dequeue_contact_form_7_css() {
		wp_dequeue_style('contact-form-7');
		wp_deregister_style('contact-form-7');
	}
	add_action('wp_enqueue_scripts', 'dequeue_contact_form_7_css', 100);

	function dequeue_classic_theme_styles_css() {
		wp_dequeue_style('classic-theme-styles');
		wp_deregister_style('classic-theme-styles');
	}
	add_action('wp_enqueue_scripts', 'dequeue_classic_theme_styles_css', 100);

	function dequeue_cmplz_general_css() {
		wp_dequeue_style('cmplz-general');
		wp_deregister_style('cmplz-general');
	}
	add_action('wp_enqueue_scripts', 'dequeue_cmplz_general_css', 100);

	function dequeue_global_styles_css() {
		wp_dequeue_style('global-styles');
		wp_deregister_style('global-styles');
	}
	add_action('wp_enqueue_scripts', 'dequeue_global_styles_css', 100);

	function dequeue_wp_block_library_css() {
		wp_dequeue_style('wp-block-library');
		wp_deregister_style('wp-block-library');
	}
	add_action('wp_enqueue_scripts', 'dequeue_wp_block_library_css', 100);


	/* --------------------------
	   CLEANUP PROCESS
	-------------------------- */
  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // Remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // Remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // Clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // Clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );
  // launching this stuff after theme setup
  bones_theme_support();

?>