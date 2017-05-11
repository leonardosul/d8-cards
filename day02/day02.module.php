<?php

/**
 * @file
 * Contains day02.module.
 */

/**
 * Implements hook_theme().
 */
function day02_theme($existing, $type, $theme, $path) {
  return array(
    // Make Drupal aware of our paragraph template for default view mode.
    'paragraph__social_media__default' => array(
      'base hook' => 'paragraph',
    ),
  );
}
