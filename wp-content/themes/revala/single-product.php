<?php

get_header(); ?>
<?php $page_object = get_queried_object();
$page_id     = get_queried_object_id();?>
<div class="container singlep">
  <?php   $args = array( 'post_type' => 'product','posts_per_page'=> -1,'orderby' => 'ID',
    'order'   => 'ASC');
  $the_query = new WP_Query($args);
  ?>
  <div class="minimenu">
    <?php        while ( $the_query->have_posts() ) : $the_query->the_post();
    $id=get_the_ID();?>
    <?php
    if ($id == $page_id) {
      $classname='current';
    }
    else {
      $classname='';
    }
    ?>

    <a class="link <?php echo $classname;?>" href="<?php echo get_permalink() ;?>">
     <?php      if ( has_post_thumbnail() ) {
      the_post_thumbnail(array(90,90));
    }
    else {
      echo '<img src="'.get_template_directory_uri().'/images/miniplaceholder.png" alt ="placeholder">';
    }

    the_title('<p>','</p>');?>
  </a>

<?php endwhile;?></div>


</div>   <?php
  // Start the loop.
while ( have_posts() ) : the_post();?>
<section class="white">
  <div class="container">
    <div class="table">
      <div class="arrowdiv leftarrow td">
        <?php $prev=__('Prev', 'revala2016');?>
        <?php previous_post_link('%link', $prev, FALSE); ?> 
      </div>
      <div class="singlec td">
        <div class="tr">
          <div class="td imgtd">
           <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail(array(258,258));
          }
          else {
            echo '<img src="'.get_template_directory_uri().'/images/placeholder.png" alt ="placeholder">';
          }?>
        </div>
        <div class="singletext td">
          <?php
          if (get_field('long_name')) {
           echo '<h1 class="blue">'.get_field('long_name').'</h1>';
         }
         else {
          the_title('<h1 class="blue">','</h1>');
        }?>
        <?php the_content();?>
      </div>
    </div>
  </div>
  <div class="arrowdiv rightarrow td">
    <?php $next=__('Next', 'revala2016');?>
    <?php next_post_link('%link', $next, FALSE); ?>
  </div> 

  


</div>

</div>
</section>
<div class="container">

  <?php if (get_field('titlerecipes')) {
    echo "<h1 class='blue'>";
    the_field('titlerecipes');
    echo "</h1>";
  }?>

  <?php if (get_field('intro')) {
    the_field('intro');
  }?>
  <div class="videos">
    <?php while( have_rows('recipes') ): the_row(); ?>
      <div class="video">
       <div class="recipe"><?php the_sub_field('secimg')?></div>
     </div>
     
   <?php endwhile; ?>
 </div>
</div>
<section class="white">
  <div class="container">
    <div class="specification">
      <?php if (get_field('pdfs_title')) {
        echo "<h1>";
        the_field('pdfs_title');
        echo "</h1>";
      }?>
      <?php if (get_field('pdf_intro')) {
        echo "<p>";
        the_field('pdf_intro');
        echo "</p>";
      }?>
      <ul class="singleul">
        <?php while( have_rows('pdfs') ): the_row(); ?>
         <li><a href="<?php the_sub_field('pdf');?>" target="_blank" class="linkPdf"><?php the_sub_field('pdf_title');?></a></li>
         
       <?php endwhile; ?>
     </ul>
     
     <?php if (get_field('zip')) {?>

     <a class="button greenbg" href="<?php the_field('zip')?>" target="_blank"><?php _e('Download all', 'revala2016');?></a>
     <?php
   }?>
   
 </div>
</div>
</section>
<?php  endwhile;?>
<?php get_footer(); ?>
