<?php

namespace Database;

use Models\Account;

class Database 
{
  
  private static $instance = null;

  private static $users = [];
  
  private static $tweets = [];

  private function __construct() {}

  public static function setDatabaseSingleton() {
    if (is_null(self::$instance)) {
      self::$instance = new self();
    }
  }

  public static function persistAccount(Account $user): void
  {
    array_push(self::$users, $user);
  }

  public static function retriveAccount(string $id): Account
  {
    return array_filter(self::$users, function($user) use ($id){
      return $user->id === $id;
    })[0];
  }

  public static function printAllAccounts(): void
  {
    echo "<pre>";
      print_r(self::$users);
    echo "</pre>";
  }
}