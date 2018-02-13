<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/img/icon.png" />
		<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/img/icon.png" />
		<link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/img/icon.png" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/style.css" />
		<!--[if lt IE 9]>
			<script src="<?php bloginfo( 'template_directory' ); ?>/js/html5shiv.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<header></header>
		<main>
