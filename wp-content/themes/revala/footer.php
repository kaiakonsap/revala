
</div>
<?php $frontpage_id = get_option( 'page_on_front' );?>
<section class="darkgraybg">
  <div class="container textright bffooter">
    <div id="form" class="formcontainer">
      <?php if( get_field('formtext',$frontpage_id) ): ?>
        <p> <?php the_field('formtext',$frontpage_id);?></p>
      <?php endif; ?>
      <?php if( get_field('form',$frontpage_id) ): ?>
       <?php the_field('form',$frontpage_id);?>
     <?php endif; ?>
   </div>
   <button class="form"><?php _e( 'Contact us', 'revala2016' );?><span class="btnopen"></span><span class="btnclosed"></span></button>
 </div>
</section>
<footer class="footer">
  <div class="container">
    <div class="logo">
      <?php if( get_field('the_logo',$frontpage_id) ): ?>
       <?php $img = get_field('the_logo',$frontpage_id);
       $alt = $img["alt"];
       $url =$img["url"];
       ?> 
       <img src="<?php echo $url ?>" alt="<?php echo $alt?>" >
     <?php endif; ?>
   </div>
   <button type="button" id="fbar-toggle" class="right">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>

  <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container_class' => 'footer-menu')); ?>
  <div class="fcontacts">
    <div class="name inlineblock">
    <?php  
       echo'<a href="'.get_theme_mod( 'nameurl', '#' ). '">';
    echo get_theme_mod( 'name', 'Muuda seda teksti Välimus -> Kohanda alt' );
  echo '</a>';
    ?>

    </div>
    <div class="phone inlineblock">
    <?php
           echo'<a href="'.get_theme_mod( 'phoneurl', '#' ). '">';
      echo get_theme_mod( 'phone', 'Muuda seda teksti Välimus -> Kohanda alt' );
        echo '</a>';?>
      </div>
    <div class="email inlineblock">
    <?php 
           echo'<a href="'.get_theme_mod( 'emailurl', '#' ). '">';
     echo get_theme_mod( 'email', 'Muuda seda teksti Välimus -> Kohanda alt' );
      echo '</a>'; ?>
    </div>
  </div>
  <div class="supporters">
    <?php if( get_field('supporters',$frontpage_id) ): ?>
     <?php $img = get_field('supporters',$frontpage_id);
     $alt = $img["alt"];
     $url =$img["url"];
     ?>
     <img src="<?php echo $url ?>" alt="<?php echo $alt?>" >
   <?php endif; ?>
 </div>
</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
