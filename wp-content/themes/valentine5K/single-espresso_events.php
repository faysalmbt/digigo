<?php
/**
 * Template Name: Event Details
 *
 * This is template will display all of your event's details
 *
 * @ package		Event Espresso - Event Registration and Management Plugin for WordPress
 * @ link			http://www.eventespresso.com
 * @ version		EE4+
 */
get_header(); 
?>

<!-- Content Section Here -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin">
				<div class="row">
					<div class="col-lg-12">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();
							//  Include the post TYPE-specific template for the content.
							espresso_get_template_part( 'content', 'espresso_events' );
							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) {
							// 	comments_template();
							// }
						endwhile;
					?>
					</div>
				</div>
				<div class="clearfix"></div> 
				<br> 
<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();