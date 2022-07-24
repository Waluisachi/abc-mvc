<?php
/**
 * @Type class
 * Parent controller class to be extended by all controllers
 */
class MasterController
{

  /***
  * @Type { function}
  * @Defination { __construct }
  * @Return viewer templeting class instance
  ***/
  function __construct()
  {
    $this->templet = new Render();
  }

  /***
  * @Type { function}
  * @Defination { loadModel }
  * @Params model name { $model }
  * @Return model instance
  ***/
  public function loadModel($model='')
  {
    if (!empty($model)) {
      $path = "src/models/".$model.".php";
      if (file_exists($path)) {
        require("src/models/".$model.".php");
        $model = $model."Model";
        $this->model = new $model();
        return $this->model;
      }
    }
  }
}

 ?>
