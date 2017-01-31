<?php global $multiple_on_page;
    $feature_bg = false;
?>
<article id="post-<?php the_ID(); ?>" role="article"
    <?php if(has_post_thumbnail() && $feature_bg): ?>  
         <?php post_class("block featured-bg"); ?>  style="background-image: url(<?php echo the_post_thumbnail_url('simple_bootstrap_featured'); ?>);"
     <?php else: ?>
          <?php post_class("block"); ?> 
    <?php endif ?> 
         >
    <header>
            <?php if (!$feature_bg) : ?>
            <div class="article-header">
                <h2 class="h1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <?php else: ?>
            <div class="article-header">
                <h1><?php the_title(); ?></h1>
            </div>
            <?php endif ?>

            <?php if (has_post_thumbnail() && !$feature_bg) { ?>
            <div class="featured-image">
                <?php the_post_thumbnail('simple_boostrap_featured'); ?>
            </div>
            <?php } ?>

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
            <?php include(get_stylesheet_directory() . "/podcast-meta.php"); ?>
        </footer>
</article>