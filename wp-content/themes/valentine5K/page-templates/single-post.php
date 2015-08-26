<?php
/*
*	 This template is use for single blog post
*/ 
get_header();
?>
<!-- Content Section Here -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin blogbx">
				<div class="row">
					<?php
					while(have_posts()): the_post();
					$image_post = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); 
					?>  
					<div class="col-lg-8">
						<div class="blgpst">
							<h2><?php the_title(); ?></h2>
							<div class="pstinfo clearfix">Published on <?php echo date_format(date_create($post->post_date), 'F j, Y'); ?> by <?php echo the_author_meta( 'user_nicename' , $author_id ); ?>
								<span class="pull-right">
									<?php echo do_shortcode('[feather_share]'); ?>
								</span>
							</div>
							<div><?php if(!empty($image_post)){ ?><img class="img-responsive" src="<?php echo $image_post; ?>" width="100%" alt=""><?php }else{?><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-img.jpg" alt=""><?php } ?></div>
							<p><?php echo substr(get_the_content(), 0, 200); ?></p>
							<p><?php echo substr(get_the_content(), 200, 450); ?></p>
							<p><?php echo substr(get_the_content(), 450); ?></p>
						</div> 					
					</div>
					<?php endwhile; ?>
					<div class="col-lg-4">
						<div class="secarch"> 
							<h2>Most Popular</h2>
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
							//print_r($posts_array);
							foreach ($posts_array as $mypost) {
								$image_popular = wp_get_attachment_url( get_post_thumbnail_id( $mypost->ID)); 
								?>
								<ul class="arcyr">
									<li><h4><strong><a href="<?php echo $permalink = get_permalink( $mypost->ID ); ?>"><?php echo $postTitle = $mypost->post_title; ?></a></strong></h4>
									</li>
									<li>
										<?php if(!empty($image_popular)){ ?>
										<a href="#"><img src="<?php echo $image_popular; ?>" width="299" height="163" alt="" class="img-responsive"></a>
										<?php }else{ ?>
										<a href="#"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-sml.jpg" width="299" height="163" alt=""></a>
										<?php } ?>
									</li> 
								</ul>
								<?php } ?>
							</div> 
						</div>
					</div>
					<div class="clearfix"></div> 
					<br> 
					<?php get_footer(); ?>