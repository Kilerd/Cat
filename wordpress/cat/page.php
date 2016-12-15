<?php get_header(); ?>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<section id="post">
    <div class="head">
        <div class="avatar">
            <a href="<?php echo get_option('home'); ?>/"><img src="<?php echo get_option("cat_avatar_url"); ?>"></a>
        </div>
        <div class="title"><?php the_title(); ?></div>
    </div>
    <div class="content yue">
		<?php the_content(); ?>
    </div>
</section>
<?php endif; ?>
<?php comments_template(); ?>
<?php get_footer(); ?>