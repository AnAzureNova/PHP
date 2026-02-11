<?php
class User {
  public $name;
  public $email;
  public $password;
  public $usrid;

  function setUser($name, $email, $password, $usrid) {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->usrid = $usrid;
  }

  function getUser() {
    echo $this->name, $this->email, $this->password, $this->usrid;
  }
}
?>