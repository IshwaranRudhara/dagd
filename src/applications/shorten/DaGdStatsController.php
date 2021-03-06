<?php

final class DaGdStatsController extends DaGdShortenController {
  public function getHelp() {
    return array(
      'title' => 'stats',
      'summary' => 'Display basic stats for a short url.',
      'path' => 'stats',
      'examples' => array(
        array(
          'arguments' => array('g'),
          'summary' => 'An example short URL with a custom suffix'),
      ));
  }

  public function configure() {
    parent::configure()
      ->setWrapPre(true)
      ->setStyle(null);
    return $this;
  }

  public function render() {
    $stats = $this->getStatsForURL($this->route_matches[1]);
    if ($stats === null) {
      return error404();
    }
    $resp = '';
    foreach ($stats as $k => $v) {
      $resp .= $k.': '.$v."\n";
    }
    return $resp;
  }
}
