<?php

?>
<section id="footer" style="background-color: #FFFFFF">
	<div class="container" style="background-color: #FFFFFF;margin-bottom:48px;" >
		<hr>
		<div class="row text-center text-xs-center text-sm-left text-md-left">
			<div class="col-md-3 mx-auto">
				<img src="<?php echo get_template_directory_uri(); ?>/images/camaralogo.png" alt="Camara Education Ireland" class="img-responsive">
				<p class="copyright"> &copy; 2019 Camara Education Ireland</p>
				<p style="font-family: Lato; font-style: normal; font-weight: normal; font-size: 12px; line-height: 12px; color: #000000;"> <a href="http://camaraireland.ie" target="new">www.camaraireland.ie </a></p>
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="container">
						<h3 class="footer-title">Activities To Broaden Your Skillset</h3>
						<ul class="list-unstyled quick-links">
						<?php

							$tax_terms = get_terms( 'pathway', 'orderby=id');
							//var_dump($tax_terms);
							$currentURL=site_url() . "/activities/?a=";
							foreach ( $tax_terms as $term ) {
							?>

							<li class="footer-small-texts"><a href="<?php echo $currentURL . $term->name; ?>"> <?php echo $term->name; ?> </a></li>
						<?php
							}
						?>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="row">
					<div class="container">
						<h3 class="footer-title">FURTHER LEARNING</h3>
						<ul class="list-unstyled quick-links">
							<li class="footer-small-texts"><a href="<?php echo get_site_url(); ?>/programmeplanning">Programme Planning </a></li>
							<li class="footer-small-texts"><a href="<?php echo get_site_url(); ?>/publications">Publications </a></li>
							<li class="footer-small-texts"><a href="<?php echo get_site_url(); ?>/training">Training </a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="row">
					<div class="container">
						<h3 class="footer-title">Help and Support</h3>
						<ul class="list-unstyled quick-links">
							<li class="footer-small-texts"><a href="<?php echo get_site_url(); ?>/directory">TechSpace Directory</a></li>
							<li class="footer-small-texts"><a href="<?php echo get_template_directory_uri(); ?>/docs/CoPCodeofConduct.pdf" target="new">Community Code of Conduct </a></li>
							<li class="footer-small-texts"><a data-toggle="modal" data-target="#exampleModal">Contact Us </a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<ul class="list-unstyled quick-links">
							<li class="list-inline-item"><a href="https://www.facebook.com/TechSpace-Creative-Learning-for-Young-People-131308256937561/"
								><i class="fab fa-facebook social-color"></i></a></li>
							<li class="list-inline-item"><a href="https://twitter.com/TechSpaceTweets" target="New"><i class="fab fa-twitter-square social-color"></i></a></li>
							<li class="list-inline-item"><a href="https://www.instagram.com/techspacemedia/?hl=en"target="New"><i class="fab fa-instagram social-color"></i></a></li>
							<li class="list-inline-item"><a href="https://www.youtube.com/user/TechSpaceMedia/videos"target="New"><i class="fab fa-youtube social-color"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
		<hr>
	</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact a TechSpace Education Officer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      	<form>
        <input type="hidden" id="formstep" name="formstep" value="step1">


						
	<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">First Name</label>
											<input type="text" class="form-control" id="user_fname" name="user_fname">
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">Last Name</label>
											<input type="text" class="form-control" id="user_lname" name="user_lname">
										</div>
									</div>
								</div>


	<div class="form-group">
									<label for="user_username" class="signup-small-txt">Email</label>
									<input type="email" class="form-control" id="user_username" name="user_username">
								</div>


	<div class="form-group">
									<label for="user_username" class="signup-small-txt">Message</label>
									
									  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5"></textarea>

								</div>


<div class="text-center">
<input type="submit" class="land-btn land-btn-txt mt-4 register-submit" value="SEND MESSAGE ">
</div>



      </div>
     
    </div>
  </div>
</div>
</section>
<!-- ./Footer -->
<!-- Bootstrap core JS -->

<?php wp_footer();?>
</body>
</html>

