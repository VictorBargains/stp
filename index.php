<?php get_header(); ?>

<div id="content" class="row">
    <?php if( is_active_sidebar('home_sticky_2') || is_active_sidebar('home_sticky_3') || is_active_sidebar('home_sticky_1') ): ?>
        <div class="block sticky-widgets <?php echo simple_boostrap_main_classes(); ?>">
        <?php if ( is_active_sidebar( 'home_sticky_1' ) ) : ?>
            <div class="row">
                <div id="sticky-sidebar-1" class="sticky-sidebar widget-area col-xs-12" role="complementary">
                    <?php dynamic_sidebar( 'home_sticky_1' ); ?>
                </div><!-- #sticky-sidebar-1 -->
            </div>
        <?php endif; ?>                        
        <?php if( is_active_sidebar( 'home_sticky_2') || is_active_sidebar( 'home_sticky_3' ) ): ?>
            <div class="row">
                <div id="sticky-sidebar-2" class="sticky-sidebar widget-area col-xs-6" role="complementary">
                    <div class="row">
                        <?php if( is_active_sidebar( 'home_sticky_2') ): ?>
                        <?php dynamic_sidebar( 'home_sticky_2' ); ?>
                        <?php endif; ?>
                    </div>
                </div><!-- #sticky-sidebar-2 --> 
                <div id="sticky-sidebar-3" class="sticky-sidebar widget-area col-xs-6" role="complementary">
                    <div class="row">
                        <?php if( is_active_sidebar( 'home_sticky_3') ): ?>
                        <?php dynamic_sidebar( 'home_sticky_3' ); ?>
                        <?php endif; ?>
                    </div>
                </div><!-- #sticky-sidebar-3 --> 
            </div>
        <?php endif; ?>
        </div>
    <?php endif; ?>
	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
        <?php 
            if( $post->post_type == 'podcast' ){
                $multiple_on_page = true;
                include(get_stylesheet_directory() . '/podcast-episode.php');
            } else {
                simple_boostrap_display_post(false);
            }
         ?>
		
		<?php endwhile; ?>	
		
		<?php simple_boostrap_page_navi(); ?>	
		
		<?php else : ?>
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No posts found.", "simple-bootstrap"); ?></p>
		</article>
		
		<?php endif; ?>

	</div>

	<?php get_sidebar("left"); ?>
	<?php get_sidebar("right"); ?>

</div>

<?php get_footer(); ?>