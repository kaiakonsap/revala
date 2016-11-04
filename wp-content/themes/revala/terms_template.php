<?php
get_header(); 
/**
 * Template Name: business terms
 */
?>

<section class="white">
  <div class="container paddingmore">
   
   <?php  while ( have_posts() ) : the_post();?>
    <h1 class="blue">
      <?php  the_title();?>
    </h1>
    <div class="column column1">
      <?php while( have_rows('column1') ): the_row(); ?>
        <div class="row">
          <div class="innercolumn inner1">
           <strong><?php the_sub_field('name');?></strong> 
         </div>
         <div class="innercolumn inner2">
          <?php the_sub_field('info');?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <div class="column column2">
    <?php if (get_field('column2_title')) {
      echo "<p><strong>";
      the_field('column2_title');
      echo "</strong></p>";
    }
    if (get_field('columncontent')) {
      the_field('columncontent');
    }
    ?>
  </div>
<?php endwhile;?>

</div>
</section>

<?php get_footer(); ?>