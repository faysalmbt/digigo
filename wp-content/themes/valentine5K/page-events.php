<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<!-- Content Section Here -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin">
				<div class="row">
					<div class="col-lg-12">
					  <?php
							// Start the loop.
							while ( have_posts() ) : the_post();
							?>
							<?php the_content(); ?>
							<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="clearfix"></div> 
				<br> 
				<?php get_footer(); ?>



