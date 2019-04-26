<?php

?>
<section id="footer" style="background-color: #FFFFFF">
	<div class="container" style="background-color: #FFFFFF">
		<hr>
		<div class="row text-center text-xs-center text-sm-left text-md-left">
			<div class="col-md-3 mx-auto">
				<img src="<?php echo get_template_directory_uri(); ?>/images/camaralogo.png" alt="Camara Education Ireland" class="img-responsive">
				<p class="copyright"> &copy; 2019 Camara Education Ireland</p>
				<p style="font-family: Lato; font-style: normal; font-weight: normal; font-size: 12px; line-height: 12px; color: #000000;"> www.camarayreland.ie</p>
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
							<li class="footer-small-texts">Programme Planning</li>
							<li class="footer-small-texts">Publications</li>
							<li class="footer-small-texts">Training</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="row">
					<div class="container">
						<h3 class="footer-title">Help and Support</h3>
						<ul class="list-unstyled quick-links">
							<li class="footer-small-texts"><a href="<?php echo home_url(); ?>/directory">TechSpace Directory</a></li>
							<li class="footer-small-texts">Community Code of Conduct</li>
							<li class="footer-small-texts">Contact Us</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<ul class="list-unstyled quick-links">
							<li class="list-inline-item"><a href="https://www.facebook.com/TechSpace-Creative-Learning-for-Young-People-131308256937561/"><i class="fab fa-facebook social-color"></i></a></li>
							<li class="list-inline-item"><a href="https://twitter.com/TechSpaceTweets"><i class="fab fa-twitter-square social-color"></i></a></li>
							<li class="list-inline-item"><a href="https://www.instagram.com/techspacemedia/?hl=en"><i class="fab fa-instagram social-color"></i></a></li>
							<li class="list-inline-item"><a href="https://www.youtube.com/user/TechSpaceMedia/videos"><i class="fab fa-youtube social-color"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
		<hr>
	</div>
</section>
<!-- ./Footer -->
<!-- Bootstrap core JS -->

<?php wp_footer();?>
</body>
</html>

