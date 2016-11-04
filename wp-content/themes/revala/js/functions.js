

function dropdown() {
  jQuery('#navbar-toggle').click(function (event) {
    event.preventDefault();
    if(jQuery( window ).width()<=1000){
      if(!jQuery('.main-menu').is(':visible')) {
        jQuery('.main-menu').slideDown('fast');
        jQuery('.main-menu').css('display','block');
      } else {
        jQuery('.main-menu').slideUp('fast');
      }
    } else {
      jQuery('.main-menu').css('display','block');
    }

  });
  jQuery('#fbar-toggle').click(function (event) {
    event.preventDefault();
    if(jQuery( window ).width()<=1000){
      if(!jQuery('.footer-menu').is(':visible')) {
        jQuery('.footer-menu').slideDown('fast');
        jQuery('.footer-menu').css('display','block');
      } else {
        jQuery('.footer-menu').slideUp('fast');
      }
    } else {
      jQuery('.footer-menu').css('display','block');
    }

  });

}

jQuery( document ).ready(function() {

jQuery(document).ready(function() {
    jQuery(".fancybox").fancybox();
  });
  jQuery('button.form').click(function (event) {
    event.preventDefault();
    if(!jQuery('#form').is(':visible')) {
      jQuery(this).children('.btnopen').css('display','inline-block');
      jQuery(this).children('.btnclosed').css('display','none');
      jQuery('#form').slideDown('fast');
      jQuery('#form').css('display','block');
    } else {
      jQuery('#form').slideUp('fast');
      jQuery(this).children('.btnopen').css('display','none');
      jQuery(this).children('.btnclosed').css('display','inline-block');
    }

    jQuery('#form').css('display','block');
    

  });

  dropdown();


  jQuery("#owl").owlCarousel({
   autoPlay: 4500,
   navigation : false,
   slideSpeed : 500,
   pagination : false,
   singleItem:true

 });

});

jQuery(window).scroll(function() {
  var footerh= jQuery('.footer').outerHeight(true);
   if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - footerh) {
    var gap= jQuery(document).height() - (jQuery(window).scrollTop() + jQuery(window).height() )
    console.log(footerh);
       jQuery('.bffooter').css('bottom',footerh - gap);
   }
    else {
      jQuery('.bffooter').css('bottom',0 );
    }
});


