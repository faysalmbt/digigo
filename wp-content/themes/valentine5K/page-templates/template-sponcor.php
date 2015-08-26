<?php
/*
*	Template Name: Sponsors-V5kk
*/
get_header();
$image_sponsor_top = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'full' ));
?>
<!-- Layer slider section --> 
<div class="container">
	<div class="contimgbx spcloffrimg3" style="background:url(<?php echo $image_sponsor_top ?>) no-repeat; ">
		<div class="hdstrip">
			<h2><?php echo get_the_title(get_the_ID());?></h2>
		</div> 
	</div>
</div>
<!-- Layer Slider Ends -->
<!-- Content Section Here -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin">
				<div class="row">
					<div class="col-lg-12">
					<?php
					$my_query = new WP_Query('post_type=Sponsors&orderby=post_date&order=DESC');
					if($my_query->have_posts()){
					  while ($my_query->have_posts()) { $my_query->the_post();
					  	$image_sponsor = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
					?>  
						<div class="sponsbx clearfix">
							<div class="sponbxlogo col-lg-4">
								<img class=" img-responsive" src="<?php echo $image_sponsor; ?>"  alt="">
							</div>
							<div class="sponbxtext col-lg-8">
								<div>
									<h3><?php the_title(); ?></h3>
									<p><?php the_content(); ?></p>
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>

				</div>
				<div class="clearfix"></div> 
				<br> 
				<?php get_footer(); ?>