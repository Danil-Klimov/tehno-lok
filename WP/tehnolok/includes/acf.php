<?php
// страница настроек ACF
if( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page( [
    'page_title' => 'Настройки сайта',
    'menu_title' => 'Настройки сайта',
    'menu_slug' => 'options',
    'capability' => 'edit_posts',
    'position' => 64,
    'parent_slug' => '',
    'icon_url' => false,
    'update_button' => 'Обновить',
    'updated_message' => 'Настройки обновлены',
  ] );
  acf_add_options_sub_page( [
    'page_title' => 'Общие',
    'menu_title' => 'Общие',
    'menu_slug' => 'options_main',
    'capability' => 'edit_posts',
    'position' => false,
    'parent_slug' => 'options',
    'icon_url' => false,
    'update_button' => 'Обновить',
    'updated_message' => 'Настройки обновлены',
  ] );
  acf_add_options_sub_page( [
    'page_title' => 'Блоки',
    'menu_title' => 'Блоки',
    'menu_slug' => 'blocks',
    'capability' => 'edit_posts',
    'position' => 64,
    'parent_slug' => 'options',
    'icon_url' => false,
    'update_button' => 'Обновить',
    'updated_message' => 'Настройки обновлены',
  ] );
}

// Возвращать индекс ACF ряда начиная с 0
add_filter( 'acf/settings/row_index_offset', '__return_zero' );