<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pugiemonn
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">記事が見つかりませんでした</h1>
	</header>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>記事を書いてください</p>
		<?php
		else:
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
