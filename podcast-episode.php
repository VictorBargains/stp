<?php global $multiple_on_page; ?>
<article id="post-<?php the_ID(); ?>" role="article"
    <?php if(has_post_thumbnail()/* && $multiple_on_page*/): ?>  
         <?php post_class("block featured-bg"); ?>  style="background-image: url(<?php echo the_post_thumbnail_url('simple_bootstrap_featured'); ?>);"
     <?php else: ?>
          <?php post_class("block"); ?> 
    <?php endif ?> 
         >
    <header>
            <?php if ($multiple_on_page /*disabling:*/&& false) : ?>
            <div class="article-header">
                <h2 class="h1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <?php else: ?>
            <div class="article-header">
                <h1><?php the_title(); ?></h1>
            </div>
            <?php endif ?>

            <?php if (has_post_thumbnail() && /*!$multiple_on_page*/false) { ?>
            <div class="featured-image">
                <?php the_post_thumbnail('simple_boostrap_featured'); ?>
            </div>
            <?php } ?>

            <?php include(get_stylesheet_directory() . "/podcast-meta.php"); ?>
        </header>
    
        <section class="post_content">
            <?php
            if ($multiple_on_page /*disabling*/&& false) {
                the_excerpt();
            } else {
                the_content();
                wp_link_pages();
            }
            ?>
        </section>
        
        <footer>
            <?php the_tags('<p class="tags">', ' ', '</p>'); ?>
            <ul class="post_footer_meta meta text-muted list-inline">
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
        </footer>
</article>