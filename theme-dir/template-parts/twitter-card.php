<meta name="twitter:card" content="summary">
<?php
$title;
$description = "";
$url;
$image_url = "";
if (is_single()) {
	$title = get_the_title();
	while (have_posts()) {
		the_post();
		$description = mb_substr(get_the_excerpt(), 0, 50);
	}
	$url = esc_attr(get_the_permalink());
	$image_url = get_the_post_thumbnail_url();
} else {
	$title = get_bloginfo('name');
	$description = get_bloginfo('description');
	$url = get_bloginfo('url');
	$image_url = get_header_image();
}

echo template_str('
<meta property="og:title" content="{title}">
<meta name="twitter:title" content="{title}">', [
	"title" => esc_attr($title)
]);
echo template_str('
<meta property="og:description" content="{description}">
<meta name="twitter:description" content="{description}">', [
	"description" => esc_attr($description)
]);
echo template_str('
<meta property="og:url" content="{url}">
<meta name="twitter:url" content="{url}">', [
	"url" => esc_attr($url)
]);
echo template_str('
<meta property="og:image" content="{image}">
<meta name="twitter:image" content="{image}">', [
	"image" => esc_url($image_url)
]);
?>

<meta name="twitter:domain" content="kotori-kagaku.net">
<meta name="twitter:creator" content="socket1016">
<meta name="twitter:site" content="socket1016">
