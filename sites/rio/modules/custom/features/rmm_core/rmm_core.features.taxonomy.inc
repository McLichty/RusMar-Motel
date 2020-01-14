<?php

/**
 * @file
 * rmm_core.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function rmm_core_taxonomy_default_vocabularies() {
  return array(
    'sections' => array(
      'name' => 'Sections',
      'machine_name' => 'sections',
      'description' => 'Specific sections of the site so views can be created for them.',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'tags' => array(
      'name' => 'Tags',
      'machine_name' => 'tags',
      'description' => 'Use tags to group articles on similar topics into categories.',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
