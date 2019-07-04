
<?php if(comments_open()) : ?>
    <?php if(get_option('comment_registration') && !$user_ID) : ?>  
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>  

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">  
            <?php if($user_ID) : ?>  
                <!--
                <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 

                    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>  
                -->
            <?php else : ?>  
                <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />  
                <label for="author">Name <?php if($req) echo "(required)"; ?></label></p>  
                <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />  
                <label for="email">Email (will not be published<?php if($req) echo ", required"; ?>)</label></p>  
                <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />  
                <label for="url">Website</label></p>  
            <?php endif; ?>  

<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">

    <img src="<?php echo get_avatar_url($current_user->ID); ?>" class="rounded-circle align-self-start mr-3" style="width:40px;">
                                            
   <div class="form-group green-border-focus">
    <textarea name="comment" id="comment" class="form-control col-xs-12"   rows="7" cols="80" style="color:#7B8794" onfocus="this.value=''">
   What went well or or did't go well for me with this activity was...
    </textarea>

            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

                                                    <input type="submit" name="submit" nid="login-submit" class="btn land-btn land-btn-txt mt-4 login-submit" value="ADD COMMENT" style="font-size:12px;">
                                                </div>



            <?php do_action('comment_form', $post->ID); ?>  

</div>

        </form>  
    <?php endif; ?>  
<?php else : ?>  
    <p>The comments are closed.</p>  
<?php endif; ?>


                        <h2 class="headtitle">Activity Discussions </h2>

<hr>

<div style="overflow-y: scroll; height:300px;">


<a id="comments"></a>

<?php if($comments) : ?>  
    <ul class="comments" style="list-style-type: none;">  
    <?php foreach($comments as $comment) : ?>  
        <li id="comment-<?php comment_ID(); ?>" class="<?php if ($comment->user_id == 1) echo "authcomment";?>">  
            <?php if ($comment->comment_approved == '0') : ?>  
                <p>Your comment is awaiting approval</p>  
            <?php endif; ?>  
            

    <img src="<?php echo get_avatar_url(get_comment_author_email()); ?>" class="rounded-circle align-self-start mr-3" style="width:40px;">

            <cite><?php comment_author_link(); ?> on <small><?php comment_date(); ?></small></cite><br />
            <?php comment_text(); ?>  
        </li>  
    <?php endforeach; ?>  
    </ul>  
<?php endif; ?> 

</div>