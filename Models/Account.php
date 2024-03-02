<?php

namespace Models;

use Database\Database;

abstract class Account 
{
  private $id;

  private $username;

  private $email;

  private $role;

  private $password;

  protected Database $accountDatabase;


  public function __construct(Database $db, $username, $email, $password, $role = Roles::USER)
  {
    $this->accountDatabase = $db;

    $this->checkUniqueUsernameOrFail($username);
    $this->username = "@$username";
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;

    $this->accountDatabase->persist([
      'username' => $this->username,
      'email' => $this->email,
      'role' => $this->role,
      'password' => $this->password
    ]);
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

  public function checkUniqueUsernameOrFail($username): void
  {

  }

}