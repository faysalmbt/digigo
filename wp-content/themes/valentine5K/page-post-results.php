<?php
/**
 * The template for displaying pages
 */

get_header(); 
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
?>
<?php
	global $wpdb;
	$tab_pre = $wpdb->prefix;
	$event_id = $_GET["p_id"];
	$action = $_GET['action'];
	$user_id = get_current_user_id();
	// function remove_medialibrary_tab($tabs) {
	// unset($tabs['type_url']);
	// unset($tabs['library']);
	// return $tabs;
	// }
	//add_filter('media_upload_tabs','remove_medialibrary_tab');


	
	if(isset($_POST['submit'])) {
		$event_time = $_POST["event_time"];
		$date_completed = $_POST["date_completed"];
		$link = $_POST["link"];
		$event_name = $_POST["event_name"];
		$type = $_POST["type"];
		$purpose = $_POST["purpose"];
		$description = $_POST["description"];

		$info = pathinfo($_FILES['em_filename']['name']);
		$ext = $info['extension']; // get the extension of the file
		$nm = rand(10,100);
		$newname = "image_".$nm . $ext;
		//$target_dir =  ABSPATH . "wp-content/uploads/resultimages/";
		$target_file = $target = ABSPATH . "wp-content/uploads/resultimages/".$newname;
		$target_url = get_site_url().'/wp-content/uploads/resultimages/'. $newname;
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

		$res = $wpdb->get_results("SELECT * FROM ".$tab_pre."event_results WHERE event_id= $event_id ");
		if(COUNT($res) > 0){
			$wpdb->query("UPDATE wp_event_results SET event_time='$event_time', date_completed='$date_completed',event_link='$link',event_name='$event_name', event_type='$type', event_purpose='$purpose',event_description ='$description',image_url='$target_url' WHERE event_id= $event_id ");
		}else{
				$wpdb->insert("wp_event_results", array(
		   "event_time" => $event_time,
		   "event_id" => $event_id,
		   "date_completed" => $date_completed,
		   "event_link" => $link,
		   "event_name" => $event_name,
		   "event_type" => $type,
		   "event_purpose" => $purpose,
		   "event_description" => $description ,
		   "user_id" => $user_id,
		   "image_url" => $target_url,
			));
		}		
	}
	if($action == "update"){
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
	}

?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="contnt contntin blogbx">
				<div class="pull-right"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Go back</a></div>
				<div class="row"> 
					<div id="primary" class="content-area">
						<main id="main" class="site-main dashboard-form" role="main">
							<div class="col-lg-1"></div>
							<div class="col-lg-10">
								<h1 style="margin-bottom:15px;">Post Event Results</h1>
								<form data-toggle="validator" role="form" class="form-horizontal form-inline" id="postresults" method='post' action='' enctype="multipart/form-data">
									<fieldset>
										<div class="control-group">
											
											<div class="controls">
												<label class="control-label col-md-2 text-left">Time:</label>
												<input type="text" id="event_time" class="form-control" name="event_time" value="<?php echo $update_event_time; ?>"required>
												<input type="hidden" id="event_id" class="form-control" name="event_id" value="<?php echo $event_id; ?>" >
												<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" >
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">
												<label class="control-label col-md-2 text-left">Date Compelted:</label>
												<input type="text" id="date_completed" class="form-control" name="date_completed" value="<?php echo $update_date_completed; ?>" required>
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">
												<label class="control-label col-md-2 text-left">Link:</label>
												<input type="url" id="link" name="link"  class="form-control" data-error="Bruh, Invalid URL" required value="<?php echo $update_event_link; ?>" >
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">
												<label class="control-label col-md-2 text-left">Event Name:</label>
												<input type="text" id="event_name" class="form-control" name="event_name" value="<?php echo $update_event_name; ?>" required>
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">
												<label class="control-label col-md-2 text-left" >Type:</label>
												<input type="text" id="type" name="type" class="form-control" value="<?php echo $update_event_type; ?>"required>
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">
												<label class="control-label col-md-2 text-left">Purpose:</label>
												<input type="text" id="purpose" name="purpose" class="form-control" value="<?php echo $update_event_purpose; ?>"required>
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">
												<label class="control-label col-md-2 text-left">Description:</label>
												<textarea name="description" rows="3" class="input-xlarge fullwidth">
													<?php echo $update_event_description; ?>
												</textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label col-md-2 text-left">:</label>
											<img src="<?php echo $image_url; ?>" height="175" width="175">
											<!-- <label class="control-label">Upload Image:</label> -->
											<div class="controls">
												<label class="control-label col-md-2 text-left"></label>
												<input type="file" name="fileToUpload" id="fileToUpload">
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">

												<label class="control-label col-md-2 text-left"></label>
												<input type="submit" name="submit" class="btn btn-success" value="submit">
											</div>
										</div>
									</fieldset>
								</form>
						    </div>
						    <div class="clearfix"></div>
						</main><!-- .site-main -->
					</div><!-- .content-area -->
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#date_completed').datepicker({
		dateFormat : 'yy-mm-dd'
	});
	// jQuery('#postresults').validator();

});
</script>
<?php get_footer(); ?>
