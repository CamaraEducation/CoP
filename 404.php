<?php
/**
 * The template for displaying 404 pages (not found)
 *
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
			
	<div class="container" style="margin-top:20px;background-color: #F5F7FA;padding-top:20px;">
		<div class="row h-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6 mb-5">
           <img src="<?php echo get_template_directory_uri(); ?>/images/errorimg.png" alt="" class=" rounded-circle img-fluid mx-auto d-block" style="width:171px;">



        </div>
        <div class="col-md-6">
            <h2 class="error-404 pb-4">404</h2>
            <p class="err-txt">Looks Like You're Lost</p>
            <p class="err-txt1 pb-5">The page you are looking for is not available!</p>
            <p>
            <a href="<?php echo get_site_url() . '/landing/'; ?>" class="err-link">Go to Home Dashboard</a>
        </p>
        </div>
    </div>
	</div>

<?php
get_footer();
