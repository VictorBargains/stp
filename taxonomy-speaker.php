<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">
		
		<div class="block block-title">
			<h1 class="archive_title">
				<?php echo get_the_archive_title() ?>
			</h1>
            <div class="row">
            <?php // vars
                $queried_object = get_queried_object(); 
                $taxonomy = $queried_object->taxonomy;
                $term_id = $queried_object->term_id;  

                if (function_exists('get_wp_term_image'))
                {
                    $meta_image = get_wp_term_image($term_id); //get category/term image url 
                    ?>
                    <div class="speaker-photo col-xs-4 col-sm-push-4"><img title="<?php echo $queried_object->name; ?>" src="<?php echo $meta_image; ?>">
                <?php } ?>

                    <div class="speaker-description col-sm-8 col-sm-pull-4"><p><?php echo $queried_object->description; ?></p></div>
                    
            </div>
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
            <?php var_dump($taxonomy); ?>
		    <p><?php _e("This " . $taxonomy->singular_name . " does not appear in any episodes yet.", "simple-bootstrap"); ?></p>
		</article>
		
		<?php endif; ?>

	</div>

	<?php get_sidebar("left"); ?>
	<?php get_sidebar("right"); ?>

</div>

<?php get_footer(); ?>