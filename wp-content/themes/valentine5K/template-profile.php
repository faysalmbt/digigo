<?php
/**
 *  Template Name: Event profile
 */
if (!is_user_logged_in() )
{ nocache_headers();
	wp_redirect( home_url() );
}
get_header(); ?>

<!-- Content Section Here -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin">
				<div class="row">
					<div class="col-lg-12">
                        <div class="center-contents">
                            <a href="<?php echo home_url('/event/'); ?>" class="btn btn-info" role="button">Events</a>
                            <a href="<?php echo home_url('/user-profile/'); ?>" class="btn btn-info" role="button">Profile</a>
                        </div>
					</div>
				</div>
				<div class="clearfix"></div> 
				<br>


<?php get_footer(); ?>



