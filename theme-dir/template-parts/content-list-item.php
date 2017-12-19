<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php pugiemonn_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="article-post-date">
				<?php pugiemonn_posted_on(); ?>
			</div>
			<div class="article-views">
				<span class="icon-common icon-eye"></span>
				<?php if(function_exists('the_views')) { the_views(); } ?>
			</div>
			<?php get_post_source_badge($post->ID); ?>
		</div>
		<?php endif; ?>
	</header>
</article>
