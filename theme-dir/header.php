<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">
	<?php get_template_part("template-parts/google-analytics");?>
	<?php get_template_part("template-parts/twitter-card");?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div>
	</header>
	<div id="content" class="site-content">
