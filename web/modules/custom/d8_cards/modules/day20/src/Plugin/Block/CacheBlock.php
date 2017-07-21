<?php

namespace Drupal\day20\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a 'CacheBlock' block.
 *
 * @Block(
 *  id = "cache_block",
 *  admin_label = @Translation("Cache block"),
 * )
 */
class CacheBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    // Set up some variables.
    $title_string = '';
    $cache_tags = [];
    $tags = [];
    $title_string_cache = \Drupal::cache()->get('title_string_cache');

    // If no cache lets query and populate.
    if (!$title_string_cache || !$title_string_cache->data) {
      $nodes = node_get_recent(5);
      
      foreach ($nodes as $node) {
        $title_string = $title_string . '-[' . $node->getTitle() . ']';
        $cache_tags[] = $node->getCacheTags();
      }

      // Clean up cache tag array.
      foreach ($cache_tags as $cache_tag) {
        $tags[] = $cache_tag[0];
      }

      // Set cache, and include cache tags from the nodes we just loaded.
      $title_string_cache = \Drupal::cache()->set('title_string_cache', $title_string, Cache::PERMANENT, $tags);

    }
    else {
      $title_string = \Drupal::cache()->get('title_string_cache')->data;
      $tags = \Drupal::cache()->get('title_string_cache')->tags;
    }

    $build['cache_block'] = [
      '#markup' => $title_string,
      '#cache' => [
        'keys' => ['title-string-cache'],
        'tags' => $tags,
      ],
    ];

    return $build;
  }

}
