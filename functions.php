<?php
/**
 * easy_blog functions and definitions
 *
 * @package easy_blog
 * @since easy_blog.0
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! function_exists( 'easy_blog_setup' ) ) :

  add_theme_support( 'post-thumbnails' ); 
  set_post_thumbnail_size( 1200, 628 );
  remove_filter( 'term_description','wpautop' );

function easy_blog_setup(){
   
      if (is_single() || is_page()){
          
        /*
      * Let WordPress manage the document title.
      * By adding theme support, we declare that this theme does not use a
      * hard-coded <title> tag in the document head, and expect WordPress to
      * provide it for us.
      */
        add_theme_support( 'automatic-feed-links' );
       /* Add default posts and comments RSS feed links to <head>.
        */
 
        add_theme_support( 'title-tag' );
      }

}
function theme_slug_setup(){
  add_theme_support( 'title-tag' );
}
add_action('after_setup_theme','theme_slug_setup');

function  easy_blog_script(){
    /**
         * register the styles
         */
        wp_enqueue_style( 'style', get_stylesheet_uri());
        wp_enqueue_style( 'page', get_template_directory_uri().'/css/page.css',array(),
        '1.1','all');
        wp_enqueue_style( 'main-style', get_template_directory_uri().'/css/main.style.css',array(),
        '1.2','all');
        wp_enqueue_style( 'mobile-style', get_template_directory_uri().'/css/mobile.style.css',array(),
        '1.3','all');
       
        wp_enqueue_script('navcontrol',get_template_directory_uri().'/js/navcontrol.js',
        array(), 1.1,true);
        wp_enqueue_script('app',get_template_directory_uri().'/js/app.js',
        array(), 1.1,true);
       /* wp_enqueue_script('firebase-messaging-sw',get_template_directory_uri().'/js/firebase-messaging-sw.js',
        array(), 1.1,true);*/
        wp_enqueue_script('model',get_template_directory_uri().'/js/model.js',
        array(), 1.1,true);
        wp_enqueue_script('control',get_template_directory_uri().'/js/control.js',
        array('jquery'), ' ',true);
        /**Ajax form */
        wp_localize_script( 'control', 'localize', array( '_ajax_url' => admin_url( 'admin-ajax.php' ),
        '_ajax_nonce'=> wp_create_nonce( '_ajax_nonce' )));
        //Theme mode switching ajax script
        wp_enqueue_script('switchtheme',get_template_directory_uri().'/js/switchtheme',
        array('jquery'), ' ',true);
        wp_localize_script( 'switchtheme', 'localize', array( '_object_url' => admin_url( 'admin-ajax.php' ),
        '_object_nonce'=> wp_create_nonce( '_object_nonce' )));
        //set_dark_theme
        }
    
        add_action('wp_enqueue_scripts','easy_blog_script');
//add js module tag
function add_module_to_my_script_tag($tag, $handle, $src){
  if("model"=== $handle){
    $tag ='<script type="module" src="'. esc_url($src).'"></script>';
  }
  return $tag;
}
 /*function add_module_to_my_sw_script_tag($tag, $handle, $src){
 if("firebase-messaging-sw"=== $handle){
    $tag ='<script type="module" src="'. esc_url($src).'"></script>';
  }
  return $tag;
}
*/
function add_module_to_my_app_script_tag($tag, $handle, $src){
  if("app"=== $handle){
    $tag ='<script type="module" src="'. esc_url($src).'"></script>';
  }
  return $tag;
}
add_filter("script_loader_tag", "add_module_to_my_script_tag",10,3);
//add_filter("script_loader_tag", "add_module_to_my_sw_script_tag",10,3);

