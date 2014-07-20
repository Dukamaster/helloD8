<?php
namespace Drupal\hello\Form;
use Drupal\Core\Form\FormBase;
use Drupal;
use Drupal\Core\KeyValueStore\KeyValueStoreExpirableInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;

class HelloForm extends FormBase {
  public function getFormId() {
    // Unique ID of the form.
    return 'example_form';
  }

  public function buildForm(array $form, array &$form_state) {
    // Create a $form API array.
    $form['phone_number'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Your phone number')
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  public function validateForm(array &$form, array &$form_state) {
    // Validate submitted form data.
  }

  public function submitForm(array &$form, array &$form_state) {
    $kv = Drupal::keyValue('hello');
    $kv->set('phone', $form_state['values']['phone_number']);
    drupal_set_message($this->t('Success'));
  }
}
