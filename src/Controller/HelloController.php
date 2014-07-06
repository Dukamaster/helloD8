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
    $kv = Drupal::keyValue('hello');
    $re = $kv->getAll();
    var_dump($re);die();
    // return $build;
  }
  public function helloWorld2($value) {
    $build = array(
      '#markup' => t("hello {$value}"),
    );
    return $build;
  }
}
