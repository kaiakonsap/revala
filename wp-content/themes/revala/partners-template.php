<?php
get_header(); 
/**
 * Template Name: partners
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
  <div class="container partnerc">

    <?php while( have_rows('partners') ): the_row(); ?>
      <div class="partner">
       <?php 
       $img = get_sub_field('partnerimg');
       $alt = $img["alt"];
       $url =$img["url"];
       ?>
       
       <img src="<?php echo $url ?>" alt="<?php echo $alt?>" >
       <div class="info">
        <h1 class="green">
          <?php
          the_sub_field('name');?>
        </h1>
        <p>
          <?php  the_sub_field('address');
          ?>
        </p></div>
      </div>
    <?php endwhile; ?>


  </div>

<?php endwhile;?>

<?php get_footer(); ?>