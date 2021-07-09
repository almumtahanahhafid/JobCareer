<?php

class App
{
  protected $controller = 'Alumni'; //default controller
  protected $method = 'index'; // default method
  protected $params = []; //default params


  public function __construct()
  {
    $url = $this->parseURL();

    // if URL is NULL
    if ($url == NULL) {
      $url = [$this->controller];
    }

    // is controller exist on url?
    if (file_exists("../app/controllers/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once "../app/controllers/" . $this->controller . ".php";
    $this->controller = new $this->controller;

    // is method exist on url?
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // if params exist on url
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // run controller & method, also params if exist
    call_user_func_array(
      [
        $this->controller,
        $this->method
      ],
      $this->params
    );
  }

  public function parseURL()
  {
    if (isset($_GET["url"])) {
      $url = $_GET["url"];
      $url = rtrim($url, '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);

      return $url;
    }
  }
}
