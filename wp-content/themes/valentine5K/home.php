<?php
/**
* Template Name: valentine5K-home
*/
get_header();
?>

<!-- Layer slider section --> 
<div class="container">
 <div class="slidrbx"> <div class="row">
   <div class="col-lg-12">
    <?php $var = do_shortcode( '[layerslider id="1"]' );echo $var; ?> 
  </div>
</div> </div>
</div>

<!-- Layer Slider Ends -->
<!-- Content Section Here -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="contnt">
        <div class="row">
          <div class="col-lg-8">
           <div class="vidbx embed-responsive embed-responsive-16by9">
            <?php
            if(have_posts()){
              the_post();
              the_content();
            }
            ?> 
          </div>
        </div>
        <div class="col-lg-4">
          <div class="newsbx">
            <h3>Sign up for</h3>
            <h2>News & Deals</h2> 
            <?php 
            echo do_shortcode('[epm_mailchimp]');
            ?>
             <p><a href="#">View Privacy Policy</a></p>
          </div>
        </div>
      </div>
      <div class="row txturin">
        <div class="col-lg-12">
          <div class="txtinf">
            
            <h2><?php if ( is_active_sidebar( 'sidebar-6' ) ) { dynamic_sidebar('sidebar-6'); } ?></h2>

          </div>
        </div>
      </div>
      <?php get_footer(); ?>