<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pugiemonn
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

	<?php
    // You can start editing here -- including this comment!
    if (have_comments()) : ?>
		<h2 class="comments-title">
			コメント一覧
		</h2>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments(array(
					'callback' => mytheme_comment,
					'style'      => 'ul',
					'short_ping' => true,
				));
			?>
		</ul>

		<?php the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (! comments_open()) : ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'pugiemonn'); ?></p>
		<?php
        endif;

    endif; 
    $args = array(
        'fields' => apply_filters('comment_form_default_fields', array(
			'author' => '<p id="inputtext">' . '<label for="author">' . __('Name')
						. ($req ? '（必須）' : '') . '</label> ' .
						'<br /><input id="author" name="author" type="text" value="'
						. esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
			'email'  => '',
			'url'    => '',
    	)),
        'comment_notes_before' => null,
    );
    comment_form($args);
    ?>

</div><!-- #comments -->
