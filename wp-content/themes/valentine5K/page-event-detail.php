<?php
/**
 * The template for displaying pages
 */

get_header(); 

?>
<?php
	global $wpdb;
	$tab_pre = $wpdb->prefix;
	$event_id = $_GET["p_id"];
	$order_id = $_GET["o_id"];
	$action = $_GET['action'];
	$user_id = get_current_user_id();
	$end_date_event = get_post_meta($order_id,"datetimepickerend",true);
	$distance = get_post_meta($order_id,"distance",true);
		$res = $wpdb->get_results("SELECT * FROM ".$tab_pre."event_results WHERE event_id= $event_id ");
		//print_r($res);
		foreach ($res as $key => $myres) {
			$id = $myres->ID;
			$update_event_time = $myres->event_time;
			$update_date_completed = $myres->date_completed;
			$update_event_link = $myres->event_link;
			$update_event_type = $myres->event_type;
			$update_event_purpose = $myres->event_purpose;
			$update_event_description = $myres->event_description;
			$update_event_name = $myres->event_name;
			$image_url = $myres->image_url;
		}
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin blogbx">
				<div class="pull-right"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Go back</a></div>
				<div class="row"> 
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">
						<h1>Event Detail</h1>
						<div class="col-lg-12">
							<div class="col-lg-4 text-left">	
								<label>Date/Time Completed:</label>
							</div>
							<div class="col-lg-6">								
								<?php echo $end_date_event; ?>
							</div>	
						</div>
						<div class="col-lg-12">
							<div class="col-lg-4 text-left">	
								<label>Event Name:</label>
							</div>
							<div class="col-lg-6">								
								<?php echo $update_event_name; ?>
							</div>	
						</div>
						<div class="col-lg-12">
							<div class="col-lg-4 text-left">	
								<label>Type:</label>
							</div>
							<div class="col-lg-6">								
								<?php echo $update_event_type; ?>
							</div>	
						</div>
						<div class="col-lg-12">
							<div class="col-lg-4 text-left">	
								<label>Distance:</label>
							</div>
							<div class="col-lg-6">								
								<?php echo $distance; ?>
							</div>	
						</div>
						<div class="col-lg-12">
							<div class="col-lg-4 text-left">	
								<label>My Race Time:</label>
							</div>
							<div class="col-lg-6">								
								<?php echo $update_event_time; ?>
							</div>	
						</div>
						<div class="col-lg-12">
							<div class="col-lg-4 text-left">	
								<label>Link:</label>
							</div>
							<div class="col-lg-6">								
								<?php echo $update_event_link; ?>
							</div>	
						</div>
						<div class="col-lg-12">
							<div class="col-lg-4 text-left">	
								<label>Description:</label>
							</div>
							<div class="col-lg-6">								
								<?php echo $update_event_description; ?>
							</div>	
						</div>
						<div class="col-lg-12">
							<div class="embed-responsive embed-responsive-16by9">
								<img class="img-responsive" src="<?php echo $image_url;?>" alt="" width="550" height="400">
							</div>
						</div>


						<div class="clearfix"></div>	


						</main><!-- .site-main -->
					</div><!-- .content-area -->

<?php get_footer(); ?>
