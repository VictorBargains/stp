<?php global $multiple_on_page; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class("block"); ?> role="article">
        
        <header>
            
            <?php if ($multiple_on_page) : ?>
            <div class="article-header">
                <h2 class="h1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <?php else: ?>
            <div class="article-header">
                <h1><?php the_title(); ?></h1>
            </div>
            <?php endif ?>

            <?php if (has_post_thumbnail()) { ?>
            <div class="featured-image">
                <?php if ($multiple_on_page) : ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('simple_boostrap_featured'); ?></a>
                <?php else: ?>
                <?php the_post_thumbnail('simple_boostrap_featured'); ?>
                <?php endif ?>
            </div>
            <?php } ?>

            <?php include(get_stylesheet_directory() . "/podcast-meta.php"); ?>
        
        </header>
    
        <section class="post_content">
            <?php
            if ($multiple_on_page) {
                the_excerpt();
            } else {
                the_content();
                wp_link_pages();
            }
            ?>
        </section>
        
        <footer>
            <?php the_tags('<p class="tags">', ' ', '</p>'); ?>
        </footer>
</article>