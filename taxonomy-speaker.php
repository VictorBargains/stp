<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">
		
		<div class="block block-title">
			<h1 class="archive_title">
				<?php echo get_the_archive_title() ?>
			</h1>
                        <?php 
    // vars
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  
$desc = $queried_object->description

            if (function_exists('get_wp_term_image'))
            {
                $meta_image = get_wp_term_image($term_id); 
                //It will give category/term image url 
            }

            echo $meta_image; // category/term image url
            ?>
            
            <?php 

// load thumbnail for this taxonomy term (term object)
$desc = get_term_meta($term_id, 'description', true);
            if( $desc.length ){
                ?><p class="speaker-description"><?php echo $desc; ?></p><?php
            }

?>
            
    		</div>

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		
        <?php 
            if( $post->post_type == 'podcast' ){
                $multiple_on_page = true;
                include(get_stylesheet_directory() . '/podcast-episode.php');
            } else {
                simple_boostrap_display_post(true);
            }
         ?>
		
		<?php endwhile; ?>	
		
		<?php stp_page_navi(); ?>	
		
		<?php else : ?>
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No items found.", "simple-bootstrap"); ?></p>
		</article>
		
		<?php endif; ?>

	</div>

	<?php get_sidebar("left"); ?>
	<?php get_sidebar("right"); ?>

</div>

<?php get_footer(); ?>