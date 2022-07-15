<?php

/**
 * @Type Class {Loader}
 */
class Loader
{
  public $URI;
  public $controller;
  public $path;
  public $error;

  function __construct()
  {
    if (isset($_GET['url'])) {
      $this->URI = $_GET['url'];
      $this->URI = rtrim($this->URI, '/');
      $this->URI = explode('/', $this->URI);
    } else {
      $this->URI = null;
    }

    if (!isset($this->URI[0])) {
      require ("./src/controllers/index.php");
      $this->controller = new Index();
      $this->controller->index();
      return false;
    }

    $this->path = "src/controllers/".$this->URI[0].".php";

    if (file_exists($this->path)) {
      require ($this->path);
      $this->controller = new $this->URI[0]();

      if (!empty($this->URI[2])) {
        if (method_exists($this->controller, $this->URI[1])) {
          $this->controller->{$this->URI[1]}($this->URI[2]);
        } else {
          $this->error();
        }
      } elseif (!empty($this->URI[1])) {
        if (method_exists($this->controller, $this->URI[1])) {
          $this->controller->{$this->URI[1]}();
        } else {
          $this->error();
        }
      } else {
        $this->controller->index();
      }

    } else {
      $this->error();
    }


  }

  public function error()
  {
    require ("./src/controllers/system.php");
    $this->controller = new System();
    $this->controller->index();
  }
}

 ?>
