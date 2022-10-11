<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pnf
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- COMMON TAGS -->
	<meta charset="utf-8">

	<!-- Search Engine -->
	<meta name="description" content="Digital Research Alliance of Canada is an  ">
	<!-- <meta name="image" content="<?php echo get_template_directory_uri();?>/images/favicon/open-grpah-1200x630.png"> -->
	<!-- Schema.org for Google -->
	<meta itemprop="name" content="Digital Research Alliance of Canada">
	<meta itemprop="description" content="Digital Research Alliance of Canada is an  ">
	<!-- <meta itemprop="image" content="<?php echo get_template_directory_uri();?>/images/favicon/open-grpah-1200x630.png"> -->
	<!-- Open Graph general (Facebook, Pinterest & Google+) -->
	<meta name="og:title" content="Digital Research Alliance of Canada">
	<meta name="og:description" content="Digital Research Alliance of Canada is an  ">
	<!-- <meta name="og:image" content="<?php echo get_template_directory_uri();?>/images/favicon/open-grpah-1200x630.png"> -->
	<meta name="og:url" content="<?php echo site_url(); ?>">
	<meta name="og:site_name" content="Digital Research Alliance of Canada">
	<meta name="og:type" content="website">

	<link rel="icon" type="image/jpg" sizes="16x16" href="<?php echo get_template_directory_uri();?>/images/DRAC-Favicon-16.jpg"/>
	<link rel="icon" type="image/jpg" sizes="32x32" href="<?php echo get_template_directory_uri();?>/images/DRAC-Favicon-32.jpg"/>
	<!--<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri();?>/images/favicon/icon-192.png"/>
	<link rel="icon" type="image/png" sizes="256x256" href="<?php echo get_template_directory_uri();?>/images/favicon/icon-256.png"/>
	<link rel="icon" type="image/png" sizes="512x512" href="<?php echo get_template_directory_uri();?>/images/favicon/icon-512.png"/>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-touch-icon-180x180-precomposed.png"/>
	<link rel="mask-icon" href="<?php echo get_template_directory_uri();?>/images/favicon/favicon.svg" color="#0F3157"/> 
	<meta name="msapplication-TileColor" content="#0F3157"/> 
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri();?>/images/favicon/ms-tile-150.png"/> -->

	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-214761414-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-214761414-1');
	</script>
	<style>
		.language-switcher{
			padding-right: 25px;
			font-size: 14px;
		}
		.language-switcher a{
			color: white;
			text-decoration: none;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'pnf' ); ?></a>

	<header id="masthead" class="site-header ">
		<div id="main_navbar" class="navbar navbar-expand-lg navbar-light absolute-top px-md-5 my-3 my-md-4">
    		<!-- you can remove this container wrapper if you want things full width -->
				
					<?php $my_current_lang = apply_filters( 'wpml_current_language', NULL );
					if($my_current_lang == 'fr'){ ?>
					<a class="d-block navbar-brand" target="_blank" rel="noreferrer" href="https://alliancecan.ca/fr">
						<img src="<?php echo get_template_directory_uri();?>/images/Alliance_logo_French-first_reversed.png" alt="Header Logo">
					</a>
					<?php }else{ ?>
					<a class="d-block navbar-brand" target="_blank" rel="noreferrer" href="https://alliancecan.ca/">
						<img src="<?php echo get_template_directory_uri();?>/images/header_logo@2x-8.png" alt="Header Logo">
					</a>
					<?php } ?>



				<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#headerNav" aria-controls="headerNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'best-reloaded' ); ?>">
					<span class="navbar-toggler-icon"></span><span class="sr-only"><?php esc_html_e( 'Toggle Navigation', 'themeslug' ); ?></span>
				</button>
				<div class="w-100">
					<div class="d-none d-md-block w-100 text-end text-white language-switcher pb-2">
					<?php $langs = icl_get_languages('skip_missing=N&orderby=id&order=ASC&link_empty_to=str');
						echo '<a href="'.$langs['en']['url'].'">EN</a>';
						echo ' | ';
						echo '<a href="'.$langs['fr']['url'].'">FR</a>';
					?>
					</div>
				<nav class="collapse navbar-collapse" id="headerNav" role="navigation" aria-label="Main Menu">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'depth' => 2,
						'container' => false,
						'menu_class' => 'navbar-nav  d-flex align-items-center justify-content-end',
						'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
						'walker' => new WP_Bootstrap_Navwalker(),
					) );
					?>					
				</nav>
					<div class="d-blocl d-md-none w-100 text-center text-white language-switcher pb-3">
					<?php $langs = icl_get_languages('skip_missing=N&orderby=id&order=ASC&link_empty_to=str');
						echo '<a href="'.$langs['en']['url'].'">EN</a>';
						echo ' | ';
						echo '<a href="'.$langs['fr']['url'].'">FR</a>';
					?>
					</div>
				</div>
		</div>
	</header><!-- #masthead -->