<?php
add_action('admin_menu', 'cat_page');

function comment_users($postid){
	$comments = get_comments('status=approve&type=comment&post_id='.$postid);
	if ($comments) {
		$i=0; $j=0; $commentusers=array();
		foreach($comments as $comment) {
			$i++;
			if($i==1) {
				$commentusers[] = $comment->comment_author_email;
				$j++;
			}
			if (!in_array($comment->comment_author_email, $commentusers)) {
				$commentusers[] = $comment->comment_author_email;
				$j++;
			}
		}
		$output = array($j, $i);
		if($output[1] == 1){
			return ", 1 Comment";
		}else{
			return ", ".$output[1]." Comments";
		}
	}
	return "";
}

function cat_page(){
	if(count($_POST)>0 && isset($_POST['cat_settings'])){
		
		$options = array("avatar_url", "analytics_code");
		
		foreach($options as $opt) {
			delete_option('cat_'.$opt, $_POST[$opt]);
			add_option('cat_'.$opt, $_POST[$opt]);
		}
	}
	
	add_theme_page(__('CAT 设置'), __('CAT 设置'), 'edit_themes', basename(__FILE__), 'cat_settings');
}

function cat_settings(){ ?>
<div>
<h3>Cat Settings</h3>
<form method="POST" action="">
	<div class="line">
		<label for="avatar_url">Avatar URL</label>
		<input type="text" name="avatar_url" id="avatar_url" value="<?php echo get_option("cat_avatar_url"); ?>">
	</div>
	<div class="line">
		<label for="analytics_code">Analytics Code</label>
		<input type="text" name="analytics_code" id="analytics_code" value="<?php echo get_option("cat_analytics_code"); ?>">
	</div>
	<div class="line">
		<button>Submit</button>
	</div>
	<input type="hidden" name="cat_settings" value="save" style="display:none;" />
</div>
</div>

<?php } ?>


<?php 
function cat_comments($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="comment-<?php comment_ID(); ?>">
        <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 40); } ?>
        <div class="content">
            <div class="meta">

                <?php echo get_comment_author_link(); ?>
                <span><?php echo get_comment_time('Y-m-d'); ?><?php if ($comment->comment_approved == '0') : ?> , Comment is aduitting.<?php endif; ?></span> <!--Comment Time-->
            </div>
            <div class="p yue">
				<?php comment_text(); ?>
            </div>
        </div>
    </li>
<?php } ?>
