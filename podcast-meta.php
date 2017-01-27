<ul class="meta text-muted list-inline">
    <?php $term_list = wp_get_post_terms( $post->ID, 'series', array( 'fields' => 'all' ) ); ?>
    <?php if( !empty($term_list) ){ ?>
        <li><span class="dashicons-before dashicons-microphone"></span>
        <?php foreach( $term_list as $term ){ ?>
            <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a> 
        <?php } ?>
        </li>
    <?php } ?>
    
        <li>
            <a href="<?php the_permalink() ?>">
                <?php if ($post->menu_order > 0): ?>
                <span class="glyphicon glyphicon-link"></span>
                Episode #<?php echo $post->menu_order;?> &nbsp;
                <?php endif ?>
                <span class="glyphicon glyphicon-time"></span>
                <?php the_date(); ?>
            </a>
        </li>
      
    </ul>