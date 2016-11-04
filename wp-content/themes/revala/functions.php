<?php


function revala2016_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Widget Area', 'revala2016' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'revala2016' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'revala2016_widgets_init' );

function register_my_menu()
{
  register_nav_menu('header-menu', 'Header Menu');
  register_nav_menu('footer-menu', 'Footer menu');
}

add_action('init', 'register_my_menu');
add_theme_support('post-thumbnails');

function scripts() {

    // Load our main stylesheet.
  wp_enqueue_style( 'style', get_template_directory_uri() . '/screen.css');
  wp_enqueue_style( 'Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat');
  wp_enqueue_style( 'Volkhov', 'https://fonts.googleapis.com/css?family=Volkhov');
  wp_enqueue_style( 'fancy', get_template_directory_uri() . '/js/fancybox/source/jquery.fancybox.css');

  wp_enqueue_script( 'func', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '1', true );

  wp_enqueue_script( 'fancy', get_template_directory_uri() . '/js/fancybox/source/jquery.fancybox.pack.js', array( 'jquery' ), '1', true );

if (ICL_LANGUAGE_CODE == 'ar') {
   wp_enqueue_script( 'arab', get_template_directory_uri() . '/js/arab.js', array( 'jquery' ), '1', true );

}
else {
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '1', true );
}
}
add_action( 'wp_enqueue_scripts', 'scripts' );

$args = array(
  'width'         => 244,
  'height'        => 303,
  'default-image' => get_template_directory_uri() . '/images/logo.png',
  );
add_theme_support( 'custom-header', $args );

function create_posttype() {


  register_post_type( 'product',
    array(
      'labels' => array(
        'name' => __('Tooted', 'revala2016'),
        'singular_name' => __('Toode', 'revala2016')
        ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('products', 'revala2016')),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        )
      )
    );

}

add_action( 'init', 'create_posttype' );
add_action( 'init', 'create_tax' );

function create_tax() {
  register_taxonomy(
    'product_cat',
    'product',
    array(
      'label' => __( 'Tootekategooriad', 'revala2016' ),
      'rewrite' => array( 'slug' => 'tootekategooria' ),
      'hierarchical' => true,
      )
    );
}
$postType = 'product';
add_filter('show_'.$postType.'_archive_in_nav_menus',function($show){
  return true;
});
add_theme_support( 'excerpt', array( 'aboutus','product' ) );


function customize_register( $wp_customize ) {


  $wp_customize->add_section(
    'footer_setting_section',
    array(
      'title' => 'Jaluse sätted',
      'description' => 'Muuda siit jaluse tekste.',
      'priority' => 9999,
      )
    );  

    //Add a setting
  $wp_customize->add_setting(
    'name',
    array(
     'default' => '2016 Revala Ltd',
     'transport'   => 'postMessage'
     )
    );    
    //Add control
  $wp_customize->add_control(
    'name',
    array(
      'label' => 'Nimi',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );

  //optonal url
    $wp_customize->add_setting(
    'nameurl',
    array(
     'default' => '#',
     'transport'   => 'postMessage'
     )
    );    
    //Add control
  $wp_customize->add_control(
    'nameurl',
    array(
      'label' => 'Nime url',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
        //Add a setting
  $wp_customize->add_setting(
    'phone',
    array(
     'default' => 'Tel +372 6541 777',
     'transport'   => 'postMessage'
     )
    );    
    //Add control
  $wp_customize->add_control(
    'phone',
    array(
      'label' => 'Telefon',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
    //optonal url
    $wp_customize->add_setting(
    'phoneurl',
    array(
     'default' => 'tel:+372 6541 777',
     'transport'   => 'postMessage'
     )
    );    
    //Add control
  $wp_customize->add_control(
    'phoneurl',
    array(
      'label' => 'Telefoni url',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
        //Add a setting
  $wp_customize->add_setting(
    'email',
    array(
     'default' => 'revala(at)revala.ee',
     'transport'   => 'postMessage'
     )
    );    
    //Add control
  $wp_customize->add_control(
    'email',
    array(
      'label' => 'E-mail',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
    //optonal url
    $wp_customize->add_setting(
    'emailurl',
    array(
     'default' => 'mailto:revala@revala.ee',
     'transport'   => 'postMessage'
     )
    );    
    //Add control
  $wp_customize->add_control(
    'emailurl',
    array(
      'label' => 'E-maili url',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
}
add_action('customize_register', 'customize_register');
function childtheme_customizer_live_preview() {
  wp_enqueue_script(
    'customize_register',     
    get_stylesheet_directory_uri().'/js/theme-customizer.js',
    array( 'jquery','customize-preview' ),  
    '1.0',            
    true            
    );
}
add_action( 'customize_preview_init', 'childtheme_customizer_live_preview' );

function improved_trim_excerpt($text) {
  global $post;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace('\]\]\>', ']]&gt;', $text);
    $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
    
    $excerpt_length;
    if ($post->post_type == 'aboutus') {
     $text = strip_tags($text,'<br>');
     $excerpt_length = 100;
   }
   else if ($post->post_type == 'product') {
    $excerpt_length = 15;
    $text = strip_tags($text);
  }
  else {
    $excerpt_length = 50;
    $text = strip_tags($text);
  }
  
  
  $words = explode(' ', $text, $excerpt_length + 2);
  if (count($words)>= $excerpt_length) {
    array_pop($words);
    array_push($words, '<div class="center"><a class="more-link button" href="' . get_permalink() . '">'.__('Read more', 'revala2016').'</a></div>');
    $text = implode(' ', $words);
  }
}
return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

