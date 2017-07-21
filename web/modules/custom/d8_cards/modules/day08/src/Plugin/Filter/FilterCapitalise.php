<?php
/**
 * @file
 * Contains Drupal\day08\Plugin\Filter\FilterCapitalise
 */
namespace Drupal\day08\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a filter to help celebrate good times!
 *
 * @Filter(
 *   id = "filter_capitalise",
 *   title = @Translation("Capitalise Filter"),
 *   description = @Translation("Capitalise everything into oblivion!"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 *   settings = {
 *     "words_to_cap" = "",
 *   }
 * )
 */
class FilterCapitalise extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $words_to_cap_string = $this->settings['words_to_cap'] ?: '';
    $words_to_cap = array_map('trim', explode(',', $words_to_cap_string));

    $new_text = $text;

    foreach ($words_to_cap as $key => $word) {
      $new_text = str_replace($word, strtoupper($word), $new_text);
    }

    return new FilterProcessResult($new_text);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['words_to_cap'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Words to capitalise'),
      '#default_value' => $this->settings['words_to_cap'],
      '#description' => $this->t('List of words that should be capitalised, separated by a commna.'),
    );
    return $form;
  }
}