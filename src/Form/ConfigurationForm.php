<?php

/**
 * @file
 * Contains \Drupal\d8_cards\Form\ConfigurationForm.
 */

namespace Drupal\d8_cards\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Class ConfigurationForm.
 */
class ConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['day3.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'd8_cards_day_03_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // Pull in settings.
    $config_settings = $this->config('day3.settings');

    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#required' => TRUE,
      '#default_value' => $config_settings->get('title'),
    );

    $form['develop'] = array(
      '#type' => 'checkbox',
      '#title' => t('I would like to be involved in developing this material'),
      '#default_value' => $config_settings->get('develop'),
    );

    $form['description'] = array(
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#default_value' => $config_settings->get('description'),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Lets save some values.
    $this->config('day3.settings')
      ->set('title', $form_state->getValue('title'))
      ->set('develop', $form_state->getValue('develop'))
      ->set('description', $form_state->getValue('description'))
      ->save();
  }

}
