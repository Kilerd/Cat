<?php get_header(); ?>

    <section id="main">
    <section class="header">
        <img src="<?php echo get_option("cat_avatar_url"); ?>" alt="" class="avatar">
        <div class="name"><?php bloginfo('name'); ?></div>
        <div class="description"><?php bloginfo('description'); ?></div>
        <nav>
			<li><a title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">首页</a></li>
            <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
        </nav>
    </section>
    <section class="posts">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
        <a class="post" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            <span><?php echo date("M j, Y", get_the_time('U')); ?> <?php echo comment_users($post->ID); ?></span>
        </a>
        <?php endwhile; ?>
		<?php endif;?>
    </section>
    <ol class="page-navigator">
		<?php if( get_previous_posts_link() ) : ?>
        <li class="prev"><?php previous_posts_link( '上一页' );?></li>
		<?php endif; ?>
		<?php if( get_next_posts_link() ) : ?>
        <li class="next"><?php next_posts_link( '下一页' );?></li>
		<?php endif; ?>
    </ol>
    </section>
<?php get_footer(); ?>
