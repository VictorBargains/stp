<!doctype html>  
<?php 
    $collapse_nav = false;
    $sticky_widgets = true;
?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>
	
<body <?php body_class(); ?>>

	<div id="content-wrapper">

		<header>
			<nav class="navbar navbar-default navbar-static-top">
				<div class="container">
		  
					<div class="navbar-header">
						<?php if ($collapse_nav && has_nav_menu("main_nav")): ?>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-responsive-collapse">
		    				<span class="sr-only"><?php _e('Navigation', 'simple-bootstrap'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php endif ?>
						<a class="navbar-brand" title="<?php bloginfo('description'); ?>" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					</div>

					<?php if (has_nav_menu("main_nav")): ?>
					<div id="navbar-responsive-collapse" class="<?php if( $collapse_nav ){ ?>collapse navbar-collapse<? } else { ?>navbar-nav<? }?>">
						<?php
						    simple_bootstrap_display_main_menu();
						?>

					</div>
					<?php endif ?>

				</div>
			</nav>
		</header>

        <?php if (has_header_image()): ?>
        <div class="header-image-container">
            <div class="header-image" style="background-image: url(<?php echo get_header_image(); ?>)">
                <div class="container">
                    <?php if (display_header_text()): ?>
                    <div class="site-title" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo('name') ?></div>
                    <div class="site-description" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo('description') ?></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php endif ?>
		
		<div id="page-content">
			<div class="container">
            <?php if( is_active_sidebar('home_sticky_2') || is_active_sidebar('home_sticky_3') || is_active_sidebar('home_sticky_1') ): ?>
                <div class="block sticky-widgets">
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