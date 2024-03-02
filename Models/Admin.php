<?php

namespace Models;

use Database\Database;

class Admin extends Account
{
  public function __construct(Database $db, $username, $email, $password)
  {
    parent::__construct($db, $username, $email, $password, Roles::ADMIN);
  }
}