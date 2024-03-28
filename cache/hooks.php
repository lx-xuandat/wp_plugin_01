<?php return array (
  'add_action' => 
  array (
    0 => 
    array (
      'hook_name' => 'plugins_loaded',
      'callback' => 
      array (
        0 => 'Datlx\\App\\I18n',
        1 => 'load_plugin_textdomain',
      ),
      'priority' => 10,
      'accepted_args' => 1,
    ),
    1 => 
    array (
      'hook_name' => 'admin_init',
      'callback' => 
      array (
        0 => 'Datlx\\App\\Admin\\Backend',
        1 => 'store',
      ),
      'priority' => 10,
      'accepted_args' => 1,
    ),
    2 => 
    array (
      'hook_name' => 'admin_menu',
      'callback' => 
      array (
        0 => 'Datlx\\App\\Admin\\Backend',
        1 => 'getStore',
      ),
      'priority' => 10,
      'accepted_args' => 1,
    ),
    3 => 
    array (
      'hook_name' => 'admin_menu',
      'callback' => 
      array (
        0 => 'Datlx\\App\\Admin\\Backend',
        1 => 'postStore',
      ),
      'priority' => 10,
      'accepted_args' => 1,
    ),
    4 => 
    array (
      'hook_name' => 'admin_menu',
      'callback' => 
      array (
        0 => 'Datlx\\App\\Admin\\WeatherSetting',
        1 => 'register',
      ),
      'priority' => 10,
      'accepted_args' => 1,
    ),
    5 => 
    array (
      'hook_name' => 'widgets_init',
      'callback' => 
      array (
        0 => 'Datlx\\App\\Frontend\\Frontend',
        1 => 'register_widget',
      ),
      'priority' => 10,
      'accepted_args' => 1,
    ),
  ),
); // cache-time: 2024-03-24 18:05:41