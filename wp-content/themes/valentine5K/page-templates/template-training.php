<?php
/*
*	Template Name: Training-V5K
*/
get_header();
$image_sponsor_top = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'full' ));
?>

<!-- Layer slider section --> 
<div class="container">
	<div class="contimgbx spcloffrimg4" style="background:url(<?php echo $image_sponsor_top ?>) no-repeat; ">
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
					<?php
					$my_query = new WP_Query('post_type=trainings&orderby=post_date&order=ASC');
					if($my_query->have_posts()){
						while ($my_query->have_posts()) { $my_query->the_post();
							$image_video = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
							$video_link = get_post_meta(get_the_ID(), 'affiliation', true);
							?>
							<div class=" trnbx col-lg-9 center-block  "> 
								<h2 class="text-left"><?php the_title(); ?></h2>
								<div class="embed-responsive embed-responsive-16by9">
									<?php
									if(!empty($video_link)){
										echo $embed_code = wp_oembed_get($video_link, array('width'=>900,'height'=>450)); 
									}elseif(!empty($image_video)){
										?>
										<img class="img-responsive" src="<?php echo $image_video; ?>" alt="">
										<?php }else{ ?>
										<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/video-thumb2.jpg" alt="">
										<?php } ?>	
									</div>
									<p><?php the_content(); ?>	</p>
								</div>
								<?php }} ?>
								<?php wp_reset_query(); ?> 
							</div>
							<div class="clearfix"></div> 
							<br> 

							<?php get_footer(); ?>