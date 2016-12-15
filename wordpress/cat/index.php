<?php get_header(); ?>

    <section id="main">
    <section class="header">
        <!--Avatar Begin-->
        <img src="<?php echo get_option("cat_avatar_url"); ?>" alt="" class="avatar">
        <!--Avatar End-->
        <!--Blog Name Begin-->
        <div class="name"><?php bloginfo('name'); ?></div>
        <!--Blog Name End-->
        <!--Blog Description Begin-->
        <div class="description"><?php bloginfo('description'); ?></div>
        <!--Blog Description End-->
        
        <nav>
            <!--Blog Nav Begin-->
			<li><a title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">首页</a></li>
            <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
            <!--Blog Nav End-->
        </nav>
    </section>
    <section class="posts">
        <!--Post List Loop Begin-->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
        <a class="post" href="<?php the_permalink(); ?>">
            <!--Post Title--><?php the_title(); ?>
            <span><!--Post Datetime--><?php echo date("M j, Y", get_the_time('U')); ?> <!--Post Comment--><?php echo comment_users($post->ID); ?></span>
        </a>
        <?php endwhile; ?>
        <!--Post List Loop End-->
		<?php endif;?>
    </section>
    <!--Page Nav Begin-->
    <ol class="page-navigator">
		<?php if( get_previous_posts_link() ) : ?>
        <li class="prev"><?php previous_posts_link( '上一页' );?></li>
		<?php endif; ?>
		<?php if( get_next_posts_link() ) : ?>
        <li class="next"><?php next_posts_link( '下一页' );?></li>
		<?php endif; ?>
    </ol>
    <!--Page Nav End-->
    </section>
<?php get_footer(); ?>
