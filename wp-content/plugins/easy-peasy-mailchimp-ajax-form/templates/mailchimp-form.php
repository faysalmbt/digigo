<?php 
/**
 * Template file to display the mailchimp form
 * @since    1.0.0
 */

global $epm_options, $current_user;

get_currentuserinfo();
$epm_default_email_value = null;
if(is_user_logged_in()) {
	$epm_default_email_value = $current_user->user_email;
}

?>

<form class="epm-sign-up-form" name="epm-sign-up-form" action="" method="post">

	<?php if(epm_get_option('display_name_fields')) : ?>

	<div class="epm-form-field form-group">
		<label for="epm-first-name"><?php _e('Name','easy-peasy-mailchimp');?></label>
		<input type="text" placeholder="<?php _e('Your Name','easy-peasy-mailchimp');?>" name="epm-first-name" tabindex="7" class="name first-name form-control" id="epm-first-name"/ autocomplete="off">
	</div>

	<div class="epm-form-field form-group" style="display:none">
		<label for="epm-last-name"><?php _e('Last Name','easy-peasy-mailchimp');?></label>
		<input type="text"  placeholder="<?php _e('Last Name','easy-peasy-mailchimp');?>" name="epm-last-name" tabindex="7" class="name last-name form-control" id="epm-last-name"/ value=" ">
	</div>

	<?php endif; ?>

	<!-- <div class="epm-form-field form-group">
		<label for="epm-email"><?php _e('Email Address','easy-peasy-mailchimp');?></label>
		<input type="email" placeholder="<?php _e('Email Address','easy-peasy-mailchimp');?>" name="epm-email" tabindex="8" class="email form-control" id="epm-email" value="<?php echo $epm_default_email_value; ?>" autocomplete="off"/>
	</div> -->

	<div class="epm-form-field form-group">
		<label for="epm-email"><?php _e('Email Address','easy-peasy-mailchimp');?></label>
		<input type="email" placeholder="<?php _e('Email Address','easy-peasy-mailchimp');?>" name="epm-email" tabindex="8" class="email form-control" id="epm-email" value="" autocomplete="off"/>
	</div>

	<input type="hidden" name="epm_submit" id="epm_submit" value="true" />
	<input type="hidden" name="epm_list_id" id="epm_list_id" value="<?php echo $list;?>" />
	<?php  $value_msg = get_option( 'msg_field', '' ); ?>
	
	<input type="submit"  name="epm-submit-chimp" value="<?php _e($value_msg,'easy-peasy-mailchimp');?>" data-wait-text="<?php _e('Please wait...','easy-peasy-mailchimp');?>" tabindex="10" class="btn btn-default btn-block button btn epm-sign-up-button epm-submit-chimp"/>

</form>


<script type="text/javascript">


	 jQuery('input#epm-first-name,input#epm-email').focus(function(){
       jQuery(this).data('placeholder',jQuery(this).attr('placeholder'))
       jQuery(this).attr('placeholder','');
    });
    jQuery('input#epm-first-name,input#epm-email').blur(function(){
       jQuery(this).attr('placeholder',jQuery(this).data('placeholder'));
    });


</script>