add_filter("script_loader_tag", "add_module_to_my_app_script_tag",10,3);
 /**Add custom meta tag to a post */
 function easy_blog_custom_meta(){


  global $post;
  $meta_description = strip_tags($post->post_content);
$meta_description = strip_shortcodes($post->post_content);
$meta_description = str_replace(array("\n", "\r", "\t"), ' ', $meta_description);
$meta_description = substr($meta_description, 0, 160);
echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
echo '<meta property="og:url" content="https://www.flourishtimes.com.ng/" />'. "\n";
echo '<meta property="og:type"  content="website" />' . "\n";
echo '<meta property="og:title" content="'.$post->post_title.'/>' . "\n";
echo '<meta property="og:image"         content="https://www.flourishtimes.com.ng/logo.jpg" />'. "\n";
echo '<!--Twitter Card--->'. "\n";
echo '<meta name="twitter:card" content="summary" />'."\n";
echo '<meta name="twitter:site" content="@flourishtimes" />'."\n";
echo '<meta name="twitter:creator" content="@flourishtimes" />'."\n";
echo '<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">'."\n";
echo '<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">'."\n";
echo '<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">'."\n";
echo '<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">'."\n";
echo '<link rel="manifest" href="/manifest.json">'."\n";
echo '<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">'."\n";
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />'. "\n";
//check theme color with cookie
if(isset($_COOKIE['theme-color'])){
  echo '<meta name="msapplication-TileColor" content="#121212">'."\n";
  echo '<meta name="theme-color" content="#121212">'."\n";

}else{
  echo '<meta name="theme-color" content="#CB0101">'."\n";
  echo '<meta name="msapplication-TileColor" content="#CB0101">'."\n";

}
/*if ( is_category() ) {
  $meta_description = strip_tags(category_description());
  echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
  }*/
 }
 add_action( 'wp_head', 'easy_blog_custom_meta');
/*create a database for newsletter subscribers */
function create_newsletter_database(){
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE IF NOT EXISTS newsletter (
    id INT auto_increment,
    email_id VARCHAR(255) NOT NULL,
    date_created datetime,
    is_active BOOLEAN DEFAULT true, 
    PRIMARY KEY (id)
  ) $charset_collate;";
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
}

add_action('init', 'create_newsletter_database');

//Save news letter subscriber details
function save_newsletter_subscriber(){

   // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
     // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $result = json_encode($result);
    echo $result;
 }
 else {
    header("Location: ".$_SERVER["HTTP_REFERER"]);
}
//get email ID from newsletter form via post request
$email_id = test_input($_POST['email']);
//save email in newsletter table
global $wpdb;
$wpdb->show_errors();
//check if user exist in the database
$saved_email= $wpdb->get_row($wpdb->prepare("SELECT email_id FROM newsletter WHERE email_id = %s", $email_id));
if($saved_email !=null){
$error = $wpdb->print_error();
echo 'Failed:' . $error;
} 
else{
  date_default_timezone_get('Africa/Lagos');
  $now = date('Y-m-d H:i:s');
//$now->format('Y-m-d H:i:s');
$wpdb->insert('newsletter',
array('email_id'=>$email_id,'date_created'=>$now),
array('%s','%d'));
//$wpdb->print_m;
echo 'newsletter success';
}
}
add_action( 'wp_ajax_nopriv_save_newsletter_subscriber', 'save_newsletter_subscriber' );
add_action( 'wp_ajax_save_newsletter_subscriber', 'save_newsletter_subscriber' );


 //clean form
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
endif;
/**Display custom data in the admin page */

function show_newsletter_list_menu(){
add_menu_page( 'Newsletter', 'newsletter-sub', 'edit_posts', 'newsletter_sub', 'display_show_newsletter_list','dashicons-mail', 6 );

}
add_action( 'admin_menu', 'show_newsletter_list_menu');
//display newsletter subscribers on the admin dashboard
function display_show_newsletter_list(){
global $wpdb;
$subscribers= $wpdb->get_results("SELECT * FROM newsletter ;");
echo "
<div class='wrap'>
<table class='widefat fixed'>
<tr>
<td>ID</td>
<td>Date</td>
<td>Email</td>
</tr>
";
echo "<tr>";
foreach($subscribers as $sub){
 echo '<td class="manage-column">'.$sub->id."</td>";

  echo '<td class="manage-column">'.$sub->date_created."</td>";
  echo '<td class="manage-column">'.$sub->email_id."</td>";
  echo "</tr>";

  echo "</table>
  </div>";
  
}

}

