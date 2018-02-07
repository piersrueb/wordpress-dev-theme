<?php get_header(); ?>
	<?php if (is_page( 'splash' )):?>
		<?php
			// Get the ID of a given category
			$category_id = get_cat_ID( 'Current' );
			// Get the URL of this category
			$category_link = get_category_link( $category_id );
		?>
		<div id="flicker-holder">
			<div id="flicker-logo">
				<a href="<?php echo esc_url( $category_link ); ?>" title="Enter">
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/on-white.png"/>
				</a>
			</div>
		</div>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/splash.js"></script>
	<?php else: ?>
		<div id="main" class="page">
			<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
				<section id="left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>
				<section id="right">
					<a target="_blank" href="<?php echo get_post_meta($post->ID, "map link", true); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</section>
				<div class="border"></div>
			<?php endwhile; endif; ?>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>
