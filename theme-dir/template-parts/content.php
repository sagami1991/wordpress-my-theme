<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php pugiemonn_post_thumbnail(); ?>
	<?php 
		$license = get_post_meta($post->ID , 'image_license' ,true);
		if ($license !== "") {
			echo '<div class="thumbnail_license">'.$license.'</div>';
		}
	?>
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
				<span class="icon-common icon-calendar-clock"></span>
				<?php pugiemonn_posted_on(); ?>
			</div>
			<?php if (get_the_modified_date('Y/n/j') != get_the_time('Y/n/j')) : ?>
				<div class="article-update-date">
					<span class="icon-common icon-update"></span>
					<?php the_modified_date('Y年m月d日') ?>
				</div>
			<?php endif; ?>
			<div class="article-views">
				<span class="icon-common icon-eye"></span>
				<?php if(function_exists('the_views')) { the_views(); } ?>
			</div>
			<?php the_post_source_badge($post->ID); ?>
		</div>
		<?php endif; ?>
	</header>
	<div class="entry-content">
        <?php
            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pugiemonn' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pugiemonn' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>

</article>
