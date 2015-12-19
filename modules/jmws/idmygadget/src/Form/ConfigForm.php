<?php

namespace Drupal\idMyGadget\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigForm extends ConfigFormBase {
  public function getFormId() {
    return 'idmygadget_config';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('idmygadget.settings');

   $supported_gadget_detectors = array(
      'detect_mobile_browsers',   // note that this is used as the default throughout
      'mobile_detect',
      'tera_wurfl',
      'no_detection'      // defaults to desktop (allows for isolating responsive behavior)
   );
   //
   // Add a section to the module's Settings screen that contains
   // radio buttons allowing the admin to set the device detector.
   // This shows up under Configuration -> IdMyGadget -> Gadget Detector
   //
   $form['idmygadget_gadget_detector'] = array(
      '#type' => 'radios',
      '#title' => t('Gadget Detector (ConfigForm)'),
      // '#default_value' => $supported_gadget_detectors[0],
	  '#default_value' => $config->get('idmygadget_gadget_detector'),
      '#options' => $supported_gadget_detectors,
      '#description' => $this->t('Select the 3rd party device detector to use for this site.'),
      '#required' => TRUE,
   );

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $config = $this->config('idmygadget.settings');
    $config->set('idmygadget_gadget_detector', $form_state->getValue('idmygadget_gadget_detector'));
    $config->save();
  }

  public function getEditableConfigNames() {
    return ['idMyGadget.settings'];
  }
}
