<?php
// Колонка миниатюры в списке записей админки
add_filter( 'manage_posts_columns', 'posts_columns', 5 );
add_action( 'manage_posts_custom_column', 'posts_custom_columns', 5, 2 );

//add_filter( 'manage_pages_columns', 'posts_columns', 5 );
//add_action( 'manage_pages_custom_column', 'posts_custom_columns', 5, 2 );

function posts_columns( $defaults ) {
  $defaults[ 'adem_post_thumbs' ] = __( 'Миниатюра' );
  return $defaults;
}

function posts_custom_columns( $column_name, $id ) {
  if( $column_name === 'adem_post_thumbs' ) {
    the_post_thumbnail( [ 50, 50 ] );
  }
}