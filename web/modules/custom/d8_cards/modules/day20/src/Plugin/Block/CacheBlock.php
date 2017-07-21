<?php

namespace Drupal\day20\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Cache\DatabaseBackend;

/**
 * Provides a 'CacheBlock' block.
 *
 * @Block(
 *  id = "cache_block",
 *  admin_label = @Translation("Cache block"),
 * )
 */
class CacheBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\Core\Cache\DatabaseBackend definition.
   *
   * @var \Drupal\Core\Cache\DatabaseBackend
   */
  protected $cacheDefault;
  /**
   * Drupal\Core\Cache\DatabaseBackend definition.
   *
   * @var \Drupal\Core\Cache\DatabaseBackend
   */
  protected $cacheRender;
  /**
   * Constructs a new CacheBlock object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(
        array $configuration,
        $plugin_id,
        $plugin_definition,
        DatabaseBackend $cache_default, 
	DatabaseBackend $cache_render
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->cacheDefault = $cache_default;
    $this->cacheRender = $cache_render;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('cache.default'),
      $container->get('cache.render')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function build() {

    // Lets grab some nodes.
    $query = \Drupal::entityQuery('node');
    $query->sort('created','DESC');
    $nids = $query->execute();

    $build = [];
    $build['cache_block']['#markup'] = 'Implement CacheBlock.';

    return $build;
  }

}
