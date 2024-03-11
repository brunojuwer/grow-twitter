<?php

namespace Models;

class Admin extends Account
{
  public function __construct($username, $email, $password)
  {
    parent::__construct($username, $email, $password, Roles::ADMIN);
  }
}