<?php
namespace Drupal\hello\Form;
use Drupal\Core\Form\FormBase;
use Drupal;
use Drupal\Core\KeyValueStore\KeyValueStoreExpirableInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;

use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Language\Language as Lang;

class HelloLangForm extends FormBase {
  public function getFormId() {
    // Unique ID of the form.
    return 'lang_form';
  }

  public function buildForm(array $form, array &$form_state) {
    // Create a $form API array.
    $form['ip'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your IP')
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
    $ip = $form_state['values']['ip'];
    $a = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $language_list = language_list(Lang::STATE_ALL);
    print_r($language_list);die();
  }
}
