<?php

function rusmar_motel_form_system_theme_settings_alter(&$form, $form_state) {
  $form['is_rio'] = array(
    '#type' => 'checkbox',
    '#title' => t('Is Rio Motel site?.'),
    '#default_value' => theme_get_setting('is_rio'),
  );

  $form['logo_rio_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Path to custom Rio logo'),
    '#default_value' => theme_get_setting('logo_rio_url'),
  );
}
