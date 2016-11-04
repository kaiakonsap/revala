<?php
get_header(); 
/**
 * Template Name: contact
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
<div class="container contactc">

  <div class="column column1">

    <?php if (get_field('company')) {
     echo "<h2 class='green'>".get_field('company')."</h2>";
   }?>
   <div class="crow">
    <div class="innercolumn inner1">
      <?php if (get_field('address')) {
        the_field('address');
      }?>
    </div>
    <div class="innercolumn">
      <?php if (get_field('contact')) {
        the_field('contact');
      }?>
    </div>
  </div>
  <div>
    <?php if (get_field('vat')) {
      the_field('vat');
    }?>
  </div>
</div>
<div class="column map">

  <?php if (get_field('google_url')) {
    $url=get_field('google_url');
  }
  else {
   $url='#';
 }?>
 <a href="<?php echo $url;?>" target="_blank">
  <?php if (get_field('google_img')) {
   $img = get_field('google_img');
   $alt = $img["alt"];
   $url =$img["url"];
   ?>
   
   <img src="<?php echo $url ?>" alt="<?php echo $alt?>" >

   <?php }?>
 </a>
 
</div> </div>
<?php endwhile;?>




<?php get_footer(); ?>