<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 **
 * @package WordPress
 * @subpackage CoP_Members
 * @since 1.0.0
 */

?>


<section id="footer">
	<div class="container">
		<hr>
		<div class="row text-center text-xs-center text-sm-left text-md-left">
			<div class="col-md-3 mx-auto">
				<img src="<?php echo get_template_directory_uri(); ?>/images/camaralogo.png" alt="Camara Education Ireland" class="img-responsive">
				<p class="copyright"> &copy; Camara Education Ireland</p>

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
				<div class="row">
					<div class="container">
						<ul class="list-unstyled quick-links">
							<h3 class="footer-title">Advanced Learning Pathway</h3>
							<li class="footer-small-texts">Session Plans</li>
						</ul>
					</div>
				</div>

			</div>

			<div class="col-md-3">
				<div class="row">
					<div class="container">
						<h3 class="footer-title">Program Planning</h3>
						<ul class="list-unstyled quick-links">
							<li class="footer-small-texts">Planning</li>
							<li class="footer-small-texts">Funding</li>
							<li class="footer-small-texts">Imapct & Reporting</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<ul class="list-unstyled quick-links">
							<h3 class="footer-title">Professional Development</h3>
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
							<li class="footer-small-texts">Help Centre</li>
							<li class="footer-small-texts">TechSpace Directory</li>
							<li class="footer-small-texts">Community Code of Conduct</li>
							<li class="footer-small-texts">Contact Us</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<ul class="list-unstyled quick-links">
							<li class="list-inline-item"><a href="#"><i class="fa fa-facebook fa-lg social-color"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-twitter social-color"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-instagram social-color"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus social-color"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-envelope social-color"></i></a></li>
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

