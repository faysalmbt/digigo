<?php
/**
 * The template for displaying Events of a logged in users
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
					<div class="pull-right"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Go back</a></div>
					<div class="row">
						<div class="col-lg-12">
							<?php 
							global $wpdb, $woocommerce;
							$tab_pre = $wpdb->prefix;
							$user_id = get_current_user_id();
							$result_posts = $wpdb->get_results("SELECT ID FROM ".$tab_pre."posts left join ".$tab_pre."postmeta on ".$tab_pre."posts.ID = ".$tab_pre."postmeta.post_id where post_type='shop_order' and meta_key ='_customer_user' and meta_value =  $user_id " );
							if(!empty($result_posts)){
								?>
								<div class="tabbable boxed parentTabs">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#set1" data-toggle="tab">Up Coming Events</a>
										</li>
										<li><a href="#set2" data-toggle="tab">Completed</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade active in" id="set1">
											<div class="tabbable">
												<div class="tab-content">

													<div class="tab-pane fade active in" id="sub11">
														<p>Up Commming Events:</p>
														<div class="table-responsive">
															<table data-role="table" class="ui-responsive table" border="1">
																<thead>
																	<tr>
																		<th>Start Date/Time</th>
																		<th>End Date/Time</th>
																		<th>Event Name</th>
																		<th>Type</th>
																		<th>Distance</th>
																		<th>Post results</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 

																	$table_results = $wpdb->get_results("SELECT event_id FROM wp_event_results",ARRAY_A);

																	$array = array();
																	foreach ($table_results as $res){
																		$array[] = $res["event_id"];
																	}
																	foreach ($result_posts as $key => $post) 
																	{
																		$order_id = $post->ID;
																		$order = new WC_Order($order_id); 
																		$items = $order->get_items();

																		foreach ( $items as $item ) {
																			$product_id_1 = $item['product_id'];														      																      			
																			$end_date = get_post_meta($product_id_1,"datetimepickerend",true);
																			$date_now = date("Y/m/d H:i");
																			$today_dt = strtotime($date_now);
																			$expire_dt = strtotime($end_date);

																			if(!empty($end_date) AND ($today_dt < $expire_dt ) AND !in_array($order_id, $array)){
																				$type = get_the_terms( $product_id_1,  'product_cat' );
																				$type = $type[0]->name;
																				$end_date_event = get_post_meta($product_id_1,"datetimepickerend",true);
																				$event_start_date = get_post_meta($product_id_1,"datetimepickerstart",true);
																				$start_date = strtotime($event_start_date);
																				$product_name = $item['name'];
																				$distance = get_post_meta($product_id_1,"distance",true);

																				?>
																				<tr>
																					<td><?php echo $event_start_date; ?></td>
																					<td><?php echo $end_date_event; ?></td>
																					<td><?php echo $product_name; ?></td>
																					<td><?php echo $type; ?></td>
																					<td><?php echo $distance; ?></td>
																					<?php  $get_page_name = get_home_url().'/post-results'; ?>													          
																					<td><?php if( $today_dt >= $start_date AND !in_array($product_id_1, $array)){ ?><a href="<?php echo $get_page_name.'?p_id='.$order_id ?>" style="color:black;">Post Result</a><?php } ?></td>
																				</tr>
																				<?php }}} ?>
																			</tbody>
																		</table>
																	</div>
																</div>

															</div>
														</div>
													</div>
													<div class="tab-pane fade" id="set2">
														<div class="tabbable">
															<div class="tab-content">
																<p>Completed Events:</p>
																<div class="table-responsive">
																	<table data-role="table" class="ui-responsive table" border="1">
																		<thead>
																			<tr>
																				<th>Date/Time Completed</th>
																				<th>Event Name</th>
																				<th>Type</th>
																				<th>Distance</th>
																				<th>Post results</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 

																			foreach ($result_posts as $key => $post) 
																			{
																				$order_id_completed = $post->ID;
																				$order_comp = new WC_Order($order_id_completed); 
																				$items_comp = $order_comp->get_items();
																				$count = 0;

																				foreach ( $items_comp as $item_comp ) {
																					$product_id_comp = $item_comp['product_id'];

																					$end_date_comp = get_post_meta($product_id_comp,"datetimepickerend",true);
																					$date_now_comp = date("Y/m/d H:i");
																					$today_dt_comp = strtotime($date_now_comp);
																					$expire_dt_comp = strtotime($end_date_comp);


																					if(!empty($end_date_comp) AND ($today_dt_comp > $expire_dt_comp ) OR in_array($order_id_completed, $array)){
																						$type_completed = get_the_terms( $product_id_comp,  'product_cat' );
																						$type_completed = $type_completed[0]->name;
																						$end_date_event_com = get_post_meta($product_id_comp,"datetimepickerend",true);
																						$product_name_com = $item_comp['name'];
																						$distance_com = get_post_meta($product_id_comp,"distance",true);

																						?>
																						<tr>

																							<td><?php echo $end_date_event_com; ?></td>
																							<td><?php echo $product_name_com; ?></td>
																							<td><?php echo $type_completed; ?></td>
																							<td><?php echo $distance_com; ?></td>
																							<?php if($today_dt_comp < $expire_dt_comp){?>
																							<?php  $get_page_name = get_home_url().'/post-results'; ?>
																							<td><a href="<?php echo $get_page_name.'?action=update&p_id='.$order_id_completed ?>" style="color:black;">Update Result</a></td>	
																							<?php }else{ ?>
																							<?php  $get_page_name = get_home_url().'/event-detail'; ?>
																							<td><a href="<?php echo $get_page_name.'?p_id='.$order_id_completed.'&o_id='.$product_id_comp ?>" style="color:black;">More</a></td>
																							<?php }} ?>
																						</tr>
																						<?php }} //}?>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<?php }else{?>
														<h3>You have no upcoming events! Put an event on your calendar today</h3>
														<?php
														echo do_shortcode('[product_category category="live-events"]');} 
														?> 
													</div>
												</div>
												<div class="clearfix"></div> 
												<br>

												<script type="text/javascript">

													jQuery(document).ready(function(){
														jQuery(function () {
															jQuery('#myTab a:last').tab('show')
														})

														jQuery(function()
														{ 
														  //for bootstrap 3 use 'shown.bs.tab' instead of 'shown' in the next line
														  jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
														    //save the latest tab; use cookies if you like 'em better:
														    localStorage.setItem('lastTab', jQuery(e.target).attr('href'));
														  });

														  //go to the latest tab, if it exists:
														  var lastTab = localStorage.getItem('lastTab');
														  if (lastTab) {
														  	jQuery('a[href="'+lastTab+'"]').click();
															}
														});
													});// documnet.ready

												</script>
												<?php get_footer(); ?>



