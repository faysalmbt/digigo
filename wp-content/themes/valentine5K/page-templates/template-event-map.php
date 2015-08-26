<?php
/*
*	Template Name: Event-Map
*/
get_header();
?>
<!-- Layer slider section --> 
<div class="container">
	<div class="contimgbx spcloffrimg2">
		<div>
			<iframe width="100%" height="500" frameborder="0" style="border:0" 
			src="<?php $post_object = get_post(get_the_ID()); echo $post_object->post_content; ?>" allowfullscreen>
		</iframe>
	</div>
<!-- 		<div class="hdstrip">
			<h2>Map</h2> 
		</div>  -->
	</div>
</div>
<!-- Layer Slider Ends -->
<!-- Content Section Here -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin	">
				<div class="row">
					<div class="col-lg-9">

						<div class="poplbx"> 
							<ul>
								<li><h3>Most Popular</h3></li>
								<?php 
								$args = array(
									'category_name'    => 'Most Popular',
									'orderby'          => 'date',
									'order'            => 'DESC',
									'post_type'        => 'post',
									'post_status'      => 'publish',
									'numberposts' 		 => 10,
									);
								$posts_array = get_posts( $args );
								foreach ($posts_array as $mypost) {
									?>
									<li><?php echo $event_content = $mypost->post_title; ?></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="getreg">
								<a href="<?php echo $get_register; ?>" class="btn btn-default btn-block">Get Registered</a>
							</div>
							<div> <br> 
								<!--<button class="btn btn-default btn-block btn-grey" type="submit">Pricing & Shedule</button><br> <br>-->
							</div>
							<div align="center" class="imag-banner"><?php if ( is_active_sidebar( 'sidebar-1' ) ) { dynamic_sidebar('sidebar-1'); }else{ ?><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-ad.jpg"  alt=""><?php } ?></div>
						</div>
					</div>
					<div class="clearfix"></div> 
					<br>					
					<?php get_footer(); ?>