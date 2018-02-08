<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!--  header  -->
        <h1>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>

        <!--  the content | images removed  -->
        <section class="body-cont">
            <?php
            $content = get_the_content();
            $content = preg_replace("/<img[^>]+\>/i", " ", $content);
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            echo $content;
            ?>
        </section>

        <!-- Query Post Attachments | images -->
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
                //print_r($attachment);

                echo "<img src=\"$image_attributes[0]\" width=\"$image_attributes[1]\" height=\"$image_attributes[2]\" alt=\"$alt_text_title\">";
                }
            }
            ?>
        </section>
    </article>

<?php endwhile;?>
<?php get_footer(); ?>
