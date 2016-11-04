<?php

get_header(); ?>

<h1 class="heading blue center whitebg producth">
  <?php _e('OUR PRODUCTS', 'revala2016');?>
</h1>
<div class="container productc">

  <?php   $args = array( 'post_type' => 'product','posts_per_page'=> -1,'orderby' => 'rand');
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


</div>

<?php get_footer(); ?>
