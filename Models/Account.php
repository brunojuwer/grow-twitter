<?php

namespace Models;

abstract class Account 
{
  private $id;

  private $username;

  private $email;

  private $role;

  private $password;


  public function __construct($username, $email, $password, $role = Roles::USER)
  {
    $this->id = $this->generateID();
    $this->checkUniqueUsernameOrFail($username);
    $this->username = "@$username";
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;
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

  public static function list($data): void
  {
    echo "LISTA DE USUÁRIOS";
      foreach($data as $value)
      {
        echo "<pre>";
          echo "================================= <br />";
          echo " ID: $value->id <br />";
          echo " USERNAME: $value->username <br />";
          echo " EMAIL: $value->email <br />";
          echo " ROLE: $value->role <br />";
          echo "=================================";
        echo "<pre>";
      }
  }


  public function checkUniqueUsernameOrFail($username): void
  {

  }

  public function generateID()
  {
    return uniqid("", true);
  }
}