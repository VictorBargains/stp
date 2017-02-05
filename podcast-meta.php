<?php the_tags('<p class="tags"><span class="tag-label">Topics: </span>', ' ', '</p>'); ?>
<ul class="post_footer_meta meta text-muted list-inline">

    <?php $term_list = wp_get_post_terms( $post->ID, 'series', array( 'fields' => 'all' ) ); ?>
    <?php if( !empty($term_list) ){ ?>
        <li><span class="glyphicon glyphicon-headphones"></span>
        <?php foreach( $term_list as $term ){ ?>
            <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a> 
        <?php } ?>
        </li>
    <?php } ?>
        <?php if ($post->menu_order > 0): ?><li><span class="glyphicon glyphicon-link"></span>
            <a href="<?php the_permalink() ?>">Episode #<?php echo $post->menu_order;?> &nbsp;</a></li>
        <?php endif ?>
        <li><span class="glyphicon glyphicon-time"></span>
            <a href="<?php the_permalink() ?>"><?php the_date(); ?></a>
        </li>
              <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
        <li>
            <?php
                $sp = '<span class="glyphicon glyphicon-comment"></span> ';
            echo $sp;
                comments_popup_link( __( 'Leave a comment', "simple-bootstrap"),  __( '1 Comment', "simple-bootstrap"),  __( '% Comments', "simple-bootstrap"));
            ?>
        </li>
        <?php endif; ?>
        <?php edit_post_link(__( 'Edit', "simple-bootstrap"), '<li><span class="glyphicon glyphicon-pencil"></span> ', '</li>'); ?>
      
    </ul>