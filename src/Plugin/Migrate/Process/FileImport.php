<?php
/**
 * @file
 * Contain \Drupal\comics_migration\migrate\process
 */
namespace Drupal\d8_cards\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateSkipProcessException;
use Drupal\migrate\Annotation\MigrateProcessPlugin;
use Drupal\migrate\Row;

/**
 * Example on how to migrate an image from any place in Drupal.
 *
 * @MigrateProcessPlugin(
 *   id = "file_import"
 * )
 */

class FileImport extends ProcessPluginBase {
  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (empty($value)) {
      // Skip this item if there's no URL.
      throw new MigrateSkipProcessException();
    }

    // Save the file, return its ID.
    $file = system_retrieve_file($value, 'public://', TRUE, FILE_EXISTS_REPLACE);
    return $file->id();
  }

}