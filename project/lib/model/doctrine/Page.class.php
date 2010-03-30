<?php

/**
 * Page
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7380 2010-03-15 21:07:50Z jwage $
 */
class Page extends BasePage {

  public function getSlugize() {
    // Remove all non url friendly characters with the unaccent function
    $text = Doctrine_Inflector::unaccent($this->get('title'));

    if (function_exists('mb_strtolower')) {
      $text = mb_strtolower($text);
    } else {
      $text = strtolower($text);
    }

    // Remove all none word characters
    $text = preg_replace('/\W/', ' ', $text);

    // More stripping. Get rid of all non-alphanumeric.
    $text = strtolower(preg_replace('/[^A-Z^a-z^0-9^\/]+/', '', $text));

    return trim($text, '-');
  }
}
