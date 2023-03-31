<?php

namespace Drupal\ms_user_assign\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\NodeType;

/**
 * Configure MS User Assign settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ms_user_assign_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['ms_user_assign.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['content_types'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Content types'),
      '#description' => $this->t('Select the content types that should be available in the module.'),
      '#options' => [],
      '#default_value' => $this->config('ms_user_assign.settings')->get('content_types'),
    ];

    $node_types = NodeType::loadMultiple();
    foreach ($node_types as $node_type) {
      $form['content_types']['#options'][$node_type->id()] = $node_type->label();
    }

    return parent::buildForm($form, $form_state);
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
    $this->config('ms_user_assign.settings')
      ->set('content_types', $form_state->getValue('content_types'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
