<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">
		
		<div class="block block-title">
			<h1 class="archive_title">
				<?php echo get_the_archive_title() ?>
			</h1>
<!--            <div class="row">-->
            <?php // vars
                $queried_object = get_queried_object(); 
                $taxonomy = get_taxonomy($queried_object->taxonomy);
                $term_id = $queried_object->term_id;  
                

                if (function_exists('get_wp_term_image'))
                {
                    $meta_image = get_wp_term_image($term_id); //get category/term image url 
                    if( !empty($meta_image) ){
                    ?>
                    <div class="speaker-photo"><img title="<?php echo $queried_object->name; ?>" src="<?php echo $meta_image; ?>"></div>
                    <?php } ?>
                <?php } 
                if( !empty($queried_object->description) ){ ?>
                
                    <div class="speaker-description"><p><?php echo $queried_object->description; ?></p></div>
                <?php } ?>
<!--            </div>-->
        </div>

        <article id="speaker-episode-count" class="block">
		    <p><?php _e($queried_object->name . " appears in " . $queried_object->count . ' episode' . ($queried_object->count==1?'':'s') . ($queried_object->count>0?':':'.'), "simple-bootstrap"); ?></p>
		</article>

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
		
		<?php endif; ?>

	</div>

	<?php get_sidebar("left"); ?>
	<?php get_sidebar("right"); ?>

</div>

<?php get_footer(); ?>