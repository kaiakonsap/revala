( function( jQuery ) {

  // Update the site title in real time...
  wp.customize( 'name', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.name' ).html( newval );
    } );
  } );
    // Update the site title in real time...
  wp.customize( 'phone', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.phone' ).html( newval );
    } );
  } );
      //Update the site description in real time...
  wp.customize( 'email', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.email' ).html( newval );
    } );
  } );

  
} )( jQuery );
