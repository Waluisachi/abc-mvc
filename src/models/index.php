<?php
/**
 *
 */
class IndexModel extends Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function users()
  {
    $SQL = "SELECT * FROM `users`";
    $data = $this->database->fetch($SQL);
    print_r($data);
  }

  public function insertUsers()
  {
    $SQL = "INSERT INTO `users`(`username`, `email`, `password`) VALUES (?, ?, ?)";
    $Params = ["JaneDoe", "janedoe@yahoo.com"];
    $data = $this->database->set($SQL, $Params);
    print_r($data);
  }

  public function updateUsers()
  {
    $SQL = "UPDATE `users` SET `username`=?,`email`= ?,`password`=? WHERE `id`=?";
    $params = [
      "newUserName",
      "newmail@domain.com",
      "1234678",
      1
    ];
    $data = $this->database->update($SQL, $params);
    print_r($data);
  }

  public function deleteUsers()
  {
    $SQL = "DELETE FROM `users` WHERE `id`=?";
    $params = [];
    $data = $this->database->delete($SQL, $params);
    print_r($data);
  }
}

 ?>
