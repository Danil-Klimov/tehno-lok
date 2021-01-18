<?php
// Установка длины excerpt
add_filter( 'excerpt_length', function() {
  return 100;
} );

function excerpt( $limit ) {
//  return wp_trim_words( get_the_excerpt(), $limit );
  if( get_the_excerpt() ) {
    return mb_substr( get_the_excerpt(), 0, $limit ) . '...';
  }
  return '';
}
