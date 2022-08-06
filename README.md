# ABC-mvc Is Routing and Rendering Engine.

## Overview
###### This is a PHP based system aiming at reducing work needed to setup a PHP web application project.
###### This engine provides the following modules under its basic contents:-
###### Rendering engine
###### Database connection module setup
###### Models 
###### Database CRUD oparations
## How it works
#### Controllers
##### Create a controller with name @example 'Index'. 
``` class Index extends MasterController
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
      $this->model->users();
      $this->model->insertUsers();
      $this->model->updateUsers();
      $this->model->deleteUsers();

    }
  }
  ```
##### Create a controller for each route 
#####
  ```` public function index()
    {
      $this->templet->title = "Abc mvc";
      $this->templet->render("index/index");
    } ````
  
  

