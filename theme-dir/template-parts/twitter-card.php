<meta name="twitter:card" content="summary">
<?php
if (is_single()) {
	if (have_posts()) {
		echo '<meta name="twitter:description" content="'.esc_attr(mb_substr(get_the_excerpt(), 0, 100)).'">';
	}
	echo template_str('<meta name="twitter:title" content="{title}">', [
		"title" => esc_attr(the_title())
	]);
	echo template_str('<meta name="twitter:url" content="{url}">', [
		"title" => esc_attr(the_permalink())
	]);
} else {
	echo template_str('<meta name="twitter:description" content="{description}">', [
		"title" => esc_attr(bloginfo('description'))
	]);
	echo template_str('<meta name="twitter:title" content="{title}">', [
		"title" => esc_attr(bloginfo('name'))
	]);
	echo template_str('<meta name="twitter:url" content="{url}">', [
		"title" => esc_attr(bloginfo('url'))
	]);
}

if (is_single() && has_post_thumbnail()) {
	$imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0];
	echo '<meta name="twitter:image" content="'.esc_attr($imageUrl).'">\n';
} else if (get_header_image()) {
	$img_url = get_header_image();
	echo '<meta name="twitter:image" content="'.esc_attr($imageUrl).'">\n';
}

?>
<meta name="twitter:domain" content="kotori-kagaku.net">
<meta name="twitter:creator" content="socket1016">
<meta name="twitter:site" content="socket1016">
