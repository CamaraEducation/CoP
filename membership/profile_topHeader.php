	<div class="hero-container" style="height:295px;opacity: 0.8">
	<div class="container" style="height:255px; background-image: url(<?php echo get_template_directory_uri();  ?>/images/univ.png);">

		 <div class="row h-100 w-100">
             <div class="col-md-12 d-flex justify-content-center align-items-center">
               <div class="row">
               	<div class="col-xs-6 my-auto">
				<span>
				
				<a  href="<?php echo home_url(); ?>/profile">
					<img src="<?php echo get_avatar_url($current_user->ID); ?>" class="img-responsive rounded-circle prof-pic" width="125" height="125" alt="COP">
</a>
				</span>
			
<form method="post" enctype="multipart/form-data"> 

   <label class="btn" style="display:block;border-radius:0px;margin-top:-5px;font-size:12px;margin-left: -15px;">
    
    <input type="file" class="uploadFile img"  id="file" style="width:2px;height: 0px;overflow: hidden;"> Change Image </label>
</form>

  </div>
			<div class="col-xs-6 my-auto">
				<h3 class="prof-name"> <?php echo $member_display_name; ?> </h3>

				<h4 class="prof-role"><?php  echo $memberJobRole_name . ' @ ' . $member_org_name; ?> </h4>

				<span class="badge badge-light float-left" style="line-height:16px;background-color: <?php echo $current_pathway_color;?>;color:#FFFFFF;">
					<?php echo $current_user_pathway_name  ?></span>

					<span class="badge float-left mr-2 communityrole" style="line-height:16px;margin-left: 15px;font-size:14px;">
						<?php echo $communityRole_name; ?></span> 
					</div>
               </div>  
                 </div>
            </div>

			</div>
		</div>