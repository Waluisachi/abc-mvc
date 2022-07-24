<?php
/**
 * @Type Class { Model}
 * Parent model class
 */
class Model
{

  /***
  * @Type { function}
  * @Defination { __construct }
  * @Return new database connection ($this->connection)
  ***/
  function __construct()
  {
    $this->engine = new Engine();
    $this->database = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
  }
}

 ?>
