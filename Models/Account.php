<?php

namespace Models;

require './Database/Database.php';

use Database\Database;

abstract class Account 
{
  private $id;

  private $username;

  private $email;

  private $role = "DEFAULT";

  private $password;


  public function __construct($username, $email, $password)
  {
    $this->checkUniqueUsernameOrFail($username);

    $this->id = $this->generateAccountID();
    $this->username = "@$username";
    $this->email = $email;
    $this->password = $password;

    Database::persistAccount($this);
  }


  public function printInfo()
  {
    echo "<pre>";
      echo "================================= <br />";
      echo " ID: $this->id <br />";
      echo " USERNAME: $this->username <br />";
      echo " EMAIL: $this->email <br />";
      echo " ROLE: $this->role <br />";
      echo "=================================";
    echo "<pre>";
  }


  private function generateAccountID()
  {
    return uniqid("", true);
  }

  public function checkUniqueUsernameOrFail($username): void
  {

  }

}