<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package pugiemonn
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pugiemonn_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'pugiemonn_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pugiemonn_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

function get_pager_part() {
	global $wp_query;

	$big = 999999999; // need an unlikely integer
	$translated = __( 'Page', 'mytextdomain' ); // Supply translatable string

	echo '<div class="pager-part">';
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
			'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
	) );
	echo '</div>';
	
}

add_action( 'wp_head', 'pugiemonn_pingback_header' );
