<?php
get_header();
/**
 * Template Name: esileht
 */
?>

<section class="white">
  <div class="container weare">
 
      <h1 class='blue center'>
       <?php _e('WE ARE', 'revala2016');?>
     </h1>
     <div class="excerpt yellowbg">
      <?php  if (get_field('weare')) {
    the_field('weare');
  } ?>
      
    </div>
</div>
</section>
<?php wp_reset_postdata();?>

<div class="container productc">
  <h1 class="heading blue center">
    <?php _e('OUR PRODUCTS', 'revala2016');?>
  </h1>
  <?php   $args = array( 'post_type' => 'product','posts_per_page'=> 4,'orderby' => 'ID',
    'order'   => 'ASC');
  $the_query = new WP_Query($args);
  ?>
  <div class="products">
    <?php        while ( $the_query->have_posts() ) : $the_query->the_post();?>
      <div class="column productcolumn">
        <div class="productcontent">
          <?php $id=get_the_ID();
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

          echo "<div class='term ".$color."'><h2>";
          echo $term[0]->name;
          echo "</h2></div>";
          if ( has_post_thumbnail() ) {
            the_post_thumbnail(array(258,258));
          }
          else {
            echo '<img src="'.get_template_directory_uri().'/images/placeholder.png" alt ="placeholder">';
          }?>
          <div class="productext">
            <h1 class="<?php echo $color ?>">
             <?php  the_title();?>
           </h1>
           <div class="excerpt <?php echo $color ?>bg">
            <?php  the_excerpt(); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile;?>
</div>
<?php
    // Start the loop.
while ( have_posts() ) : the_post();?>
<div class="morebuttons">
  <?php if (get_field('btn1text') && get_field('btn1url')) {
    echo '<a class="more button yellowbg" href="'.get_field('btn1url').'">'.get_field('btn1text').'</a>';
  }
  if (get_field('btn2text') && get_field('btn2url')) {
    echo '<a class="more button brownbg" href="'.get_field('btn2url').'">'.get_field('btn2text').'</a>';
  }?>
</div>
<?php   endwhile;
?>

</div>
<section class="white">
  <div class="container paddingmore">
    <div class="smcontainer">
     <?php  while ( have_posts() ) : the_post();?>
      <h1 class="blue center">
        <?php _e('TERMS of BUSINESS', 'revala2016');?>
      </h1>
      <div class="column column1">
        <?php while( have_rows('column1',8) ): the_row(); ?>
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
      <?php if (get_field('column2_title',8)) {
       echo "<p><strong>";
       the_field('column2_title',8);
       echo "</strong></p>";
     }
     if (get_field('columncontent',8)) {
       the_field('columncontent',8);
     }?>
   </div>
 <?php endwhile;?>
</div>
</div>
</section>

<?php get_footer(); ?>