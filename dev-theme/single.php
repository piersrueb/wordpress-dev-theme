<?php get_header(); ?>
<div id="main">
	<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
			<h1><?php the_title(); ?></h1>
			<section class="body-cont">
				<?php
				$content = get_the_content();
				$content = preg_replace("/<img[^>]+\>/i", " ", $content);
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]>', $content);
				echo $content;
				?>
			</section>
			<section class="images">
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
						$templateDirectory = get_bloginfo('template_directory');
						if (in_category(array('portrait'))) :
							echo "<div class='post-image' style='background-image:url(\"$image_attributes[0]\");'><img src='".$templateDirectory."/img/3x4-portrait.png' alt='placeholder'></div>";
						else:
							echo "<div class='post-image' style='background-image:url(\"$image_attributes[0]\");'><img src='".$templateDirectory."/img/16x9-landscape.png' alt='placeholder'></div>";
						endif;
					}
				}
				?>
			</section>
			<div class="border"></div>
		</article>
	<?php endwhile;?>
</div>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/single.js"></script>
<?php get_footer(); ?>
