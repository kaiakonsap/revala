<?php
get_header(); ?>

<?php the_title( '<h1 class="blue">', '</h1>' ); ?>


<div class="container promoth">

  <?php 		while ( have_posts() ) : the_post();
  ?>
  <?php the_content(); ?>
<?php endwhile;
?>
</div>

<?php get_footer(); ?>