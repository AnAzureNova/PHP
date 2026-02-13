<?php
class User {
  public $name;
  public $email;
  public $password;
  public $perms;

  function setUser($name, $email, $password, $perms) {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->perms = $perms;
  }
}

//default admin account
$admin = new User();
$admin->setUser("admin", "admin@mail.com", "admin123", "admin");
$userString = "user.admin";
$_SESSION[$userString] = serialize($admin);
?>