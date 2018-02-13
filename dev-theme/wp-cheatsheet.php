<!-- Custom Fields -->

<?php echo get_post_meta($post->ID, "post description", true); ?>

<!-- If In Category -->

<?php if (in_category(array('journal', 'press'))) : ?>
<?php elseif (in_category('collections') ):?>
<?php endif; ?>

<!-- If is page -->

<?php if (is_page( 'biography' )):?>		
<?php elseif (is_page( 'contact' )):?>
<?php endif; ?>

<!-- Nav Menus -->

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' ),
			'tertiary-menu' => __( 'Tertiary Menu' )
		)
	);
}

<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>

<!-- Permalink -->

<a href="<?php the_permalink(); ?>"></a>

<!-- Post Thumbnails -->

add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'vimeo-thumb', 200, 110, true ); //'Name', 'Width', 'Height', 'Crop true/false'
}

<?php the_post_thumbnail( 'vimeo-thumb' ); ?>

<!-- Posts by category -->

<?php query_posts('category_name=homepage'); ?>
<?php while (have_posts()) : the_post(); ?>
<?php endwhile;?>

<!-- Posts per page -->

<?php query_posts( array ( 'category_name' => 'news', 'posts_per_page' => 4 ) ); ?>
<?php while (have_posts()) : the_post(); ?>
<?php endwhile;?>

<!-- Tags -->

<?php the_tags(); ?>
<?php single_tag_title(); ?>

<!-- Widget -->

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Sidebar 2')) : ?><?php endif; ?>

<!-- Page children -->

<?php get_page_children( $page_id=2, $pages )?>

<!-- Random Posts -->

<?php query_posts(array(
			'showposts' => 1,
			'orderby' => 'rand',
			'category_name' => 'Banner' 
			));?>
			<?php while (have_posts()) : the_post(); ?>
		<?php endwhile;?>

<!-- Query Post Attachments -->

<?php
$args = array(
  'post_type' => 'attachment',
  'numberposts' => -1,
  'post_status' => null,
  'post_parent' => $post->ID,
  'orderby' => 'menu_order',
  'order' => 'ASC'
); 

$attachments = get_posts($args);

if ($attachments) {
  foreach ( $attachments as $attachment ) {
    $image_attributes = wp_get_attachment_image_src( $attachment->ID, large );
    $alt_text_title = $attachment->post_title ;
    //print_r($attachment); 

    echo "<img src=\"$image_attributes[0]\" width=\"$image_attributes[1]\" height=\"$image_attributes[2]\" alt=\"$alt_text_title\">";
    }
}
?>

<!-- Excerpt limit -->

<?php echo substr(get_the_excerpt(), 0,30); ?>

<!-- Is home conditional -->

<?php if ( is_home() ) {
	    //do something
	} else {
	    //do something else
	}
	?>	

<!-- Post limit -->

function limit_posts_per_page() {
	if ( is_category('blog') )
		return 5;
	else
		return 12; // default: 5 posts per page
}

add_filter('pre_option_posts_per_page', 'limit_posts_per_page');

