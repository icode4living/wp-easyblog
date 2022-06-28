<?php get_header() ?>

<main>
<section class="category-list">
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
</section>
</main>
<?php get_footer('blog') ?>