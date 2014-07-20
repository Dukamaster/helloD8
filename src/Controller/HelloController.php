<?php

namespace Drupal\hello\Controller;
// use Drupal\Core\Controller\ControllerBase;
use Drupal;
use Drupal\Core\KeyValueStore\KeyValueStoreExpirableInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;

class HelloController{
  public function helloWorld() {
    $build = array(
      '#markup' => t('The Block Example provides three sample blocks which demonstrate the various block APIs. To experiment with the blocks, enable and configure them on <a href="@url">the block admin page</a>.', array('@url' => url('admin/structure/block'))),
    );
    return $build;
  }
  public function helloName($value) {
    $build = array(
      '#markup' => t("hello {$value}"),
    );
    return $build;
  }

  public function configLang() {
    $original_language = Drupal::configFactory()->getLanguage();
    var_dump($original_language);die();
    $language = language_load($account->getPreferredLangcode());
    Drupal::configFactory()->setLanguage($language);
    $mail_config = Drupal::config('user.mail');

    return $original_language;
  }
}
