<meta name="twitter:card" content="summary">
<?php
if (is_single()) {
	while (have_posts()) {
		the_post();
		echo '<meta name="twitter:description" content="'.esc_attr(mb_substr(get_the_excerpt(), 0, 50)).'">';
	}
	echo template_str('<meta name="twitter:title" content="{title}">', [
		"title" => esc_attr(get_the_title())
	]);
	echo template_str('<meta name="twitter:url" content="{url}">', [
		"url" => esc_attr(get_the_permalink())
	]);
	if (has_post_thumbnail()) {
		echo template_str('<meta property="og:image" content="{image}">', [
			"image" => get_the_post_thumbnail_url()
		]);
	}
} else {
	echo template_str('<meta name="twitter:title" content="{title}">', [
		"title" => esc_attr(get_bloginfo('name'))
	]);
	echo template_str('<meta name="twitter:description" content="{description}">', [
		"description" => esc_attr(get_bloginfo('description'))
	]);
	echo template_str('<meta name="twitter:url" content="{url}">', [
		"url" => esc_attr(get_bloginfo('url'))
	]);
	echo template_str('<meta property="og:image" content="{image}">', [
		"image" => get_header_image()
	]);
}

?>
<meta name="twitter:domain" content="kotori-kagaku.net">
<meta name="twitter:creator" content="socket1016">
<meta name="twitter:site" content="socket1016">
