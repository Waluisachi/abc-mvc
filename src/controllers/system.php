<?php
/**
 * @Type { Parent class for the engine }
 */
class System extends MasterController
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->templet->title = "404 PAGE";
    $this->templet->render("commons/404", false);
  }
}

 ?>
