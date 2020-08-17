<?php
// инициализация темы
if( !function_exists( 'theme_setup' ) ) {
  function theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );

    register_nav_menus( [
      'menu_header' => 'Меню в шапке',
      'menu_modal' => 'Меню в бургере',
    ] );

    add_theme_support( 'html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ] );
  }
}
add_action( 'after_setup_theme', 'theme_setup' );

// удалят стили гутенберга
add_action( 'wp_enqueue_scripts', 'tehnolok_remove_wp_block_library_css', 100 );
function tehnolok_remove_wp_block_library_css() {
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
}

// подключение стилей и скриптов
add_action( 'wp_enqueue_scripts', 'tehnolok_scripts' );
function tehnolok_scripts() {
  wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
  wp_enqueue_style( 'customScrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css' );
  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' );
  wp_enqueue_script( 'libs', get_template_directory_uri() . '/js/libs.min.js', [ 'jquery' ], null, true );
  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.js', [ 'jquery', 'libs' ], null, true );
  wp_enqueue_script('yandex-map', '//api-maps.yandex.ru/2.1/?lang=ru_RU', [], null, false);
}

// js переменные
add_action( 'wp_head', 'js_variables' );
function js_variables() {
  $variables = [
    'ajax_url' => admin_url( 'admin-ajax.php' ),
  ];
  echo '<script type="text/javascript">window.wp_data = ' . json_encode( $variables ) . ';</script>';
}

// регистрация миниатюр
add_action( 'after_setup_theme', 'tehnolok_register_images_thumbnails' );
function tehnolok_register_images_thumbnails() {
  add_image_size( '165x170', 165, 170, true );
  add_image_size( '195x275', 195, 275, true );
  add_image_size( '210x270', 210, 270, true );
  add_image_size( '260x160', 260, 160, true );
  add_image_size( '273x185', 273, 185, true );
  add_image_size( '300x180', 300, 180, true );
  add_image_size( '325x160', 325, 160, true );
  add_image_size( '340x340', 340, 340, true );
  add_image_size( '345x210', 345, 210, true );
  add_image_size( '345x540', 345, 540, true );
  add_image_size( '360x220', 360, 220, true );
  add_image_size( '360x250', 360, 250, true );
  add_image_size( '360x500', 360, 500, true );
  add_image_size( '390x250', 390, 250, true );
  add_image_size( '450x450', 450, 450, true );
  add_image_size( '480x400', 480, 400, true );
  add_image_size( '515x160', 515, 160, true );
  add_image_size( '515x290', 515, 290, true );
  add_image_size( '545x200', 545, 200, true );
  add_image_size( '620x450', 620, 450, true );
  add_image_size( '630x355', 630, 355, true );
  add_image_size( '695x390', 690, 390, true );
  add_image_size( '750x500', 750, 500, true );
  add_image_size( '935x525', 935, 525, true );
}

// Регистрация типов постов
add_action( 'init', 'tehnolok_register_post_types' );
function tehnolok_register_post_types() {
  register_post_type( 'review', [
    'label' => null,
    'labels' => [
      'name' => 'Отзывы',
      'singular_name' => 'Отзыв',
      'add_new' => 'Добавить отзыв',
      'add_new_item' => 'Добавить отзыв',
      'edit_item' => 'Редактировать отзыв',
      'new_item' => 'Новый отзыв',
      'view_item' => 'Смотреть отзыв',
      'search_items' => 'Найти отзыв',
      'not_found' => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'menu_name' => 'Отзывы',
    ],
    'public' => true,
    'show_in_menu' => true,
    'menu_position' => 22,
    'menu_icon' => 'dashicons-format-chat',
    'supports' => [ 'title', 'editor', 'thumbnail' ],
    'taxonomies' => [ 'review_type' ],
    'has_archive' => false,
    'rewrite' => true,
    'query_var' => true,
    'publicly_queryable' => false
  ] );
}

// Регистрация таксономий
add_action( 'init', 'tehnolok_register_taxonomies' );
function tehnolok_register_taxonomies() {
  register_taxonomy( 'review_type', [ 'review' ], [
    'labels' => [
      'name' => 'Типы отзывов',
      'singular_name' => 'Тип отзыва',
      'search_items' => 'Найти тип отзыва',
      'all_items' => 'Все типы',
      'view_item ' => 'Смотреть тип отзыва',
      'edit_item' => 'Редактировать тип отзыва',
      'update_item' => 'Обновить тип отзыва',
      'add_new_item' => 'Добавить новый тип отзыва',
      'new_item_name' => 'Новый тип отзыва',
    ],
    'public' => true,
    'hierarchical' => true,
    'rewrite' => true,
    'capabilities' => array(),
    'meta_box_cb' => null,
    'show_admin_column' => true,
    '_builtin' => false,
  ] );
}

require 'includes/acf.php';
require 'includes/col-thumb.php';
require 'includes/excerpt.php';
require 'includes/send-mail.php';
//require 'includes/tmce-buttons.php';