<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package pugiemonn
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<header class="page-header">
			<h1 class="page-title search-word"><?php
				printf( esc_html__( '検索単語: %s', 'pugiemonn' ), '<span class="search-word-value">' . get_search_query() . '</span>' );
			?></h1>
		</header>
		<main id="main" class="site-main page-multi">
		<?php
		if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-list-item', 'search' );
			endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</main>
		<?php get_pager_part(); ?>
	</section>

<?php
get_sidebar();
get_footer();
