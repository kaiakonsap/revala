<?php
get_header(); 
/**
 * Template Name: promo
 */
?>

<?php     while ( have_posts() ) : the_post();
  ?>
  <section class="whitebg">
    <div class="container promoth">
      <?php the_title( '<h1 class="blue">', '</h1>' ); ?>
      <?php the_content();?>
    </div>
  </section>
  <div class="container">

    <div class="promos">
      <?php while( have_rows('promo') ): the_row(); ?>
       <div class="column">
         <div class="promocontent">
           <?php $img = get_sub_field('promoimg');
           $alt = $img["alt"];
           $url =$img["url"];
           ?>
           <a class="fancybox" href="<?php echo $url ?>" data-fancybox-group="gallery" title="<?php the_sub_field('imgtitle');?>">
           <img src="<?php echo $url ?>" alt="<?php echo $alt?>" />
           </a>

           <h2 class="green"><?php the_sub_field('imgtitle');?></h2> 
           
         </div>      
       </div>
     <?php endwhile; ?>
   </div>

 </div>
<?php endwhile;
?>



<?php get_footer(); ?>