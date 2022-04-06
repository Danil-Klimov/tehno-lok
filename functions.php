<?php

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

// инициализация темы
if( !function_exists( 'theme_setup' ) ) {
  function theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );

    register_nav_menus( [
      'menu_header' => 'Меню в шапке',
      'menu_modal' => 'Меню в бургере',
      'menu_information' => 'Меню "Информация"',
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
  wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/vendor/css/jquery.fancybox.min.css', array(), '3.5.7' );
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/vendor/js/jquery.fancybox.min.js', [ 'jquery' ], '3.5.7', true );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendor/css/swiper-bundle.min.css', array(), '6.8.4' );
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/js/swiper-bundle.min.js', array(), '6.8.4', true );
  wp_enqueue_style( 'mCustomScrollbar', get_template_directory_uri() . '/assets/vendor/css/jquery.mCustomScrollbar.css', array(), '3.1.13' );
	wp_enqueue_script('mCustomScrollbar', get_template_directory_uri() . '/assets/vendor/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '3.1.13', true );
	wp_enqueue_style('adem', get_stylesheet_uri(), array(), _S_VERSION);
  wp_enqueue_script( 'adem', get_template_directory_uri() . '/assets/js/main.js', [ 'jquery' ], _S_VERSION, true );
//  wp_enqueue_script( 'yandex-map', '//api-maps.yandex.ru/2.1/?lang=ru_RU', [], null, false );
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
  add_image_size( '43x43', 43, 43, true );
  add_image_size( '105x110', 105, 110, true );
	add_image_size( '165x125', 165, 125, true );
	add_image_size( '165x170', 165, 170, true );
  add_image_size( '195x275', 195, 275, true );
  add_image_size( '200x130', 200, 130, true );
  add_image_size( '210x270', 210, 270, true );
  add_image_size( '260x160', 260, 160, true );
  add_image_size( '273x185', 273, 185, true );
  add_image_size( '290x145', 290, 145, true );
  add_image_size( '300x180', 300, 180, true );
  add_image_size( '325x160', 325, 160, true );
  add_image_size( '340x340', 340, 340, true );
  add_image_size( '345x210', 345, 210, true );
  add_image_size( '345x540', 345, 540, true );
  add_image_size( '360x220', 360, 220, true );
  add_image_size( '360x250', 360, 250, true );
  add_image_size( '360x360', 360, 360, true );
  add_image_size( '360x500', 360, 500, true );
  add_image_size( '390x250', 390, 250, true );
  add_image_size( '450x450', 450, 450, true );
  add_image_size( '480x400', 480, 400, true );
  add_image_size( '490x470', 490, 470, true );
  add_image_size( '515x160', 515, 160, true );
  add_image_size( '515x290', 515, 290, true );
  add_image_size( '545x200', 545, 200, true );
  add_image_size( '620x450', 620, 450, true );
  add_image_size( '630x355', 630, 355, true );
  add_image_size( '695x390', 690, 390, true );
  add_image_size( '720x260', 720, 260, true );
  add_image_size( '720x540', 720, 540, true );
  add_image_size( '750x500', 750, 500, true );
  add_image_size( '820x460', 820, 460, true );
  add_image_size( '935x525', 935, 525, true );
  add_image_size( '1140x260', 1140, 260, true );
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

// привязка рубрик к страницам
add_action( 'admin_init', 'true_apply_categories_for_pages' );
function true_apply_categories_for_pages() {
  add_meta_box( 'categorydiv', 'Категории', 'post_categories_meta_box', 'page', 'side', 'normal' ); // добавляем метабокс категорий для страниц
  register_taxonomy_for_object_type( 'category', 'page' ); // регистрируем рубрики для страниц
}

// префикс в хлебных крошках
add_filter( 'wpseo_breadcrumb_links', 'custom_breadcrumbs' );
function custom_breadcrumbs( $links ) {
  global $post;
  if( in_category( 'novosti' ) ) {
    $breadcrumb[] = array(
      'url' => site_url( '/novosti' ),
      'text' => 'Новости',
    );
    array_splice( $links, 1, -2, $breadcrumb );
  } elseif( in_category( 'stati' ) ) {
    $breadcrumb[] = array(
      'url' => site_url( '/stati' ),
      'text' => 'Статьи',
    );
    array_splice( $links, 1, -2, $breadcrumb );
  }
  return $links;
}

require 'inc/acf.php';
require 'inc/col-thumb.php';
require 'inc/excerpt.php';
require 'inc/send-mail.php';
require 'inc/filter.php';
require 'inc/information-menu.php';
//require 'includes/load-more.php';
require 'inc/tmce-buttons.php';
require 'inc/traffic.php';
