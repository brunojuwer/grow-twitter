<?php

namespace Models;

abstract class Account 
{
  protected $id;

  protected $username;

  protected $email;

  protected $role;

  protected $password;

  protected $ative = true;


  public function __construct($username, $email, $password, $role = Roles::USER)
  {
    $this->id = $this->generateID();
    $this->username = "@$username";
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;
  }

  public function getId(): string
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->username;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function deactivate(): void
  {
    $this->ative = false;
  }

  public function isActive(): bool
  {
    return $this->ative;
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

  public function generateID()
  {
    return uniqid("", true);
  }
}