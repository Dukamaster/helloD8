<?php

/**
 * @file
 * Contains \Drupal\language\Plugin\LanguageNegotiation\LanguageNegotiationUrl.
 */

namespace Drupal\hello\Plugin\LanguageNegotiation;

use Drupal\language\LanguageNegotiationMethodBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class for identifying language from the user preferences.
 *
 * @Plugin(
 *   id = \Drupal\hello\Plugin\LanguageNegotiation\LanguageNegotiationUserIp::METHOD_ID,
 *   weight = -4,
 *   name = @Translation("User IP"),
 *   description = @Translation("Follow the user's IP.")
 * )
 */
class LanguageNegotiationUserIp extends LanguageNegotiationMethodBase {

  /**
   * The language negotiation method id.
   */
  const METHOD_ID = 'language-hello';

  /**
   * {@inheritdoc}
   */
  public function getLangcode(Request $request = NULL) {
    $langcode = NULL;

    $ip = '118.69.52.129';
    $lang = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    // var_dump($lang);die();
    $langcode = $lang->country;


    // No language preference from the user.
    return $langcode;
  }

}
