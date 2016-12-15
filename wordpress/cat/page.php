<?php get_header(); ?>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<section id="post">
    <div class="head">
        <!--Avatar and Index Begin-->
        <div class="avatar">
            <a href="<?php echo get_option('home'); ?>/"><img src="<?php echo get_option("cat_avatar_url"); ?>"></a>
        </div>
        <!--Avatar and Index End-->

        <!--Post Title Begin-->
        <div class="title"><?php the_title(); ?></div>
        <!--Post Title End-->
        <!--Post category Begin-->
        <!--Post category End-->
    </div>
    <!--Post Content Begin-->
    <div class="content yue">
		<?php the_content(); ?>
    </div>
    <!--Post Content End-->
</section>
<?php endif; ?>
<?php comments_template(); ?>
<?php get_footer(); ?>