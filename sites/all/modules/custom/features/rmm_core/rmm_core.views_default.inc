<?php

/**
 * @file
 * rmm_core.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function rmm_core_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'rooms';
  $view->description = 'various views of room information';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'rooms';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'rates';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_date',
      'rendered' => 1,
      'rendered_strip' => 0,
    ),
  );
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Relationship: Date Range field_rooms */
  $handler->display->display_options['relationships']['field_rooms_target_id']['id'] = 'field_rooms_target_id';
  $handler->display->display_options['relationships']['field_rooms_target_id']['table'] = 'field_data_field_rooms';
  $handler->display->display_options['relationships']['field_rooms_target_id']['field'] = 'field_rooms_target_id';
  $handler->display->display_options['relationships']['field_rooms_target_id']['ui_name'] = 'Date Range field_rooms';
  $handler->display->display_options['relationships']['field_rooms_target_id']['label'] = 'Date Range field_rooms';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Date */
  $handler->display->display_options['fields']['field_date']['id'] = 'field_date';
  $handler->display->display_options['fields']['field_date']['table'] = 'field_data_field_date';
  $handler->display->display_options['fields']['field_date']['field'] = 'field_date';
  $handler->display->display_options['fields']['field_date']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_date']['settings'] = array(
    'format_type' => 'medium',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title_1']['id'] = 'title_1';
  $handler->display->display_options['fields']['title_1']['table'] = 'node';
  $handler->display->display_options['fields']['title_1']['field'] = 'title';
  $handler->display->display_options['fields']['title_1']['relationship'] = 'field_rooms_target_id';
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['relationship'] = 'field_rooms_target_id';
  /* Field: Content: Price */
  $handler->display->display_options['fields']['field_room_price']['id'] = 'field_room_price';
  $handler->display->display_options['fields']['field_room_price']['table'] = 'field_data_field_room_price';
  $handler->display->display_options['fields']['field_room_price']['field'] = 'field_room_price';
  $handler->display->display_options['fields']['field_room_price']['settings'] = array(
    'thousand_separator' => ' ',
    'decimal_separator' => '.',
    'scale' => '2',
    'prefix_suffix' => 1,
  );
  /* Field: Content: Increase by */
  $handler->display->display_options['fields']['field_date_increase_percentage']['id'] = 'field_date_increase_percentage';
  $handler->display->display_options['fields']['field_date_increase_percentage']['table'] = 'field_data_field_date_increase_percentage';
  $handler->display->display_options['fields']['field_date_increase_percentage']['field'] = 'field_date_increase_percentage';
  $handler->display->display_options['fields']['field_date_increase_percentage']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_date_increase_percentage']['settings'] = array(
    'thousand_separator' => ' ',
    'prefix_suffix' => 1,
  );
  /* Filter criterion: Content: Published or admin */
  $handler->display->display_options['filters']['status_extra']['id'] = 'status_extra';
  $handler->display->display_options['filters']['status_extra']['table'] = 'node';
  $handler->display->display_options['filters']['status_extra']['field'] = 'status_extra';
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'date_range' => 'date_range',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'rates-old';
  $export['rooms'] = $view;

  $view = new view();
  $view->name = 'slideshow_home';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Slideshow Home';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'views_nivo_slider';
  $handler->display->display_options['style_options']['imagefield_preset'] = 'large';
  $handler->display->display_options['style_options']['effect'] = array(
    'random' => 'random',
  );
  $handler->display->display_options['style_options']['controlNav'] = 'basic';
  $handler->display->display_options['style_options']['controlNavThumbsField'] = 'field_slideshow_img';
  $handler->display->display_options['style_options']['controlNavThumbsIC'] = 'thumbnail';
  $handler->display->display_options['row_plugin'] = 'nivo_sliderfields';
  $handler->display->display_options['row_options']['image_field'] = 'field_slideshow_img';
  /* Field: Content: Image */
  $handler->display->display_options['fields']['field_slideshow_img']['id'] = 'field_slideshow_img';
  $handler->display->display_options['fields']['field_slideshow_img']['table'] = 'field_data_field_slideshow_img';
  $handler->display->display_options['fields']['field_slideshow_img']['field'] = 'field_slideshow_img';
  $handler->display->display_options['fields']['field_slideshow_img']['label'] = '';
  $handler->display->display_options['fields']['field_slideshow_img']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_slideshow_img']['hide_empty'] = TRUE;
  $handler->display->display_options['fields']['field_slideshow_img']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_slideshow_img']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Section */
  $handler->display->display_options['filters']['tid']['id'] = 'tid';
  $handler->display->display_options['filters']['tid']['table'] = 'taxonomy_index';
  $handler->display->display_options['filters']['tid']['field'] = 'tid';
  $handler->display->display_options['filters']['tid']['ui_name'] = 'Section';
  $handler->display->display_options['filters']['tid']['value'] = array(
    2 => '2',
  );
  $handler->display->display_options['filters']['tid']['type'] = 'select';
  $handler->display->display_options['filters']['tid']['vocabulary'] = 'sections';

  /* Display: Block: Slideshow Home */
  $handler = $view->new_display('block', 'Block: Slideshow Home', 'block');
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Section */
  $handler->display->display_options['filters']['tid']['id'] = 'tid';
  $handler->display->display_options['filters']['tid']['table'] = 'taxonomy_index';
  $handler->display->display_options['filters']['tid']['field'] = 'tid';
  $handler->display->display_options['filters']['tid']['ui_name'] = 'Section';
  $handler->display->display_options['filters']['tid']['value'] = array(
    1 => '1',
  );
  $handler->display->display_options['filters']['tid']['type'] = 'select';
  $handler->display->display_options['filters']['tid']['vocabulary'] = 'sections';

  /* Display: Block: Slideshow Attractions */
  $handler = $view->new_display('block', 'Block: Slideshow Attractions', 'block_1');
  $export['slideshow_home'] = $view;

  return $export;
}
