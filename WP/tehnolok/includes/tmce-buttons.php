<?php
// Регистрация файла стилей для редактора
function add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}

// Указываем пути конфигурации кнопок
function adem_tiny_mce_add_buttons( $buttons_array ) {
  $buttons_config_path = get_template_directory_uri() . '/tmce-button.js';
  $buttons_array[ 'custom_buttons' ] = $buttons_config_path;
  return $buttons_array;
}

// Регистрируем добавленные кнопки
function adem_tiny_mce_register_buttons( $buttons ) {
  array_push( $buttons, 'custom_buttons' );
  return $buttons;
}

function adem_tiny_mce_buttons() {
  // Проверяем привилегии пользователя
  if( !current_user_can( 'edit_posts' ) &&
    !current_user_can( 'edit_pages' ) ) {
    return;
  }

  if( get_user_option( 'rich_editing' ) !== 'true' ) {
    return;
  }

  add_filter( 'mce_external_plugins', 'adem_tiny_mce_add_buttons' );
  add_filter( 'mce_buttons', 'adem_tiny_mce_register_buttons' );
}

// Инициализация кнопок редактора
function adem_tiny_mce_setup() {
  // Регистрация файла стилей для редактора
  add_action( 'admin_init', 'add_editor_styles' );
  // Добавление кнопок
  add_action( 'init', 'adem_tiny_mce_buttons' );
}

add_action( 'after_setup_theme', 'adem_tiny_mce_setup' );


// Настраиваем элементы списка форматов
function adem_tiny_mce_formats( $init_array ) {
  $style_formats = [
    [
      'title' => 'Выделенный текст',
      'block' => 'div',
      'classes' => 'highlight-text',
      'wrapper' => true,
    ]
  ];

  $init_array[ 'style_formats' ] = json_encode( $style_formats );
  return $init_array;
}

add_filter( 'tiny_mce_before_init', 'adem_tiny_mce_formats' );