<?php

/* Register Sidebar */

register_sidebar( array (
	'name' => __( 'Header Column 2'),
	'id' => 'headercolumn2',
	'before_widget' => '<div class="hd-col-cont">',
	'after_widget' => "</div>",
	'before_title' => '<h1>',
	'after_title' => '</h1>',
	) );

	/*  post thumbnails  */

	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}

	/*  add class to pagination buttons  */

	add_filter('next_posts_link_attributes', 'posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes');

	function posts_link_attributes() {
		return 'class="pagination__next"';
	}

	/*  Register nav menus  */

	add_action( 'init', 'register_my_menus' );

	function register_my_menus() {
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu' )
			)
		);
	}

	/*  custom logo  */

	add_image_size('mytheme-logo', 969, 147);
	add_theme_support('custom-logo', array(
		'size' => 'mytheme-logo'
	));

	//  exclude category from home page

	function exclude_category( $query ) {
		if ( $query->is_home() && $query->is_main_query() ) {
			$query->set( 'cat', '-4, -32' );
		}
	}
	add_action( 'pre_get_posts', 'exclude_category' );

	//  remove emoji stuff

	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	function my_deregister_scripts(){
		wp_deregister_script( 'wp-embed' );
	}
	add_action( 'wp_footer', 'my_deregister_scripts' );
	
	// add category nicenames in body and post class

	function so20621481_category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
		$classes[] = $category->category_nicename;
		return $classes;
	}
	add_filter('post_class', 'so20621481_category_id_class');
