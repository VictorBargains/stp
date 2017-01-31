
<?php if ( is_active_sidebar( 'sidebar-right' ) || is_active_sidebar('home_right_1') ) { ?>
<div id="sidebar-right" class="<?php simple_boostrap_sidebar_right_classes(); ?>" role="complementary">
    <div class="vertical-nav block">
    <?php 
        if ( is_active_sidebar( 'home_right_1' ) ){                   
             dynamic_sidebar( 'home_right_1' );
        }
        if ( is_active_sidebar( 'sidebar-right' ) ){                   
             dynamic_sidebar( 'sidebar-right' );
        }
    ?>
    </div>
</div>
<?php } ?>