//Add comment
add_filter( 'comment_form_fields', 'custom_comment_field');

function custom_comment_field($fields){
  //the fields to be controled 
  $comment_field = $fields['comment'];

  $comment_field = $fields['author'];
  $comment_field = $fields['email'];
  $comment_field = $fields['url'];

  $comment_field = $fields['cookies'];

  //The fields you want to unset
  unset($fields['comment']);

  unset($fields['author']);
  unset($fields['email']);
  unset($fields['url']);

  unset($fields['cookies']);

  //customize field and display it to your own taste
  $fields['comment']= '<div class="form-item">
<textarea id="comment" name="comment" aria-label="comment" placeholder="Comment"></textarea>
</div>';
  $fields['author']= ' <div class="form-item">
  <input type="text" name="author" aria-label="name" 
  placeholder="Name"  required >
</div>';
$fields['email'] = '<div class="form-item">
<input type="email" name="email" aria-label="Email" required
placeholder="Your Email" id="email">
</div>';
$fields['url']= ' <div class="form-item">
<input type="text" name="url" aria-label="website url" 
placeholder="Your website address"  >
</div>';


return $fields;
}
//firebase notification service to send push notification to user
function push_messenger_manager(){
  $serverKey='AAAAN6VTwiY:APA91bFeD6D2y4BHvynv2bum0FvNyjahQCp578csrAPqVCBVSHSiNMPV7ZoU4ctBxXpirSxmOafzWsG3awJgkLSVqac6mPR1nnZB6pKOhrINBA-77k87YHZEUJ3HRvbeLtCn3_d0nkD2';
$notification=[
'title' => '',
'body' => '',
'alert' => '',
'sound' => 'default',
];

$data = [
  'title' => '',
  'body'=> '',
  'priority'=> '',
  'content_available'=>true
];
$fcmNotification=[ 
  'to' => '/topics/alerts', 
  'notification' => $notification,  
  'data' => $data, 
  'priority' => 10
];
  $headers=[    'Authorization: key=' . $serverKey,    
  'Content-Type: application/json'];

$fcmUrl = 'https://fcm.googleapis.com/fcm/send';
$cRequest = curl_init();
curl_setopt($cRequest, CURLOPT_URL, $fcmUrl);
curl_setopt($cRequest, CURLOPT_POST, true);
curl_setopt($cRequest, CURLOPT_HTTPHEADER, $headers);
curl_setopt($cRequest, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cRequest, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($cRequest, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
$result = curl_exec($cRequest);
curl_close($cRequest);
return $result;
}

add_action('init','push_messenger_manager');
//set dark theme ajax
function set_dark_theme(){
  // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
    // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
   /* if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      $result = json_encode($result);
      echo $result;
   }
   else {
      header("Location: ".$_SERVER["HTTP_REFERER"]);
   }*/
   set_theme_cookie();

      //change theme color by removing cookie if it exists*/
$theme_mode = $_COOKIE['theme-color'];

 echo   $theme_mode;
}
add_action( 'wp_ajax_nopriv_set_dark_theme', 'set_dark_theme' );
add_action( 'wp_ajax_set_dark_theme', 'set_dark_theme' );
//function to set cookie

function set_theme_cookie(){
  $cookie_value = 'dark-theme';
  if(isset($_COOKIE['theme-color'])) {
    unset($_COOKIE['theme-color']);
  }
  if(!isset($_COOKIE['theme-color'])) {
  
    //delete cookie
    setcookie('theme-color', $cookie_value, time()+31556926); 
  
  
    } 

   
    
}
 ?>
