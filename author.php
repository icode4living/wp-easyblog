<?php get_header() ?>
<div class="main-container">

<div class="content-card" id="content-card">
<?php 
$curauth= (get_query_var('author_name')) ?
get_user_by( 'slug',get_query_var('author_name')):
get_userdata(get_query_var('author_name'));

?>
    <h1><?php echo 'About'." ".$curauth->display_name; ?></h1>

<div class="user-info">
<h2></h2>
<?php echo $curauth->jabber;
?> 
<div class="profile-image">
    <span>

<img src="<?php echo esc_url(get_avatar_url($curauth->ID)); ?>">
<dl><?php echo $curauth->first_name." ";
echo  $curauth->last_name;
?>
</dl>

    </span>
</div>
<ul class="author-alias">
  <!--  <li><i class="fa-solid fa-circle-user"></i>Full Name: </li>-->
    <li>
    <a href="<?php $curauth->user_url; ?>">
    <i class="fa-solid fa-user-check"></i>Nickname:
<?php echo "@".$curauth->nickname;

?>
    </a>
</li>
    <li><a href="mailto:<?php $curauth->user_email;?>"><i class="far fa-envelope"></i>Email: <?php echo $curauth->user_email;?></a></li>
</ul>
<p>
<?php echo $curauth->description;
?> 
</p>
</div>
<h3>Post by <?php echo $curauth->nickname;
?></h3>
<div class="content-grid">
<?php query_posts('posts_per_page=10');?>
<?php if(have_posts()):while(have_posts()): the_post();?>

<div class="news-card" id="news-card">
<img src="<?php the_post_thumbnail_url() ?>"
 alt="<?php the_title() ?>">
<article class="--article">
<a href="<?php the_permalink() ?>"><h4><?php
the_title()
?></h4></a>
</article>
</div>
<?php 
endwhile;
endif;
?>
</div>
</div>

</div>
</div>

<?php get_footer()?>