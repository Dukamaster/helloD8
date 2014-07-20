<?php

namespace Drupal\hello\Controller;
// use Drupal\Core\Controller\ControllerBase;
use Drupal;
use Drupal\Core\KeyValueStore\KeyValueStoreExpirableInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;

class HelloConfigController{
  public function showConfig() {
    $config = \Drupal::config('system.maintenance');

    $items = [
      'Maintenance message: '. $config->get('message'),
    ];

    $item_list = [
      '#theme' => 'item_list',
      '#items' => $items,
      '#title' => t('Read in maintenance system file')
    ];
    return drupal_render($item_list);
  }

  public function writeConfig() {
    $config = Drupal::config('system.performance');
    $cache_page_enable = $config->get('cache.page.enabled');
    $cache_page = $config->get('cache.page');
    $items = [
      'Cache page enale before rewrite: '. $cache_page_enable,
      'Cachage page before rewrite: '. $cache_page['use_internal']. '---'. $cache_page['max_age'],
      '*******************************************************'
    ];

    $config->set('cache.page.enabled', 1);
    $page_cache_data = array('enabled' => 1, 'max_age' => 5);
    $config->set('cache.page', $page_cache_data);
    $config->save();

    $items = [
      'Cache page enale after rewrite: '. $cache_page_enable,
      'Cachage page after rewrite: '. $cache_page['use_internal']. '---'. $cache_page['max_age'],
    ];

    $item_list = [
      '#theme' => 'item_list',
      '#items' => $items,
      '#title' => t('Read in maintenance system file')
    ];
    return drupal_render($item_list);
  }
}
