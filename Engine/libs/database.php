<?php
/**
 * @Type class {Database class for handlng db functions }
 */
class Database extends PDO
{
  /***
  * @Type { function}
  * @Defination { __construct }
  * @Params DB_HOST { $DB_HOST }
  * @Params DB_NAME { $DB_NAME }
  * @Params DB_USERNAME { $DB_USERNAME }
  * @Params DB_PASSWORD { $DB_PASSWORD }
  * @Return connection { null }
  *  Clears connection
  ***/
  function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USERNAME, $DB_PASSWORD)
  {
    parent::__construct($DB_TYPE.":host=".$DB_HOST.";dbname=".$DB_NAME, $DB_USERNAME, $DB_PASSWORD);

    try {
      $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage());
    }

    $this->engine = new Engine();

  }

  /***
  * @Type { function}
  * @Defination { get }
  * @Params Query { $SQL }
  * @Return data ([])
  ***/
  public function get($QUERY='')
  {
    //PREPARED STATEMENT
    $STATEMENT = parent::prepare($QUERY);

    if ($STATEMENT) {
      $STATEMENT->execute($QUERY);

      return $STATEMENT->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return self::get_error();
    }
  }

  /***
  * @Type { function}
  * @Defination { fetch }
  * @Params Query { $SQL }
  * @Params Query Params { params }
  ***/
  public function fetch($SQL='', $params = array())
  {
    try {
      $QUERY = $this->prepare($SQL);
      $params = is_array($params) ? $params : array($params);
      $QUERY->execute($params);

      return $QUERY->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Error Processing Request". $e->getMessage());
    }

  }

  /***
  * @Type { function}
  * @Defination { set }
  * @Params Query { $SQL }
  * @Params Query Params { params }
  ***/
  public function set($SQL='', $params = array())
  {
    if ($this->engine->__empty($params)) {
      json_encode(["success" => false, "error" => "Empty params"]);
    }
    try {
      $QUERY = $this->prepare($SQL);
      $params = is_array($params) ? $params : array($params);
      $QUERY->execute($params);
      return true;
    } catch (PDOException $e) {
      throw new Exception("Error Processing Request". $e->getMessage(), 1);
    }

  }


  /***
  * @Type { function}
  * @Defination { update }
  * @Params Query { $SQL }
  * @Params Query Params { params }
  ***/
  public function update($SQL='', $params = array())
  {
    if ($this->engine->__empty($params)) {
      json_encode(["success" => false, "error" => "Empty params"]);
    }

    try {
      $QUERY = $this->prepare($SQL);
      $params = is_array($params) ? $params : array($params);
      $QUERY->execute($params);

      return true;
    } catch (Exception $e) {
      throw new Exception("Error Processing Request". $e->getMessage(), 1);

    }

  }


  /***
  * @Type { function}
  * @Defination { delete }
  * @Params Query { $SQL }
  * @Params Query Params { params }
  ***/
  public function delete($SQL='', $params = array())
  {
    if ($this->engine->__empty($params)) {
      return json_encode(["success" => false, "error" => "Empty params"]);
    }

    try {
      $QUERY = $this->prepare($SQL);
      $params = is_array($params) ? $params : array($params);
      $QUERY->execute($params);

      return true;
    } catch (Exception $e) {
      throw new Exception("Error Processing Request". $e->getMessage(), 1);

    }

  }


  /***
  * @Type { function}
  * @Defination { get_error }
  * @Return error { $error }
  *
  ***/
  public function get_error()
  {
    $this->connection->get_error();
  }


  /***
  * @Type { function}
  * @Defination { __destruct }
  * @Return connection { null }
  *  Clears connection
  ***/
  public function __destruct()
  {
    $this->connection = null;
  }
}

 ?>
