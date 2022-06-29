<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="<?php language_attributes();?> ">
<meta name="theme-color" content="#CB0101">
<meta name="theme-color" media="(prefers-color-scheme: light)" content="#CB0101">
<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#121212">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="manifest" href="site.webmanifest">
<link rel="icon" type="image/x-icon" href="/favicon.ico">


<?php wp_head();?>
</head>
<style>
  body{
    overflow-x: hidden;
}
  </style>
<body <?php if(isset($_COOKIE['theme-color'])){
echo 'class="'.$_COOKIE['theme-color'].'"';
}

?>>
  <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!--Load Twitter SDK for Javascript-->
<script>
window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
<header>
<section class="top-banner">
<!--Ad banner area-->
<div class="ad-banner">

</div>
</section>

<section class="nav-menu" id="nav-menu">
<div class="mobile">
<button aria-label="mobile-button"class="mobile-menu">
<i class="fa-solid fa-bars"></i>
</button>
</div>
<div class="logo-mobile">
<!--theme logo goes here-->
<a href="/">
<img src="<?php echo get_theme_file_uri('./asset/ftlogo.png') ?>"
alt="flourish times logo">
</a>
</div>
<div class="active-menu">
</div>

<div class="menu-panel" id="menu-panel">
<button aria-label="close-button" class="close-btn">&times;</button>


<nav class="logo">
<!--theme logo goes here-->
<div >
<a href="/">
<img src="<?php echo get_theme_file_uri('./asset/flourish-times-logo-white-new.png') ?>"
alt="flourish times logo">

</a>
</div>
</nav>
<nav class="nav-link">
<?php $cats= get_categories(array('orderby'=>'name',
'order'=>'ASC'));
foreach($cats as $cat):

?>
<div class="link-item">
  <?php  
    $category_id = get_cat_ID( $cat->name );
  $category_link = get_category_link( $category_id ); ?>
<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
</div>
<!--<div class="link-item">
<a href="#">Link 2</a>
</div>
<div class="link-item">
<a href="#">Link 3</a>
</div>-->
<?php endforeach ?>
</nav>
<nav class="menu-control" >
<!--search form-->
<button class="search-btn search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
<button class="option-control">
<i class="fa-solid fa-bars"></i></button>
</nav>
<!--<nav class="menu-control" >
<label class="switch">
<input type="checkbox">
  <span class="slider round"><i class="fa-solid fa-moon"></i>


  </span>
</label>

<button>
<i class="fa-solid fa-magnifying-glass"></i>
</button>
-->
</nav>
</div>
</div>
<div class="setting-tab" style="display: none;">
<button class="close-setting" aria-label="close settings">&times;</button>
  <h3>Settings <i class="fa-solid fa-gears"></i></h3>
  <div class="setting-item theme-control">
    <span><i class="fa-solid fa-circle-half-stroke"></i> Dark theme </span>
    <span>
<input type="checkbox" name="theme-toggle" id="theme-toggle" class="toggle-btn">
    <label for="theme-toggle" id="toggle-label"></label>
    </span>
  </div>

  <div class="setting-item theme-control">
    <span><i class="fa-solid fa-bell"></i> Subscribe </span>
    <span>
<input type="checkbox" name="notification-toggle" id="notification-toggle" class="toggle-btn">
    <label for="notification-toggle" id="notification-label"></label>
    </span>
  </div>
  <div class="setting-item theme-control">
    <span>
<a href="/cookie-policy">Cookie Policy</a>
    </span>
  </div>

  <div class="setting-item theme-control mobile-item">
    <span><i class="fa-solid fa-newspaper"></i>
<a href="/submit-a-story">Submit a story</a>
    </span>
  </div>
  <div class="setting-item theme-control mobile-item">
    <span><i class="fa-brands fa-facebook"></i>
<a href="https://www.facebook.com/FlourishTimes/">Facebook</a>
    </span>
  </div>
  <div class="setting-item theme-control mobile-item">
    <span><i class="fa-brands fa-twitter"></i>
<a href="https://twitter.com/FlourishTimes?t=k_behgK07tob9KvmHAllFA&s=09">Twitter</a>
    </span>
  </div>
  <div class="setting-item theme-control mobile-item">
    <span><i class="fa-brands fa-facebook"></i>
<a href="https://www.instagram.com/official_flourishtimes?r=nametag">Instagram</a>
    </span>
  </div>
  <div class="setting-item theme-control mobile-item">
    <span><i class="fa-brands fa-instagram"></i>
<a href="https://www.linkedin.com/mwlite/in/flourish-komolafe-6790a669">LinkedIn</a>
    </span>
  </div>
</div>
</section>

</header>