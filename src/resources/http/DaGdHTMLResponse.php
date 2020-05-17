<?php

final class DaGdHTMLResponse extends DaGdResponse {
  public function getHeaders() {
    $headers = array(
      'Content-type' => 'text/html; charset=utf-8',
    );
    $headers = array_merge(parent::getHeaders(), $headers);
    return $headers;
  }

  public function getBody() {
    $body = parent::getBody();
    if (!($body instanceof Tag)) {
      throw new Exception(
        'Attempt to render DaGdHTMLResponse but body was not an instance of '.
        'Tag. Did you mean to use DaGdHTMLStringResponse instead?');
    }
    return $body->renderSafe();
  }
}
