<?php ?>
<!DOCTYPE html>
<html class="overflow" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/favicon-32x32.png">
  <meta name="theme-color" content="#fff">
  <?php $traffic = $_SERVER[ 'DOCUMENT_ROOT' ] . '/wp-content/themes/tehnolok/includes/traffic.php'; ?>
  <?php if( file_exists( $traffic ) ) {
    include_once( $traffic );
  } ?>
  <?php wp_head(); ?>
</head>
<body>
<header class="header">
  <div class="container">
    <div class="row">
      <a class="header__logo" href="<?php bloginfo( 'url' ); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 324.33 53.37" width="172" height="28">
          <path fill="none" stroke="#fff" stroke-width="1.5px"
                d="M4.89,52.87V18L52.89.53l47.44,17.89V52.87L90.44,23.64l-37.55-13L15.44,22.87Zm4.29-12.2L5.27,37.06l6.33-4.25L5.35,26.72l10.09-3.85L4.89,18m95.44.56-10.09,5,9.51,4-5.66,6,5.83,4.31-3.41,3.56M52.89,10.63l-9.1-6.26-3.57,9.69-8.9-5.24-4.1,9.7-8.59-5.11-3.19,9.46m75,.34-3.75-9.63L78,19,74,8.77,65,14.33,61.65,4.27l-8.76,6.36m0-10.1V10.71"></path>
          <path fill="#fff"
                d="M234.11,47.7a9.19,9.19,0,0,1-2.4-.24V40.2a11.07,11.07,0,0,0,1.92.18,3.8,3.8,0,0,0,3.06-1,6.15,6.15,0,0,0,1-3.54L239,5.64h23.58v42h-8.4V13h-7.26L246,36.48q-.24,5.94-3,8.58C241.15,46.83,238.19,47.7,234.11,47.7Zm32.16-11.57v-19q0-5.76,3.3-8.94T279,5q6.12,0,9.42,3.18t3.3,8.94v19c0,3.83-1.1,6.82-3.3,8.93s-5.34,3.18-9.42,3.18-7.22-1.05-9.42-3.18S266.27,40,266.27,36.13Zm17,.29V16.86q0-4.5-4.32-4.5t-4.32,4.5V36.42q0,4.5,4.32,4.5T283.31,36.42ZM323,47.64h-9l-6.78-18.3-3.42,5.34v13h-8.4v-42h8.4v17.1l10.5-17.1h8.52L313,21.24Zm-197.16,0h-8.4V13h-8.76V5.64h25.92V13h-8.76Zm29.39,0H137V14h18.29V19.9H143.69v7.78h9.22v5.85h-9.22v8.26h11.57Zm8.26,0H157l7.77-17.23L157.37,14h7.25l4.32,10.56L173.41,14h6.48l-7.44,16.37,7.77,17.23H173l-4.7-11.47Zm26.35,0h-6.72V14h6.72V27.68h7.2V14h6.72v33.6h-6.72V33.53h-7.2Zm18-9.21V23.26a9.46,9.46,0,0,1,2.64-7.15q2.64-2.55,7.53-2.55t7.54,2.55a9.46,9.46,0,0,1,2.64,7.15V38.43a9.47,9.47,0,0,1-2.64,7.15q-2.64,2.55-7.54,2.55t-7.53-2.55A9.47,9.47,0,0,1,207.92,38.43Zm13.63.24V23q0-3.6-3.46-3.6T214.64,23V38.67q0,3.6,3.45,3.6T221.55,38.67Z"></path>
          <line stroke="#fff" y1="52.87" x2="324.33" y2="52.87"></line>
        </svg>
      </a>
      <?php wp_nav_menu( [
        'theme_location' => 'menu_header',
        'container' => 'nav',
        'container_class' => 'header__menu',
        'items_wrap' => '<ul>%3$s</ul>',
      ] ); ?>
      <div class="header__call">
        <button class="button button_fill button_w-icon" type="button" data-src="#modal-call" data-fancybox>
          <img src="<?= get_template_directory_uri() ?>/img/call-icon.png" alt="" width="23" height="22">
          <span>ЗАКАЗАТЬ ЗВОНОК</span>
        </button>
      </div>
      <div class="header__button">
        <button class="burger__button" type="button"><span></span><span></span><span></span><span></span></button>
      </div>
    </div>
  </div>
  <div class="burger__menu">
    <nav class="container burger__nav">
      <?php wp_nav_menu( [
        'theme_location' => 'menu_modal',
        'items_wrap' => '<ul class="burger__list">%3$s</ul>',
      ] ); ?>
      <button class="burger__button" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 320 512">
          <path fill="currentColor"
                d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path>
        </svg>
      </button>
    </nav>
  </div>
  <?php if( !is_front_page() && get_field( 'order_request', 'option' ) == 1 ) : ?>
    <button class="order__request header__order"
            type="button"
            data-src="#modal-request" data-fancybox>
      <img src="<?= get_template_directory_uri() ?>/img/calculation-icon.png" alt="">
      <span>ЗАКАЗАТЬ <br> РАСЧЕТ</span>
    </button>
  <?php endif; ?>
</header>
<main class="main<?= !is_front_page() ? ' main_page' : '' ?>">
