<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="hfeed site">
   <?php $frontpage_id = get_option( 'page_on_front' );?>
   <header id="masthead" class="header">
    <div class="absolutepos">
      <div  class="container">
        <?php do_action('wpml_add_language_selector'); ?>
      </div>
      <div id="owl">
       <?php while( have_rows('slider',$frontpage_id) ): the_row(); ?>
        <div class="item">
          <?php $img = get_sub_field('img');
          $alt = $img["alt"];
          $url =$img["url"];
          ?>
          
          <div class="image" style="background-image:url(<?php echo $url ?>)">
            <div  class="container">
              <div class="image_text">
                
                <?php if( get_sub_field('text') ): ?>
                  <h2>
                    <?php the_sub_field('text');?>
                  </h2>
                <?php endif; ?>
                <?php if( get_sub_field('buttonurl') && get_sub_field('button') ): ?>
                  <div class="buttondiv">
                    <div class="border">
                     <a class="button bluebg" href="<?php the_sub_field('buttonurl')?>"><?php the_sub_field('button')?></a>
                   </div>
                 </div>
               <?php endif ?>
             </div>

           </div>
         </div>
       </div>
     <?php endwhile; ?>        
     
   </div>
 </div>

 <div  class="container">
   <div class="logo">           
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
     <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
   </a>
 </div>
</div>

</header><!-- .site-header -->
<div  class="container textright btn">
  <button type="button" id="navbar-toggle" class="right">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>
<section class="rainbow">
  <div class="white">
    <div  class="container">
      <div class="rainbow2">
        <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'main-menu','link_before' => '<span>','link_after' => '</span>')); ?>
      </div>
      <?php if( get_field('heading_notice',$frontpage_id) ): ?>
       <div class="notice">
         <div class="noticec">
          <?php if( get_field('link',$frontpage_id) ): ?>
           
           <a href="<?php the_field('link',$frontpage_id);?>">
           <?php endif; ?>
           <span class="ncontent">

             <?php the_field('heading_notice',$frontpage_id);?>
           </span>
           <?php if( get_field('link',$frontpage_id) ): ?>
           </a>
         <?php endif; ?>
       </div>
     </div>
   <?php endif; ?>
 </div>

</div>
</section>

<div id="content" class="site-content">
