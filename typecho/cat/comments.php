<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-author';
        } else {
            $commentClass .= ' comment';
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
?>
    <li class="comment <?php if ($comments->_levels > 0) { echo ' comment-child'; $comments->levelsAlt(' comment-level-odd', ' comment-level-even'); } else { echo ' comment-parent'; } $comments->alt(' comment-odd', ' comment-even'); echo $commentClass; ?>" id="comment-<?php $comments->theId(); ?>">
        <?php $comments->gravatar('40', ''); ?>
        <div class="content">
            <div class="meta"><?php $comments->author(); ?><span><?php $comments->date('Y-m-d'); ?></span></div>
            <div class="p"><?php $comments->content(); ?></div>
        </div>
        <?php if ($comments->children) { ?>
        <div class="childs">
            <?php $comments->threadedComments($options); ?>
        </div>
        <?php } ?>
    </li>
<?php } ?>


<section id="comments">
    

    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <div class="comment-bar"><?php $this->commentsNum(_t('No Comment'), _t('1 Comment'), _t('%d Comments')); ?></div>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('上一页', '下一页', 0, ''); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>

    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="comment-bar"><?php _e('添加新评论'); ?></div>

    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('Now login: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('Logout'); ?></a></p>
            <?php else: ?>
    			<input type="text" name="author" class="text" placeholder="Name" value="<?php $this->remember('author'); ?>" required />
                <input type="email" name="mail" class="text" placeholder="Mail" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            <?php endif; ?>
                <textarea name="text" placeholder="Comment Content" required ><?php $this->remember('text'); ?></textarea>
                <button type="submit" ><?php _e('Submit Comment'); ?></button>
    	</form>
    </div>
    <?php endif; ?>
</section>