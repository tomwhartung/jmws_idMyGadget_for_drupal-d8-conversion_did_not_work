<?php

namespace Drupal\idMyGadget\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigForm extends ConfigFormBase {
  public function getFormId() {
    return 'idMyGadget_config';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('idMyGadgets.settings');

//    $form['default_count'] = [
//      '#type' => 'number',
//      '#title' => $this->t('Default hug count'),
//      '#default_value' => $config->get('default_count'),
//    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $config = $this->config('idMyGadget.settings');
    $config->set('default_count', $form_state->getValue('default_count'));
    $config->save();
  }

  public function getEditableConfigNames() {
    return ['idMyGadget.settings'];
  }
}
