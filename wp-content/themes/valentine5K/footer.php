<?php
/**
 * The template for displaying the footer
 */
?>
<?php 
if(is_page('Home')){
$c = "";
}else{
$c ="footerbxin";
}
?>
<footer class="<?php echo $c; ?>">
	<div class="footerup">
		<?php echo do_shortcode('[logo-carousel id=default]'); ?>
	</div>
  <div class="footerdwn clearfix">
    <?php
      if ( wp_is_mobile() ) {
        $style = "padding-left:92px";
      }else{
        $style = " ";
      }
    ?>
    <div class="blackback  clearfix">

      <div class="footer-wights ">
        <div class="col-lg-4">
          <?php if ( is_active_sidebar( 'sidebar-6' ) ) { dynamic_sidebar('footer-left-widget'); } ?>
        <div><?php echo do_shortcode( '[cn-social-icon]' ); ?>  </div>  
        </div>

        <div class="col-lg-4">
          <div>
          <?php if ( is_active_sidebar( 'sidebar-6' ) ) { dynamic_sidebar('footer-center-widget'); } ?>
        </div>
        </div>
        <div class="col-lg-4">
        <?php if ( is_active_sidebar( 'sidebar-6' ) ) { dynamic_sidebar('footer-right-widget'); } ?>
        
        </div>                
      </div>  
    </div>

  </div>
	
</footer>
</div>
<div class="text-center backblck" > <a href="<?php echo home_url('/'); ?>"><?php echo do_shortcode("[WEBSITE_LOGO]");?></a>
     <div><p>&copy;2015 OceanSide Valentine 5K</p></div>
    </div>
</div>
</div>
</div>
<!-- Content Section Ends --> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap-select.js"></script>
<?php wp_footer(); ?> 
</body>
</html>