<?php
  /**
   *
   */
  class Index extends MasterController
  {

    function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      $this->templet->title = "Abc mvc";
      $this->templet->render("index/index");
    }

    public function home($params = "")
    {
      print_r($params);
    }
  }

 ?>
