<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section id="post">
    <div class="head">
        <div class="avatar">
            <a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->avatarURL() ?>"></a>
        </div>
        <div class="title"><?php $this->title() ?></div>
    </div>
    <div class="content yue"><?php $this->content(); ?></div>
</section>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>
