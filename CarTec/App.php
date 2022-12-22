<?php
namespace CarTec;

class App {
  private $controller;

  public function setController() {
    $loadName = 'CarTec\Controllers\\';
    $url = explode('url', @$_GET['url'])[0];

    if ($url == '' && $url != 'singup') {
      $loadName .= 'Login';
    } else {
      $loadName .= ucfirst(strtolower($url));
    }
    
    $loadName .= 'Controller';

    if (file_exists($loadName.'.php')) {
      $this->controller = new $loadName();
    } else {
      include('Views/pages/404.php');
      die();
    }
  }

  public function run() {
    $this->setController();
    $this->controller->index();
  }
}
