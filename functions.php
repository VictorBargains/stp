<?php
/*
show custom post type in archive and term pages from https://wordpress.org/support/topic/custom-post-type-tagscategories-archive-page/?replies=3
*/

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
//  if(is_category() || is_tag()) {
    if ( is_category() || is_archive() || is_tag() /*&& empty( $query->query_vars['suppress_filters'] )*/ ) {
        $post_type = get_query_var('post_type');
        if($post_type)
	    $post_type = $post_type;
        else
            $post_type = array('post','podcast'); // replace cpt to your custom post type
        $query->set('post_type',$post_type);
        return $query;
    }
}

/*
 * SERIOUSLY SIMPLE PODCASTING OVERRIDES *
 */

/** Change 'Speaker(s)' to 'Contributor(s)' **/

add_filter( 'ssp_speakers_plural_label', 'ssp_speakers_plural_label_custom' );
function ssp_speakers_plural_label_custom ( $label ) {
	return 'Contributor';
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
    error_log("priority: ${priority}, post_type: ${post_type}, wp_meta_boxes: " . print_r($wp_meta_boxes, true) );

    // Do check if you're on the right $post_type, $priority, etc.
    // Then alter the output
//    foreach( $wp_meta_boxes as $index => $box )
//        echo '<!--$wp_meta_boxes[' . $index . '][\'title\']="' . $wp_meta_boxes[$index]['title'] . '"-->';
//        $wp_meta_boxes[ $index]['title'] = 'CUSTOM TITLE';

    return $wp_meta_boxes;
}
add_action( 'do_meta_boxes', 'alter_meta_box_titles', 0, 3);


?>
