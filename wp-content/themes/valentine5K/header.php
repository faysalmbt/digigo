<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <!-- Bootstrap -->
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/stylesheet.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style_mbt.css" rel="stylesheet">
  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
    	<!-- Header Section -->
    	<header id="header">
    		<div class="headstrip">
    			<div class="container">
    				<div class="row">
    					<div class="col-lg-12 ">

    						<div class="stripbx clearfix">
                <div class="pull-right">
    							 <?php
                $header_text = get_post_meta(56, 'header_text', true);
                $header_link = get_post_meta(56, 'header_link', true);
                ?>
                <strong><a href="<?php echo $header_link; ?>" target="_blank"><?php echo $header_text; ?></a></strong>
                    <div class="login_wraper">
                      
                      <span class="login_style" ><?php add_modal_login_link(); ?><?php if (is_user_logged_in()){?>|<a href="<?php echo home_url('/user-dashboard/'); ?>">Dashboard</a><?php } ?></span>
                      <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
                    </div>  
                  </div>

    							<span class="pull-left">
                    <?php echo do_shortcode( '[cn-social-icon]' ); ?>
                  </span>
                </div>

              </div>
            </div>
          </div>
        </div> 

      <!-- Navigation -->
      <nav class="navbar  " role="navigation">
        <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
        
         <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><?php show_easylogo(); ?></a>
        </div>
       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      
          <?php

          $args = array(
            'theme_location'  => '',
            'menu'            => 'valentineride-menu',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav" >%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
            );

          wp_nav_menu( $args );
          ?>

    			
    			</div>
    			<!-- /.navbar-collapse -->
    		</div>
    		<!-- /.container -->
    	</nav>
    	<!-- Header Ends -->
      </header>