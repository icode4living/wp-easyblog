<?php get_header() ?>
<section class ="content-container" id="content-container">
<?php if(have_posts()):while(have_posts()): the_post();?>
<div class="--content">

<div class="--content-title">
<h1><?php the_title();
?></h1>
<ul class="post-detail">
<li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author();?>
</a>
</li>

<li><?php the_time();?></li>
</ul>
</div>
<div class="share-button">
<ul>
<li class="share-list">
 
<!--<a class="fb-share-button" 
data-href="<?php the_permalink();?>" 
data-layout="button_count"
data-size="small">
</a>-->
</li>
<li class="share-list">
  <!--Add  post permlink after https://..-->
  <a href="whatsapp://send?text=<?php the_permalink()?>" rel="noindex" class="whatsapp"
  data-action="share/whatsapp/share"  
    target="_blank">
    <i class="fa-brands fa-whatsapp"></i>
  </a>
  WhatsApp
  </li>

</li>
<li class="share-list" onclick="copTextLink('<?php the_permalink()?>');">
  <a 
  class="link">Copy <i class="fa-solid fa-link"></i></a></li>

</ul>
</div>
<article class="news-article">
  <div class="post-thumbnail" id="post-thumbnail">
    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_excerpt() ?>">
   <p> <?php the_post_thumbnail_caption() ?></p>
</div>
<p id="f-letter">
<?php the_content(); ?>
 </p>
   </article>
   <?php endwhile?>
<?php endif ?>
   <div class="comment-area" id="comment-area">
<table class="comment-tab">
<tr class="comment-title">
  <th id="comment-form" class="active-comment-tab">Leave a comment <i class="fa-solid fa-comment-dots"></i></th>
  <th id="comment-list">Comments <i class="fa-solid fa-comments"></i></th>
</tr>
</table>
  <div class="comment-form">
    <div class="form-container" id="my-comment">
 <?php comment_form(); ?>
    </div>
  </div>
  
  <div class="comment-list" style="display: none;">
    
  <?php
   if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
  ?>
  </div>
</div>
  
   </div>
</div>

<div class="side-bar">
<h1>You May Like</h1>
<div class="--grid-column">
<?php
    //The Query
    $exclude_post = get_option(the_title() );
    $category = get_the_category();
    $args4 = array('posts_per_page'=>2,'post_not_in'=> $exclude_post,
'order'=>'ASC', 'category_name'=>$category[0]->cat_name);
    $the_query4 = new WP_Query($args4);
   ?>
     <?php  if(have_posts()):while($the_query4->have_posts()):$the_query4->the_post(); ?>
<div class="column-card" id="column-card">
<span><?php the_tags( ) ?></span>
<a href="<?php the_permalink()?>">
<h3><?php the_title() ?>.</h3></a>
</div>
<?php endwhile ?>
<?php endif;
wp_reset_postdata();
?>
</div>

<div class="newsletter" id="newsletter">
  <h1>Newsletter</h1>
<p>Get The Latest Updates Delivered To Your Email</p>
<form class="newsletter-form" id="newsletter-form">
<div class="form-group">
<input type="email" value="" id="email_id"
 placeholder="Type email.." required>
</div>
<div class="form-group">
<button type="submit" id="subBtn">Subscribe Now</button>
</div>
</form>
</div>
</div>
</section>
<?php get_footer('blog'); ?>
