<?php
//show_admin_bar( false );
/**
 * Valentine5K functions and definitions
**/
if (!function_exists('custom_sidebar_VR')){
	// Register Sidebar
	function custom_sidebar_VR() {

		$args = array(
			'name'          => __( 'Home Sidebar', 'Valentineride' ),
			'id'            => 'sidebar-6',
			'description'   => '',
			'class'         => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '' 
		); 
		register_sidebar( $args );
		 register_sidebar(array(
        'name' => 'Footer Left',
        'id'   => 'footer-left-widget',
        'description'   => 'Left Footer widget position.',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Center',
        'id'   => 'footer-center-widget',
        'description'   => 'Centre Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Right',
        'id'   => 'footer-right-widget',
        'description'   => 'Right Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
	}
}
custom_sidebar_VR();
// Add .active class to menu
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}
/**
* create custom fields for page special-offer
*/
if(!function_exists('offer_meta_VR')){
  function offer_meta_VR(){
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
    if($template_file == 'page-templates/template-special-offers.php')
    {
    add_meta_box('img-title','ImageTitle','image_title_VR','page','normal','low');
    add_meta_box('loc_title','Location','loc_VR','page','normal','low');
    add_meta_box('travel_time','Travel Time','travel_time_VR','page','normal','low');
    add_meta_box('travel_team','Team','travel_team_VR','page','normal','low');
    
    add_meta_box('meta_data','Meta Boxes','offer_meta_data_VR','page','normal','low');
    }
    if($template_file == 'home.php')
    {
      add_meta_box('header-text','Header Bar Text','header_bar_text_VR','page','normal','low');
    }
  }
  function image_title_VR($offer){
  	$img_title = get_post_meta($offer->ID, 'image_title', true);
    $extra_data = get_post_meta($offer->ID, 'extra_data', true);
  	echo 'Title:</br>';
    echo '<input type="text" name="image_title" class="large-text" value="'. $img_title .'"></br>';
    echo 'Extra Data:</br>';
    echo '<input type="text" name="extra_data" class="large-text" value="'. $extra_data .'"></br>';
  }

  function header_bar_text_VR($offer){
    $header_text = get_post_meta($offer->ID, 'header_text', true);
    $header_link = get_post_meta($offer->ID, 'header_link', true);
    echo 'Text:</br>';
    echo '<input type="text" name="header_text" class="large-text" value="'. $header_text .'"></br>';
    echo 'Link:</br>';
    echo '<input type="text" name="header_link" class="large-text" value="'. $header_link .'"></br>';
  }
  function loc_VR($offer){
    $loc_title = get_post_meta($offer->ID, 'loc_title', true);
    $content  = get_post_meta($offer->ID, 'address', true);
    echo 'Title:</br>';
    echo '<input type="text" name="loc_title" class="large-text" value="'. $loc_title .'"></br>';
    $settings = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id = 'addEditor';
    wp_editor( $content, $editor_id, $settings );
  }
  function travel_time_VR($offer){
    $travel_title = get_post_meta($offer->ID, 'travel_title', true);
    $content  = get_post_meta($offer->ID, 'travel_time', true);
    echo 'Title:</br>';
    echo '<input type="text" name="travel_title" class="large-text" value="'. $travel_title .'"></br>';
    $settings = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id = 'timeEditor';
    wp_editor( $content, $editor_id, $settings );
  }
  function travel_team_VR($offer){
    $team1_title = get_post_meta($offer->ID, 'team1_title', true);
    $content1  = get_post_meta($offer->ID, 'team1_desc', true);
    echo 'TEAM 1:</br>';
    echo '<input type="text" name="team1_title" class="large-text" value="'. $team1_title .'"></br>';
    $settings1 = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id1 = 'team1Editor';
    wp_editor( $content1, $editor_id1, $settings1 );
    $team2_title = get_post_meta($offer->ID, 'team2_title', true);
    $content2  = get_post_meta($offer->ID, 'team2_desc', true);
    echo 'TEAM 2:</br>';
    echo '<input type="text" name="team2_title" class="large-text" value="'. $team2_title .'"></br>';
    $settings2 = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id2 = 'team2Editor';
    wp_editor( $content2, $editor_id2, $settings2 );
    $team3_title = get_post_meta($offer->ID, 'team3_title', true);
    $content3  = get_post_meta($offer->ID, 'team3_desc', true);
    echo 'TEAM 3:</br>';
    echo '<input type="text" name="team3_title" class="large-text" value="'. $team3_title .'"></br>';
    $settings3 = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id3 = 'team3Editor';
    wp_editor( $content3, $editor_id3, $settings3 );
  }
 
  function offer_meta_data_VR($offer){
    $box1_title = get_post_meta($offer->ID, 'box1_title', true);
    $content1  = get_post_meta($offer->ID, 'box1_desc', true);
    echo 'META BOX 1:</br>';
    echo '<input type="text" name="box1_title" class="large-text" value="'. $box1_title .'"></br>';
    $settings1 = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id1 = 'box1Editor';
    wp_editor( $content1, $editor_id1, $settings1 );
    $box2_title = get_post_meta($offer->ID, 'box2_title', true);
    $content2  = get_post_meta($offer->ID, 'box2_desc', true);
    echo 'META BOX 2:</br>';
    echo '<input type="text" name="box2_title" class="large-text" value="'. $box2_title .'"></br>';
    $settings2 = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id2 = 'box2Editor';
    wp_editor( $content2, $editor_id2, $settings2 );
    $box3_title = get_post_meta($offer->ID, 'box3_title', true);
    $content3  = get_post_meta($offer->ID, 'box3_desc', true);
    echo 'META BOX 3:</br>';
    echo '<input type="text" name="box3_title" class="large-text" value="'. $box3_title .'"></br>';
    $settings3 = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id3 = 'box3Editor';
    wp_editor( $content3, $editor_id3, $settings3 );
    $box4_title = get_post_meta($offer->ID, 'box4_title', true);
    $content4  = get_post_meta($offer->ID, 'box4_desc', true);
    echo 'META BOX 4:</br>';
    echo '<input type="text" name="box4_title" class="large-text" value="'. $box4_title .'"></br>';
    $settings4 = array('media_buttons' => false,'textarea_rows' => 5);
    $editor_id4 = 'box4Editor';
    wp_editor( $content4, $editor_id4, $settings4 );
  }
  add_action( 'admin_init', 'offer_meta_VR' );  
}

add_action( 'save_post', 'add_offer_meta', 10, 2 );
function add_offer_meta($offer_id, $offer) {
  if ( isset($_POST["image_title"]) && $_POST["image_title"] != " " ) {
    update_post_meta($offer_id, 'image_title', $_POST['image_title'] );
  }
  if ( isset($_POST["extra_data"]) && $_POST["extra_data"] != " " ) {
    update_post_meta($offer_id, 'extra_data', $_POST['extra_data'] );
  }
  if ( isset($_POST["header_text"]) && $_POST["header_text"] != " " ) {
    update_post_meta($offer_id, 'header_text', $_POST['header_text'] );
  }
  if ( isset($_POST["header_link"]) && $_POST["header_link"] != " " ) {
    update_post_meta($offer_id, 'header_link', $_POST['header_link'] );
  }
  if ( isset($_POST["loc_title"]) && $_POST["loc_title"] != " " ) {
    update_post_meta($offer_id, 'loc_title', $_POST['loc_title'] );
  }
  if ( isset($_POST["addEditor"]) && $_POST["addEditor"] != " " ) {
    update_post_meta($offer_id, 'address', $_POST['addEditor'] );
  }
  if ( isset($_POST["travel_title"]) && $_POST["travel_title"] != " " ) {
    update_post_meta($offer_id, 'travel_title', $_POST['travel_title'] );
  }
  if ( isset($_POST["timeEditor"]) && $_POST["timeEditor"] != " " ) {
    update_post_meta($offer_id, 'travel_time', $_POST['timeEditor'] );
  }
  if ( isset($_POST["team1_title"]) && $_POST["team1_title"] != " " ) {
    update_post_meta($offer_id, 'team1_title', $_POST['team1_title'] );
  }
  if ( isset($_POST["team1Editor"]) && $_POST["team1Editor"] != " " ) {
    update_post_meta($offer_id, 'team1_desc', $_POST['team1Editor'] );
  }
  if ( isset($_POST["team2_title"]) && $_POST["team2_title"] != " " ) {
    update_post_meta($offer_id, 'team2_title', $_POST['team2_title'] );
  }
  if ( isset($_POST["team2Editor"]) && $_POST["team2Editor"] != " " ) {
    update_post_meta($offer_id, 'team2_desc', $_POST['team2Editor'] );
  }
  if ( isset($_POST["team3_title"]) && $_POST["team3_title"] != " " ) {
    update_post_meta($offer_id, 'team3_title', $_POST['team3_title'] );
  }
  if ( isset($_POST["team3Editor"]) && $_POST["team3Editor"] != " " ) {
    update_post_meta($offer_id, 'team3_desc', $_POST['team3Editor'] );
  }
  if ( isset($_POST["box1_title"]) && $_POST["box1_title"] != " " ) {
    update_post_meta($offer_id, 'box1_title', $_POST['box1_title'] );
  }
  if ( isset($_POST["box1Editor"]) && $_POST["box1Editor"] != " " ) {
    update_post_meta($offer_id, 'box1_desc', $_POST['box1Editor'] );
  }
  if ( isset($_POST["box2_title"]) && $_POST["box2_title"] != " " ) {
    update_post_meta($offer_id, 'box2_title', $_POST['box2_title'] );
  }
  if ( isset($_POST["box2Editor"]) && $_POST["box2Editor"] != " " ) {
    update_post_meta($offer_id, 'box2_desc', $_POST['box2Editor'] );
  }
  if ( isset($_POST["box3_title"]) && $_POST["box3_title"] != " " ) {
    update_post_meta($offer_id, 'box3_title', $_POST['box3_title'] );
  }
  if ( isset($_POST["box3Editor"]) && $_POST["box3Editor"] != " " ) {
    update_post_meta($offer_id, 'box3_desc', $_POST['box3Editor'] );
  }
  if ( isset($_POST["box4_title"]) && $_POST["box4_title"] != " " ) {
    update_post_meta($offer_id, 'box4_title', $_POST['box4_title'] );
  }
  if ( isset($_POST["box4Editor"]) && $_POST["box4Editor"] != " " ) {
    update_post_meta($offer_id, 'box4_desc', $_POST['box4Editor'] );
  }
}

/**
 * Attaches the specified template to the page identified by the specified name.
 */
function attach_template_to_page( $page_name, $template_file_name ) {

    // Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
    // Otherwise, set it to the page's ID.
    $page = get_page_by_title( $page_name, OBJECT, 'page' );
    $page_id = null == $page ? -1 : $page->ID;

    // Only attach the template if the page exists
    if( -1 != $page_id ) {
        update_post_meta( $page_id, '_wp_page_template', $template_file_name );
    } // end if

    return $page_id;

} // end attach_template_to_page
function asign_template_homepage(){
attach_template_to_page( 'Home', 'home.php' );
}
add_action( 'after_setup_theme', 'asign_template_homepage' );
/**
* create custom post Sponsors
*/
if(!function_exists('sponsors_VR')){
 function sponsors_VR() {
  $labels = array(
    'name'               => _x( 'Sponsors', 'post type general name' ),
    'singular_name'      => _x( 'Sponsor', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Sponsor' ),
    'add_new_item'       => __( 'Add New Sponsor' ),
    'edit_item'          => __( 'Edit Sponsor' ),
    'new_item'           => __( 'New Sponsor' ),
    'all_items'          => __( 'All Sponsors' ),
    'view_item'          => __( 'View Sponsor' ),
    'search_items'       => __( 'Search Sponsors' ),
    'not_found'          => __( 'No Sponsors found' ),
    'not_found_in_trash' => __( 'No Sponsors found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Sponsors'
    );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail'),
    'has_archive'   => true,
    );
  register_post_type('Sponsors', $args ); 
}
add_action( 'init', 'sponsors_VR' );
}
/**
* create custom post Trainings
*/
if(!function_exists('Trainings_VR')){
 function Trainings_VR() {
  $labels = array(
    'name'               => _x( 'Trainings', 'post type general name' ),
    'singular_name'      => _x( 'Training', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Training' ),
    'add_new_item'       => __( 'Add New Training' ),
    'edit_item'          => __( 'Edit Training' ),
    'new_item'           => __( 'New Training' ),
    'all_items'          => __( 'All Trainings' ),
    'view_item'          => __( 'View Training' ),
    'search_items'       => __( 'Search Trainings' ),
    'not_found'          => __( 'No Trainings found' ),
    'not_found_in_trash' => __( 'No Trainings found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Trainings'
    );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail'),
    'has_archive'   => true,
    );
  register_post_type('trainings', $args ); 
}
add_action( 'init', 'Trainings_VR' );
}

/**
* create meta fields for post Trainings
*/
if(!function_exists('training_meta_VR')){
  function training_meta_VR(){
    add_meta_box('video_link','Training Video URL','training_video_meta','trainings','normal','low');
  }
  function training_video_meta($people){
    $affiliation = get_post_meta($people->ID, 'affiliation', true);
    echo 'Video URL:</br>';
    echo '<input type="text" name="affiliation" class="large-text" value="'. $affiliation .'"></br>';

  }
  add_action( 'admin_init', 'training_meta_VR' );  
}

add_action( 'save_post', 'add_training_meta', 10, 2 );
function add_training_meta($people_id, $people) {

  if ( isset($_POST["affiliation"]) && $_POST["affiliation"] != " " ) {
    update_post_meta($people_id, 'affiliation', $_POST['affiliation'] );
  }
}
  /* limit blog per page hook*/
function blog_archive_post_limit( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    if ( is_archive( 'post' ) ) {
        $query->set( 'posts_per_page', 3 );
        return;
    }
}
add_action( 'pre_get_posts', 'blog_archive_post_limit', 1 );

//To display Single-{post-type}.php

function get_custom_post_type_template_V5K($single_template) {
     global $post;

    if ($post->post_type == 'post') {
     $single_template = dirname( __FILE__ ) . '/page-templates/single-post.php';
    }
    return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template_V5K' );

/**
 * Display archive links based on year/month and format.
 *
 * The date archives will logically display dates with links to the archive post
 * page.
 *
 * The 'limit' argument will only display a limited amount of links, specified
 * by the 'limit' integer value. By default, there is no limit. The
 * 'show_post_count' argument will show how many posts are within the archive.
 * By default, the 'show_post_count' argument is set to false.
 *
 * For the 'format', 'before', and 'after' arguments, see {@link
 * get_archives_link()}. The values of these arguments have to do with that
 * function.
 *
 * @param string|array $args Optional. Override defaults.
 */
function wp_custom_archive($args = '') {
    global $wpdb, $wp_locale;

    $defaults = array(
        'limit' => '5',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if ( '' != $limit ) {
        $limit = absint($limit);
        $limit = ' LIMIT '.$limit;
    }

    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;

    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';

    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';

    if ( !$archive_date_format_over_ride ) {
        $archive_day_date_format = get_option('date_format');
        $archive_week_start_date_format = get_option('date_format');
        $archive_week_end_date_format = get_option('date_format');
    }

    //filters
    $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
    $join = apply_filters('customarchives_join', "", $r);

    $output = '';

        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
        $key = md5($query);
        $cache = wp_cache_get( 'wp_custom_archive' , 'general');
        if ( !isset( $cache[ $key ] ) ) {
            $arcresults = $wpdb->get_results($query);
            $cache[ $key ] = $arcresults;
            wp_cache_set( 'wp_custom_archive', $cache, 'general' );
        } else {
            $arcresults = $cache[ $key ];
        }
        if ( $arcresults ) {
            $afterafter = $after;
            foreach ( (array) $arcresults as $arcresult ) {
                $url = get_month_link( $arcresult->year, $arcresult->month );
                //$year_url = get_year_link($arcresult->year);
                /* translators: 1: month name, 2: 4-digit year */
                $text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
                $year_text = sprintf('%d', $arcresult->year);
                if ( $show_post_count )
                $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;

                $year_output = $year_text;//get_archives_link($year_url, $year_text, $format, $before, $after);              
                
                $output .= ( $arcresult->year != $temp_year ) ? $year_output : '';
                $output .= get_archives_link($url, $text, $format, $before, $after);

                $temp_year = $arcresult->year;
            }
        }

    $output .= '';

    if ( $echo )
      echo $output;
    else
      return $output;
}

// add custom field under general settings
add_filter('admin_init', 'my_general_settings_register_fields');
 
function my_general_settings_register_fields()
{
  register_setting('general', 'msg_field', 'esc_attr');
  add_settings_field('msg_field', '<label for="msg_field">'.__('Button Text' , 'msg_field' ).'</label>' , 'my_general_settings_fields_html', 'general');
  register_setting('general', 'popup_title', 'esc_attr');
  add_settings_field('popup_title', '<label for="popup_title">'.__('PopUp Title' , 'popup_title' ).'</label>' , 'my_general_settings_fields_html1', 'general');
  register_setting('general', 'popup_text', 'esc_attr');
  add_settings_field('popup_text', '<label for="popup_text">'.__('PopUp Text' , 'popup_text' ).'</label>' , 'my_general_settings_fields_html2', 'general');
  register_setting('general', 'get_register_url', 'esc_attr');
  add_settings_field('get_register_url', '<label for="get_register_url">'.__('Get Register URL' , 'get_register_url' ).'</label>' , 'my_general_settings_fields_html3', 'general');
}
function my_general_settings_fields_html()
{
  $value_msg = get_option( 'msg_field', '' );
  echo '<input type="text" id="msg_field" class="regular-text" name="msg_field" value="' . $value_msg . '" />';
}
function my_general_settings_fields_html1()
{
  $popup_title = get_option( 'popup_title', '' );
  echo '<input type="text" id="popup_title" class="regular-text" name="popup_title" value="' . $popup_title . '" />';
}
function my_general_settings_fields_html2()
{
  $popup_text = get_option( 'popup_text', '' );
  echo '<input type="text" id="popup_text" class="regular-text" name="popup_text" value="' . $popup_text . '" />';
}
function my_general_settings_fields_html3()
{
  $get_register_url = get_option( 'get_register_url', '' );
  echo '<input type="text" id="get_register_url" class="regular-text" name="get_register_url" value="' . $get_register_url . '" />';
}

// meta box with add/remove fields
add_action('admin_init', 'add_meta_boxes', 1);
$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
if($template_file == 'page-templates/template-special-offers.php')
  {
  function add_meta_boxes() {
    add_meta_box( 'repeatable-fields', 'Price Table', 'repeatable_meta_box_display', 'page', 'normal', 'high');
  }
}
function repeatable_meta_box_display() {
  global $post;
  $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
  wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
?>
  <script type="text/javascript">
jQuery(document).ready(function($) {
  $('.metabox_submit').click(function(e) {
    e.preventDefault();
    $('#publish').click();
  });
  $('#add-row').on('click', function() {
    var row = $('.empty-row.screen-reader-text').clone(true);
    row.removeClass('empty-row screen-reader-text');
    row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
    return false;
  });
  $('.remove-row').on('click', function() {
    $(this).parents('tr').remove();
    return false;
  });
  $('#repeatable-fieldset-one tbody').sortable({
    opacity: 0.6,
    revert: true,
    cursor: 'move',
    handle: '.sort'
  });
});
  </script>

  <table id="repeatable-fieldset-one" width="100%">
  <thead>
    <tr>
      <th width="2%"></th>
      <th width="30%">Price</th>
      <th width="60%">Content</th>
      <th width="2%"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  if ( $repeatable_fields ) :
    foreach ( $repeatable_fields as $field ) {
?>
  <tr>
    <td><a class="button remove-row" href="#">-</a></td>
    <td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>

    <td><input type="text" class="widefat" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo ''; ?>" /></td>
    <td><a class="sort"><b>✥</b></a></td>
    
  </tr>
  <?php
    }
  else :
    // show a blank one
?>
  <tr>
    <td><a class="button remove-row" href="#">-</a></td>
    <td><input type="text" class="widefat" name="name[]" /></td>


    <td><input type="text" class="widefat" name="url[]" value="" /></td>
<td><a class="sort"><b>✥</b></a><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></td>
    
  </tr>
  <?php endif; ?>

  <!-- empty hidden one for jQuery -->
  <tr class="empty-row screen-reader-text">
    <td><a class="button remove-row" href="#">-</a></td>
    <td><input type="text" class="widefat" name="name[]" /></td>


    <td><input type="text" class="widefat" name="url[]" value="" /></td>
<td><a class="sort"><b>✥</b></a><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></td>
    
  </tr>
  </tbody>
  </table>

  <p><a id="add-row" class="button" href="#">Add another</a>
  <input type="submit" class="metabox_submit" value="Save" />
  </p>
  
  <?php
}
add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
  if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
    return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if (!current_user_can('edit_post', $post_id))
    return;
  $old = get_post_meta($post_id, 'repeatable_fields', true);
  $new = array();
  $names = $_POST['name'];
  $urls = $_POST['url'];
  $count = count( $names );
  for ( $i = 0; $i < $count; $i++ ) {
    if ( $names[$i] != '' ) :
      $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
    if ( $urls[$i] == 'http://' )
      $new[$i]['url'] = '';
    else
      $new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
    endif;
  }
  if ( !empty( $new ) && $new != $old )
    update_post_meta( $post_id, 'repeatable_fields', $new );
  elseif ( empty($new) && $old )
    delete_post_meta( $post_id, 'repeatable_fields', $old );
}




// Ensure cart contents update when products are added to the cart via AJAX 
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
  ob_start();
  ?>
  <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
  <?php
  
  $fragments['a.cart-contents'] = ob_get_clean();
  
  return $fragments;
}