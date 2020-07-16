<?php

/* ----------------------------------------------------------
Declare vars
------------------------------------------------------------- */
$themename = "Multi IQ";
$shortname = "multiiq";
 
$red = '/css/red.css';
$blue = '/css/blue.css';
$green = '/css/green.css';

$colors = array('red', 'blue', 'green');
array_unshift($colors, "Select A Color Scheme");
 
/*---------------------------------------------------
register settings
----------------------------------------------------*/
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
wp_enqueue_style("panel_style", get_template_directory_uri()."/css/panel.css", false, "1.0", "all");
}
 
/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/
function add_settings_page() {
add_theme_page( 'Color Scheme', 'Color Scheme', 'edit_theme_options', 'multiiq-color-scheme', 'color_options_page' );
}
 
/*---------------------------------------------------
add actions
----------------------------------------------------*/
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );
 
/* ---------------------------------------------------------
Declare options
----------------------------------------------------------- */
$color_scheme = array (
 
array( "name" => $themename." Color Scheme",
"type" => "title"),

/* ---------------------------------------------------------
Color Scheme Section
----------------------------------------------------------- */
array( "name" => "Color Scheme",
"type" => "section"),
array( "type" => "open"),
 
array( "name" => "Featured Color Scheme",
"desc" => "Choose a color thematic color for the site",
"id" => $shortname . "_color_scheme",
"type" => "select",
"options" => $colors,
"std" => "Select A Color Scheme"),
 
array( "type" => "close")
 
);
  
/*---------------------------------------------------
Color Options Panel Output
----------------------------------------------------*/
function color_options_page() {
  global $themename,$colors,$color_scheme,$shortname;

  $i=0;
  $message='';
  if ( 'save' == $_REQUEST['action'] ) {
    
    foreach ($color_scheme as $value) {
      if( isset( $_REQUEST[ $value['id'] ] ) ) { 
        update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
      } 
        else { 
          delete_option( $value['id'] ); 
        } 
    };
    
    foreach ($color_scheme as $value) {
      if( isset( $_REQUEST[ $value['id'] ] ) ) { 
        update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
      } 
        else { 
          delete_option( $value['id'] ); 
        } 
    };
    $message='saved';
  }
  else if( 'reset' == $_REQUEST['action'] ) {
      
    foreach ($color_scheme as $value) {
      delete_option( $value['id'] ); }
    $message='reset';     
  }
  
  ?>
  <div class="wrap options_wrap">
    <div id="icon-options-general"></div>
    <h2><?php _e( ' Color Options', 'multi-iq' ) //your admin panel title ?></h2>
    <?php
    if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated">
    <p>'.$themename.' settings saved.</strong></p></div>';
    if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated">
    <p>'.$themename.' settings reset.</strong></p></div>';
    ?>

    <div class="content_options">
      <form method="post">
  
      <?php foreach ($color_scheme as $value) {
      
        switch ( $value['type'] ) {
        
          case "open": ?>
          <?php break;
          
          case "close": ?>
          </div>
          </div><br />
          <?php break;
          
          case "title": ?>

          <?php break;

          case 'select': ?>
          <div class="option_input option_select">
          <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
          <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
          <?php foreach ($value['options'] as $option) { ?>
              <option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
          <?php } ?>
          </select>
          <small><?php echo $value['desc']; ?></small>
          <div class="clearfix"></div>
          </div>
          <?php break;
          
          case "section":
          $i++; ?>
          <div class="input_section">
          <div class="input_title">
             
            <h3><img src="<?php echo get_template_directory_uri();?>/images/options.png" alt="">&nbsp;<?php echo $value['name']; ?></h3>
            <span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="Save changes" /></span>
            <div class="clearfix"></div>
          </div>
          <div class="all_options">
          <?php break;
           
        }
      }?>

      <input type="hidden" name="action" value="save" />
      </form>
      <form method="post">
        <p class="submit">
        <input name="reset" type="submit" value="Reset" />
        <input type="hidden" name="action" value="reset" />
        </p>
      </form>
    </div>
  </div>
  <?php }