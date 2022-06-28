

<?php get_header() ?>

<main>
<section>
<?php if(have_posts()):while(have_posts()): the_post();?>
<h1 style="text-align: center;"><?php
the_title()
?></h1>

<?php the_content()?>
</article>
</div>
<?php 
endwhile;
endif;
?>
</div>
</section>
</main>