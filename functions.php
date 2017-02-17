<?php
/*
show custom post type in archive and term pages from https://wordpress.org/support/topic/custom-post-type-tagscategories-archive-page/?replies=3
*/

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
//  if(is_category() || is_tag()) {
    if ( $query->is_main_query() && (is_category() || is_archive() || is_tag()) /*&& empty( $query->query_vars['suppress_filters'] )*/ ) {
        $post_type = get_query_var('post_type');
        if($post_type)
            $post_type = $post_type;
        else
            $post_type = array('post','podcast'); // replace cpt to your custom post type
        $query->set('post_type',$post_type);
    }
    return $query;
}

/*
 * SERIOUSLY SIMPLE PODCASTING OVERRIDES *
 */

// Disable autogenerated metadata so podcast template can do it better:
add_filter( 'wp_episode_meta_details', 'filter_podcast_details' );
function filter_podcast_details($meta, $episode_id, $context){
    return $context == 'content' ? false : $meta;
}


/**
 * Register our sidebars and widgetized areas.
 *
 */
function sticky_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sticky Sidebar (1 Column)',
        'description'   => 'Displays 1 vertical column above posts.',
		'id'            => 'home_sticky_1',
		'before_widget' => '<div class="col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Sticky Sidebar (Left Column)',
        'description'   => 'Displays the left of 2 vertical columns above posts.',
		'id'            => 'home_sticky_2',
		'before_widget' => '<div class="col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Sticky Sidebar (Right Column)',
        'description'   => 'Displays the right of 2 vertical columns above posts.',
		'id'            => 'home_sticky_3',
		'before_widget' => '<div class="col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sticky_widgets_init' );

/** Adding share menu **/
$items = '<div id="menu-item-share" class="btn-group  menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-share dropdown" role="group"><a title="Share..." data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class=" btn btn-default dropdown-toggle">Share<span class="caret dropdown-toggle"></span> </a>
<ul role="menu" class="dropdown-menu ">	<li id="menu-item-share-copy-link" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-share-copy-link"><a title="Copy Link" href="javascript:copyToClipboard(window.location.href);return false;" tabindex="-1">About</a></li>
	<li id="menu-item-share-email" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-share-email"><a title="Email Link" href="javascript:emailLink(window.location.href);return false;" tabindex="-1">Email Link</a></li>
	<li id="menu-item-share-facebook" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-facebook"><a title="Facebook" href="facebookShare(window.location.href);return false;" tabindex="-1">Facebook</a></li>
</ul>
</div>';
$args = array(
    'theme_location' => 'main_nav'
);
apply_filters( 'wp_nav_menu_items', $items, $args );
    


function podcast_extension_scripts() { 
    // For child themes
    wp_register_script( 'podcast-extensions', 
        get_stylesheet_directory_uri() . '/podcast.js', 
        array('jquery'), 
        null );
    wp_enqueue_script('podcast-extensions');

}
add_action( 'wp_enqueue_scripts', 'podcast_extension_scripts' );

/** Increase number of episodes in podcast feed **/
add_filter( 'ssp_feed_number_of_posts', 'ssp_modify_number_of_posts_in_feed' );
function ssp_modify_number_of_posts_in_feed ( $n ) {
  return 50; // Where 25 is the number of episodes that you would like to include in your RSS feed
}

/** Change 'Speaker(s)' to 'Contributor(s)' **/

add_filter( 'ssp_speakers_plural_label', 'ssp_speakers_plural_label_custom' );
function ssp_speakers_plural_label_custom ( $label ) {
	return 'Contributors';
}
add_filter( 'ssp_speakers_single_label', 'ssp_speakers_single_label_custom' );
function ssp_speakers_single_label_custom ( $label ) {
	return 'Contributor';
}

/** Suppress displaying speakers inside auto-generated podcast details. **/
//add_filter( 'ssp_speakers_display', '__return_false' );

/** Change titles of meta boxes 
    from http://wordpress.stackexchange.com/a/39449
    and http://wordpress.stackexchange.com/questions/39446/change-the-title-of-a-meta-box
**/
function alter_meta_box_titles( $post_type, $priority, $post )
{
    global $wp_meta_boxes;
//    echo '<!--' . "priority: ${priority}, post_type: ${post_type}, wp_meta_boxes: " . print_r($wp_meta_boxes, true) . '-->';

    // Do check if you're on the right $post_type, $priority, etc.
    if( $post_type !== 'podcast' || $priority !== 'normal' ) 
        return $wp_meta_boxes;

    // Change 'Post Attributes' to 'Episode Number'
    if( !empty($wp_meta_boxes['podcast']['side']['core']['pageparentdiv']) ){
        $wp_meta_boxes['podcast']['side']['core']['pageparentdiv']['title'] = 'Episode Number';
    }

    return $wp_meta_boxes;
}
add_action( 'do_meta_boxes', 'alter_meta_box_titles', 0, 3);

// Hide the Order label for podcasts
add_action('admin_head', 'custom_admin_css');
function custom_admin_css() {
    echo <<<EOM
<style>
    body.post-type-podcast p.post-attributes-label-wrapper, body.post-type-podcast label.post-attributes-label {
        display: none;
    }
</style>
EOM;
}


function stp_page_navi() {
    global $wp_query;
    $is_podcast = is_post_type_archive('podcast') || is_tax('series');
    ?>

    <?php if (get_next_posts_link() || get_previous_posts_link()) { ?>
        <nav class="block">
            <ul class="pager pager-unspaced">
                <li class="previous"><?php next_posts_link("&laquo; " . __(($is_podcast? 'Older Episodes': 'Older posts'), "simple-bootstrap")); ?></li>
                <li class="next"><?php previous_posts_link(__(($is_podcast? 'Newer Episodes': 'Newer posts'), "simple-bootstrap") . " &raquo;"); ?></li>
            </ul>
        </nav>
    <?php } ?>

    <?php
}

function stp_display_post($multiple_on_page) { ?>

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
            <?php global $post;
                if( $post->post_type != 'page' ) simple_bootstrap_display_post_meta(); ?>
        
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

<?php }
?>
