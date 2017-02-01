<?php if( is_active_sidebar('home_sticky_2') || is_active_sidebar('home_sticky_3') || is_active_sidebar('home_sticky_1') ): ?>
            <div class="block sticky-widgets">
            <?php if ( is_active_sidebar( 'home_sticky_1' ) ) : ?>
                <div class="row">
                    <div id="sticky-sidebar-1" class="sticky-sidebar widget-area col-xs-12" role="complementary">
                        <div class="row">
                            <?php dynamic_sidebar( 'home_sticky_1' ); ?>
                        </div>
                    </div><!-- #sticky-sidebar-1 -->
                </div>
            <?php endif; ?>                        
            <?php if( is_active_sidebar( 'home_sticky_2') || is_active_sidebar( 'home_sticky_3' ) ): ?>
                <div class="row">
                    <div id="sticky-sidebar-2" class="sticky-sidebar widget-area col-xs-12 col-sm-6" role="complementary">
                        <div class="row">
                            <?php if( is_active_sidebar( 'home_sticky_2') ): ?>
                            <?php dynamic_sidebar( 'home_sticky_2' ); ?>
                            <?php endif; ?>
                        </div>
                    </div><!-- #sticky-sidebar-2 --> 
                    <div id="sticky-sidebar-3" class="sticky-sidebar widget-area col-xs-12 col-sm-6" role="complementary">
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