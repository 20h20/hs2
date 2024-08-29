<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<title><?php wp_title(' - '); ?></title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/library/images/fav/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/library/images/fav/favicon-16x16.png">
		<link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/library/images/bg-hero.jpg">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header>
			<a class="hs-header-logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/images/logo-hs2.svg"
					alt="HS2, centre de formation en cybersécurité" sizes="100vw"
					loading="lazy"
					width="190" height="68"
				>
			</a>
			<nav class="header-nav">
				<i class="icon icon--logo-hs2"></i>
				<?php wp_nav_menu( array(
					'container' => false,
					'container_class' => '',
					'menu_class' => '',
					'theme_location' => 'main-nav',
				)); ?>
				<button type="button" class="search-button" aria-label="Ouvrir la recherche">
					<i class="icon icon--search"></i>
				</button>
			</nav>
			<div class="header-buttons">
				<button type="button" class="search-button" aria-label="Ouvrir la recherche">
					<i class="icon icon--search"></i>
				</button>
				<div class="hs-hamburger-menu">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>
			</div>
		</header>

		<div class="hs-overlay"></div>
		<div class="hs-overlay_dropdown"></div>