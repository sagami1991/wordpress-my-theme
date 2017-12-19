<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-multi">

		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-list-item', get_post_format() );
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</main>
		<?php get_pager_part(); ?>
	</div>

<?php
get_sidebar();
get_footer();
