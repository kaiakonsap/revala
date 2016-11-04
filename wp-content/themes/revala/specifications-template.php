<?php
get_header(); 
/**
 * Template Name: specifications
 */
?>

<section class="white">
  <div class="container">
    <?php     while ( have_posts() ) : the_post();
    ?>
    <h1 class="blue">
      <?php  the_title();?>
    </h1>
  <?php endwhile;?>
  <?php the_content()?>
  <div class="specification">
    <?php 
    $divid=0;

    $args = array( 'post_type' => 'product','posts_per_page'=> -1);
    $the_query = new WP_Query($args);
    $numposts = $the_query->found_posts;

    ?>
    <?php        while ( $the_query->have_posts() ) : $the_query->the_post();?>
      <?php
      $id=get_the_ID();
      $term = get_the_terms( $id, 'product_cat' );
      $color;
      $termid = $term[0]->term_id;
      switch ($termid) {
        case 3:
        $color="green";
        break;
        case 4:
        $color="blue";
        break;
        case 5:
        $color="pink";
        break;
        default:
        $color="blue";
      }

      if ($numposts%2!=0 && $numposts == ($divid+1)) {
       $short='short';
     }
     else {
       $short='';
     }
     ?>

     <div class="column <?php echo $oddeven.' '.$short ?>">

       <?php
       if (get_field('long_name')) {
         echo '<h1 class="'.$color.'">'.get_field('long_name').'</h1>';
       }
       else {
        the_title('<h1 class="'.$color.'">','</h1>');
      }
      ?>
      <ul>
        <?php while( have_rows('pdfs') ): the_row(); ?>
         <li><a href="<?php the_sub_field('pdf');?>" target="_blank" class="linkPdf"><?php the_sub_field('pdf_title');?></a></li>
         
       <?php endwhile; ?>
     </ul>
     
     <?php if (get_field('zip')) {?>

     <a class="button greenbg" href="<?php the_field('zip')?>" target="_blank"><?php _e('Download all', 'revala2016');?></a>
     <?php
   }?>
   
 </div>
 <?php $divid++;?> 
<?php endwhile;?>
</div>
</div>
</section>

<?php get_footer(); ?>