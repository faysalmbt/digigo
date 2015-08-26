<?php
get_header();
$image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'full' ));
?>
<!-- Layer slider section --> 
<div class="container">
	<div class="contimgbx spcloffrimg5">
		<div class="hdstrip">
			<h2>Blog</h2> 
		</div> 
		<div class="  clearfix">
			<div class="hdstrip2 blgstrp hdstripblg">
				<p><?php $post_object = get_post(get_the_ID()); echo substr($post_object->post_content,0,150); ?></p>
			</div>
		</div>
	</div>
</div>
<!-- Layer Slider Ends -->
<!-- Content Section Here -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin blogbx">
				<div class="row"> 
					<div class="col-lg-8">
						<?php
						$year     = get_query_var('year');
						$monthnum = get_query_var('monthnum');
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						if ( get_query_var('paged') )
							$paged = get_query_var('paged');
						elseif ( get_query_var('page') )
							$paged = get_query_var('page');
						else
							$paged = 1;
						query_posts(array(
							'post_type'      => 'post',
							'paged'          => $paged,
							'posts_per_page' => 3,
							'nopaging' => false,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field'    => 'slug',
									'terms'    => 'blog',
									),
								),
							'date_query' => array(
								array(
									'year'  => $year,
									'month' => $monthnum,
								),
							),
							));
						if ( have_posts() ) : 
							while ( have_posts() ) : the_post();
						$post_id = get_the_ID();
						$image_post = wp_get_attachment_url( get_post_thumbnail_id($post_id));
						?>
						<div class="blgpst">
							<h2><?php echo $event_content = $mypost->post_title; ?></h2>
							<div class="pstinfo clearfix">Published on <?php echo date_format(date_create($post->post_date), 'F j, Y'); ?> by <?php echo the_author_meta( 'user_nicename' , $author_id ); ?>
								<span class="pull-right">
									<?php echo do_shortcode('[feather_share]'); ?>
								</span>
							</div>
							<div><?php if(!empty($image_post)){ ?><img class="img-responsive" src="<?php echo $image_post; ?>" width="100%" alt=""><?php }else{?><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-img.jpg" alt=""><?php } ?></div>
							<p><?php echo substr(get_the_content(), 0, 200); ?></p>
							<p class="rdmor"><a href="<?php echo $permalink = get_permalink( $post_id ); ?>">Read More</a></p>
						</div>
					<?php endwhile; ?>
					<?php //my_pagination(); ?>
					<div>
						<nav>
							<ul class="pagination">
								<?php if(function_exists('wp_paginate')) {
									wp_paginate();
								}

								?> 
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="secarch"> 
						<h2>Archived</h2>
						<ul class="arcyr">
							<?php wp_custom_archive(); ?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="clearfix"></div> 
		<br> 

		<?php get_footer(); ?>