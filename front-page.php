<?php
/***check if is front page */
if(is_front_page()):
get_header( 'home' );
endif;
?>
<main>
<?php if ( has_post_thumbnail()): ?>

<section class="top-panel">
<!--Display latest news-->
<div class="news-slide">
    <?php 
    $args1 = array('order'=>'ASC','posts_per_page'=>5,
  'orderby'=> 'title');
    $the_query1 =  new WP_Query($args1);
    ?>
<?php while($the_query1->have_posts()): $the_query1-> the_post(); ?>

<div class="slide-item" style="--background: url('<?php the_post_thumbnail_url() ?>')">

<a href="<?php the_permalink() ?>" class="slide-text">
<h1><?php the_title() ?></h1>
</a>
 
</div>
<?php 

endwhile;
endif; 
 
?>

<div>
 <p class="prev" onclick="plusSlides(-1)">&#10094;</p>
  <p class="next" onclick="plusSlides(1)">&#10095;</p>
  </div>
  <div style="text-align:center" class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>

</div>
</div>

<?php 
wp_reset_postdata();
?>
<?php if ( has_post_thumbnail()): ?>
  <?php 
    $args2 = array('posts_per_page'=>2,'order'=>'DESC');
    $the_query2 =  new WP_Query($args2);
    ?>
<div class="breaking-news">

<div class="grid-container">

<!--Todo: Display post by tags-->
  
<?php while($the_query2->have_posts()): $the_query2->the_post() ?>

<article  class="grid-article" style="--background: url('<?php the_post_thumbnail_url() ?>')">
<div class="grid-text">
<a href="<?php the_permalink() ?>" >
<h1><?php the_title() ?></h1>
</a>
</div>
</article>
<?php endwhile ?>
<?php endif; 
?>
<?php wp_reset_postdata();?>

</div>

</section>
<!--TODO: Display latest top four news-->
<?php if ( has_post_thumbnail() ): ?>
<section class="news-list">
  <div class="card-container">
    <!--maximum of 4 card items-->
    <?php 
    $args3 = array('posts_per_page'=>4, 'order'=>'ASC');
    $the_query3 =  new WP_Query($args3);
    ?>

    <div class="grid-container">
    <?php while($the_query3->have_posts()): $the_query3->the_post()  ?>

    <article  class="grid-article" style="--background: url('<?php the_post_thumbnail_url( ); ?>')">
    <div class="grid-text">
    <a href="<?php the_permalink()?>" >
    <h1><?php the_title(); ?>
    </h1>
    </a>
     </div>
    </article>
    <?php endwhile; ?>
    <?php endif;?>
   </div>
    </div>
    <?php wp_reset_postdata();
?>
</div>
</div>

</section>
<!--Breaking news menu-->

<section class="menu-2 --2-column">
<?php
    //The Query
    $args4 = array('category_name'=>'breaking',
'order'=>'ASC','posts_per_page'=>5);
    $the_query4 = new WP_Query($args4);
   ?>
<div class="column-container"  id="column-container">
  <div class="red-title">
    <h1>Breaking News</h1>
  </div>
  <?php  if(have_posts()):while($the_query4->have_posts()):$the_query4->the_post(); ?>
  <article class="column-card-2">
    <div class="text-section">
  <h3>
    <a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
    </div>
<div class="img-section">
<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
</div>

  </article>

  <?php 
  endwhile;
endif;?>

</div>
<?php wp_reset_postdata(); ?>


<!---Menu 3-->
<?php
    //The Query
    $args5 = array('category_name'=>'trending',
 'order'=>'ASC', 'posts_per_page'=>5);
    $the_query5 = new WP_Query($args5);
   ?>
<div class="column-container"  id="column-container">
  <div class="red-title">
    <h1>Trending</h1>
  </div>
  <?php  if(have_posts()):while($the_query5->have_posts()):$the_query5->the_post(); ?>
  <article class="column-card-2">
    <div class="text-section">
  <h3>
    <a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
    </div>
<div class="img-section">
<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
</div>

  </article>

  <?php endwhile; ?>

<?php 
endif;?>

</div>


<?php wp_reset_postdata(); ?>
</section>

<!--Section card-->

<section class="news-category">
<?php

  //The Query
  $args10 = array('post_type'=> 'post',
  'posts_per_page'=>3,
 'comment_count'=>array('value'=>2,
'compare'=>'>=',));
  $the_query10= new WP_Query($args10); 
   ?>
<div class="card-column">
<?php while($the_query10->have_posts()): $the_query10->the_post() ?>
<?php if(has_post_thumbnail()): ?>
<div class="xl-card">
<img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_excerpt()?>">
<article class="content-box">
  <span><?php the_tags()?></span>
<h2><?php the_title() ?></h2>
</article>
<div class="card-menu">
  <span class="left-menu">
<?php echo get_comments_number()?> <i class="fa-solid fa-comment-dots"></i>
  </span>
  <span class="right-menu" id="right-menu">
    <a href="<?php the_permalink() ?>">
Full story <i class="fa-solid fa-arrow-right"></i>
    </a>
  </span>
</div>

</div>
<?php
endif;
endwhile;
wp_reset_postdata();
wp_reset_query();
?>
</div>

</section>
<section class="category-list">
<?php $cats= get_categories(array('orderby'=>'name',
'order'=>'ASC'));
foreach($cats as $cat):
?>

<?php
    //The Query
    $args5 = array('category_name'=>$cat->name,
 'order'=>'ASC', 'posts_per_page'=>4);
    $the_query5 = new WP_Query($args5);
   ?>
  
<?php echo '<h1 class="title-line">'.$cat->name.'</h1>'; ?>
<div class="content-grid">
<?php while($the_query5->have_posts()): $the_query5->the_post() ?>
<?php if(has_post_thumbnail()): ?>
<div class="news-card" id="news-card">
<img src="<?php the_post_thumbnail_url() ?>"
 alt="<?php the_title() ?>">
<article class="--article">
<a href="<?php the_permalink() ?>"><h2><?php
the_title()
?></h2></a>
</article>
</div>
<?php endif;
endwhile; ?>
</div>
<div class="more-categories" id="more-categories">
  <a  id="more-categories"
  href="<?php 
   $category_id = get_cat_ID( $cat->name );
   $category_link = get_category_link( $category_id );
   echo esc_url( $category_link ); ?>" >More Stories</a>
</div>
<?php 

endforeach; 
wp_reset_postdata()
?>
</section>

</main>
<?php get_footer();?>