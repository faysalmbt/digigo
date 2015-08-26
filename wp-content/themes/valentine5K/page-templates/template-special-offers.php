<?php
/*
*	Template Name: Special-Offers
*/
get_header();
$image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'full' ));
// main image
$img_title = get_post_meta(get_the_ID(), 'image_title', true);
$extra_data = get_post_meta(get_the_ID(), 'extra_data', true);
//location box , time box
$loc_title = get_post_meta(get_the_ID(), 'loc_title', true);
$content_loc  = get_post_meta(get_the_ID(), 'address', true);
$travel_title = get_post_meta(get_the_ID(), 'travel_title', true);
$content_travel  = get_post_meta(get_the_ID(), 'travel_time', true);
//team
$team1_title = get_post_meta(get_the_ID(), 'team1_title', true);
$content1  = get_post_meta(get_the_ID(), 'team1_desc', true);
$team2_title = get_post_meta(get_the_ID(), 'team2_title', true);
$content2  = get_post_meta(get_the_ID(), 'team2_desc', true);
$team3_title = get_post_meta(get_the_ID(), 'team3_title', true);
$content3  = get_post_meta(get_the_ID(), 'team3_desc', true);
// meta data boxes
$box1_title = get_post_meta(get_the_ID(), 'box1_title', true);
$contentbox1  = get_post_meta(get_the_ID(), 'box1_desc', true);
$box2_title = get_post_meta(get_the_ID(), 'box2_title', true);
$contentbox2  = get_post_meta(get_the_ID(), 'box2_desc', true);
$box3_title = get_post_meta(get_the_ID(), 'box3_title', true);
$contentbox3  = get_post_meta(get_the_ID(), 'box3_desc', true);
$box4_title = get_post_meta(get_the_ID(), 'box4_title', true);
$contentbox4  = get_post_meta(get_the_ID(), 'box4_desc', true);
// price
// $price1 = get_post_meta(get_the_ID(), 'price1', true);
// $desc1 = get_post_meta(get_the_ID(), 'desc1', true);
// $price2 = get_post_meta(get_the_ID(), 'price2', true);
// $desc2 = get_post_meta(get_the_ID(), 'desc2', true);
// $price3 = get_post_meta(get_the_ID(), 'price3', true);
// $desc3 = get_post_meta(get_the_ID(), 'desc3', true);
$get_register =  $get_register_url = get_option( 'get_register_url', '' );
?>
<!-- Layer slider section --> 
<div class="container">
	<div class="contimgbx imgin1" style="background:url(<?php echo $image ?>) no-repeat; ">
		<div class="hdstrip">
			<h2><?php echo $img_title; ?></h2>  

		</div>
		<div class=" container clearfix">
			<div class="hdstrip2">
				<h3><?php echo $img_title; ?></h3>
				<h3><?php echo $extra_data; ?></h3>
			</div>
		</div>
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

						<div class="highnote clearfix">

							<div class="highnotein">
								<h3><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-pin.png" width="50" height="50" alt=""></span><?php echo $loc_title; ?></h3>
								<div>
									<p><?php echo $content_loc; ?></p>
								</div> 
							</div>

							<div class="highnotein">
								<h3><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-clock.png" width="50" height="50" alt=""></span><?php echo $travel_title; ?></h3>
								<div>
									<p><?php echo $content_travel; ?></p>
								</div> 
							</div>


						</div>

						<div class="txtsec1">
							<?php if (have_posts()){ the_post();?>
							<h2><?php the_title();?></h2>
							<p><?php the_content();?></p>
							<?php } ?>
						</div>

						<div class="txtsec1 noborder">
							<h2>Team</h2>
							<h4><?php echo $team1_title; ?></h4>
							<p><?php echo $content1; ?></p>

							<h4><?php echo $team2_title; ?></h4>

							<p><?php echo $content2; ?></p>
							<h4><?php echo $team3_title; ?></h4>
							<p><?php echo $content3; ?></p>
						</div>
						<div class="txtsec1 noborder" style="margin-bottom:20px"><h2>Pricing</h2> </div> 
						<?php 
							$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
							if(!empty($repeatable_fields)){
								foreach ($repeatable_fields as $price_field) {
						?>
						<div class="noborder"> 
							<div class="rdstrp clearfix">
								<span class="tcktprc"><?php echo $price_field["name"]; ?></span>
								<span class="tckttxt"><?php echo $price_field["url"]; ?></span>
							</div>
						</div>
						<?php }} ?>
<!-- 						<div class=" noborder"> 
							<div class="rdstrp clearfix">
								<span class="tcktprc"><?php echo $price1; ?></span>
								<span class="tckttxt"><?php echo $desc2; ?></span>
							</div>
						</div>

						<div class="  noborder">

							<div class="rdstrp clearfix">
								<span class="tcktprc"><?php echo $price2; ?></span>
								<span class="tckttxt"><?php echo $desc2; ?></span>
							</div>
						</div>

						<div class="txtsec1 noborder"> 
							<div class="rdstrp clearfix">
								<span class="tcktprc"><span class="vpstr"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/vip-star.png" width="50" height="50" alt=""></span><?php echo $price3; ?></span>
								<span class="tckttxt"><?php echo $desc3; ?></span>
							</div>
						</div>  -->

					</div>
					<div class="col-lg-3">
						<div class="getreg">
							<a href="<?php echo $get_register; ?>" class="btn btn-default btn-block">Get Registered</a>
						</div>
						<div class="gglmap">
							<div align="center"> <?php 
							$page_map = get_posts(array( 'name' => 'map','post_type' => 'page'));
							$map_url = $page_map[0]->post_content;

							if(!empty($map_url)){
								?>

								<iframe width="100%" height="550" frameborder="0" style="border:1" 
								src="<?php echo $map_url; ?>" allowfullscreen>
							</iframe>
							<?php }else{ ?>
							<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/map.jpg" alt="">
							<?php } ?>
						</div>
						<br>
						<a class="btn btn-default btn-block" href="<?php echo home_url( '/map/' ); ?>">View Full Map</a>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="instucbx" style="background-color:#FFF"> 
					<div class="prtlft">
						<h2><?php echo $box1_title; ?></h2>
						<p><?php echo $contentbox1; ?></p>
					</div> 

					<div class="prtrght">
						<h2><?php echo $box2_title; ?></h2>
						<p><?php echo $contentbox2; ?></p>
					</div>


				</div>

				<div class="instucbx  "> 
					<div class="prtlft" style=" background-color:#FFF">
						<h2><?php echo $box3_title; ?></h2>
						<p><?php echo $contentbox3; ?></p>	
					</div> 

					<div class="prtrght"  style=" background-color:#FFF">
						<h2><?php echo $box4_title; ?></h2>
						<p><?php echo $contentbox4; ?></p>	
					</div>


				</div>
			</div>
			<?php get_footer(); ?>