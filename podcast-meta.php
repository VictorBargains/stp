<ul class="meta text-muted list-inline">
    <?php
$term_list = wp_get_post_terms( $post->ID, 'series', array( 'fields' => 'all' ) );
    if( !empty($term_list) ):
    ?><li><?php
    for( $term in $term_list ){
    ?><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a> 
    <?php } ?>
    ?></li>
    <?php endif ?>
    
        <li>
            <a href="<?php the_permalink() ?>">
                <?php if ($post->menu_order > 0): ?>
                Episode #<?php echo $post->menu_order;?>
                <?php endif ?>
                <span class="glyphicon glyphicon-time"></span>
                <?php the_date(); ?>
            </a>
        </li>
<!--
        <li>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                <span class="glyphicon glyphicon-user"></span>
                <?php the_author(); ?>
            </a>
        </li>
-->
        <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
        <li>
            <?php
                $sp = '<span class="glyphicon glyphicon-comment"></span> ';
                comments_popup_link($sp . __( 'Leave a comment', "simple-bootstrap"), $sp . __( '1 Comment', "simple-bootstrap"), $sp . __( '% Comments', "simple-bootstrap"));
            ?>
        </li>
        <?php endif; ?>
        <?php edit_post_link(__( 'Edit', "simple-bootstrap"), '<li><span class="glyphicon glyphicon-pencil"></span> ', '</li>'); ?>
    </ul>