<?php
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
function true_load_posts(){
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';
  $args['post_type'] = 'page';
  $args['post_parent'] = $_POST['parent'];

  $return_html = "";

  $query = query_posts( $args );

  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
      if( $query->current_post == 0 ) {
        $return_html .= '<section class="our-projects our-projects_clean our-projects__w-filter">';
      } else {
        $return_html .= '<section class="our-projects our-projects_clean">';
      }
      $return_html .= '<div class="our-projects__wrapper">';
      $return_html .= '<div class="container">';
      $return_html .= '<div class="row">';
      $return_html .= '<div class="our-projects__body big-square">';
      $return_html .= '<div class="our-projects__inner">';
      $return_html .= '<div class="our-projects__img">';
      $return_html .= '<div class="our-projects__img-slider-w-nav swiper-container">';
      $return_html .= '<div class="swiper-wrapper">';
      $project_gallery_images = get_field( 'project-gallery' );
      if( $project_gallery_images ) {
        foreach( $project_gallery_images as $project_gallery_image ) {
          $return_html .= '<div class="swiper-slide">';
          $return_html .= '<a href="' . esc_url( $project_gallery_image[ 'url' ] ) . '" data-fancybox>';
          $return_html .= '<img src="' . esc_url( $project_gallery_image[ 'sizes' ][ '450x450' ] ) . '" alt="' . esc_attr( $project_gallery_image[ 'alt' ] ) . '" width="' . $project_gallery_image[ 'sizes' ][ '450x450-width' ] . '" height="' . $project_gallery_image[ 'sizes' ][ '450x450-height' ] . '"/>';
          $return_html .= '</a>';
          $return_html .= '<div class="our-projects__img-footer">';
          $return_html .= '<div class="our-projects__img-caption">' . esc_html( $project_gallery_image[ 'caption' ] ) . '</div>';
          $return_html .= '</div>';
          $return_html .= '</div>';
        }
      }
      $return_html .= '</div>';
      $return_html .= '<div class="our-projects__controls">';
      $return_html .= '<button class="arrow arrow_sm arrow_light arrow_prev" type="button">';
      $return_html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">';
      $return_html .= '<polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>';
      $return_html .= '</svg>';
      $return_html .= '</button>';
      $return_html .= '<button class="arrow arrow_sm arrow_light arrow_next" type="button">';
      $return_html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">';
      $return_html .= '<polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>';
      $return_html .= '</svg>';
      $return_html .= '</button>';
      $return_html .= '</div>';
      $return_html .= '</div>';
      $return_html .= '<div class="our-projects__img-nav swiper-container">';
      $return_html .= '<div class="swiper-wrapper">';
      if( $project_gallery_images ) {
        foreach( $project_gallery_images as $project_gallery_image ) {
          $return_html .= '<img class="swiper-slide" src="' . esc_url( $project_gallery_image[ 'sizes' ][ '105x110' ] ) . '" alt="' . esc_attr( $project_gallery_image[ 'alt' ] ) . '" width="' . $project_gallery_image[ 'sizes' ][ '450x450-width' ] . '" height="' . $project_gallery_image[ 'sizes' ][ '450x450-height' ] . '">';
        }
      }
      $return_html .= '</div>';
      $return_html .= '</div>';
      $return_html .= '</div>';
      $return_html .= '<div class="our-projects__content">';
      $return_html .= '<a class="our-projects__title" href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
      $return_html .= '<div class="our-projects__text">' . get_field( 'project-description' ) . '</div>';
      $return_html .= '</div>';
      $return_html .= '</div>';
      $return_html .= '<div class="vertical-text">ПРОЕКТЫ</div>';
      $return_html .= '</div>';
      $return_html .= '</div>';
      $return_html .= '</div>';
      $return_html .= '<div class="our-projects__bg-element our-projects__bg-element_left" style="background-image: url(' . get_the_post_thumbnail_url( null, "full" ) . ')"></div>';
      if( $query->current_post % 2 ) {
        $return_html .= '<div class="our-projects__bg-element our-projects__bg-element_right" style="background-image: linear-gradient(270deg, rgba(0,151,209, 0.2) 0%, rgba(0,151,209, 0.2) 100%), url(' . get_template_directory_uri() . '/assets/images/our-projects-right-bg.jpg)"></div>';
      } else {
        $return_html .= '<div class="our-projects__bg-element our-projects__bg-element_right" style="background-image: url(' . get_template_directory_uri() . '/assets/images/our-projects-right-bg.jpg)"></div>';
      }
      $return_html .= '</div>';
      $return_html .= '</section>';
    }
  }
  echo $return_html;
  die();
}
