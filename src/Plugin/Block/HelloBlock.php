<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\block\Annotation\Block;
use Drupal\block\BlockBase;
use Drupal\Core\Annotation\Translation;

/**
 * Provides a 'Example: uppercase this please' block.
 *
 * @Block(
 *   id = "hello_block",
 *   subject = @Translation("Display said hello admin"),
 *   admin_label = @Translation("Display said hello admin")
 * )
 */
class HelloBlock extends BlockBase {

  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {
    $username = \Drupal::currentUser()->getUsername();
    return array(
      '#type' => 'markup',
      '#markup' => t("<b>Hola, $username</b>"),
    );
  }

}
