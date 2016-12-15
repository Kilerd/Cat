<?php
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
?>
<!--Comment Section Begin-->
<section id="comments">
<div class="comment-bar">Comments</div>
 <!--Comment Numbers-->

<ol class="comment-list">
    <!--Comment List Begin-->
	<?php
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
        // if there's a password
        // and it doesn't match the cookie
    ?>
	<div class="comment-bar">Password Required.</div>
    <?php
        } else if ( !comments_open() ) {
    ?>
	<div class="comment-bar">Comment Closed.</div>

    <?php
        } else if ( !have_comments() ) {
    ?>

    <?php
        } else {
    ?>
    <?php
            wp_list_comments('type=comment&callback=cat_comments');
        }
    ?>
    <!--Comment List End-->
</ol>




<!--New Comment Begin-->
<div class="respond">
<?php
if ( !comments_open() ) :
elseif ( get_option('comment_registration') && !is_user_logged_in() ) :
?>
<div class="comment-bar">Login Required.</div>
<?php else  : ?>

<div class="comment-bar">添加新评论</div>
<!-- Comment Form -->
<form method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="comment-form" role="form">
	<?php if ( !is_user_logged_in() ) : ?>
	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Name" tabindex="1" />
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="Mail" tabindex="2" />
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="https://" tabindex="3" />
	<?php else : ?>
	<div class="comment-bar">欢迎你: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出</a></div>
	<?php endif; ?>
	<textarea id="message comment" name="comment" placeholder="Comment Content" tabindex="4"></textarea>
	<button type="submit" onClick="Javascript:document.forms['commentform'].submit()">Submit Comment</button>
	<?php comment_id_fields(); ?>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>

</div>
<!--New Comment End-->

</section>
<!--Comment Section End-->