<?php
/**
 * Cat: miao~ miao~ miao~
 * 
 * @package Cat
 * @author Kilerd
 * @version 0.1
 * @link https://www.kilerd.me
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<section id="main">
    <section class="header">
        <img src="<?php $this->options->avatarURL() ?>" alt="" class="avatar">
        <div class="name"><?php $this->options->title() ?></div>
        <div class="description"><?php $this->options->description() ?></div>
        <nav>
            <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
    <?php $this->widget('Widget_Contents_Page_List')
               ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </nav>
    </section>
    <section class="posts">
        <?php while($this->next()): ?>
        <a class="post" href="<?php $this->permalink() ?>">
            <?php $this->title() ?>
            <span><?php $this->date('F j, Y'); ?><?php $this->commentsNum('', ', 1 comment', ', %d comments'); ?></span>
        </a>
        <?php endwhile; ?>
    </section>
    <?php $this->pageNav('上一页', '下一页', 0, ''); ?>
</section>
<?php $this->need('footer.php'); ?>