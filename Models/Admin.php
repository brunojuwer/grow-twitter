<?php

namespace Models;

require_once './Models/Account.php';

class Admin extends Account
{
  public function __construct($username, $email, $password)
  {
    parent::__construct($username, $email, $password, Roles::ADMIN);
  }

  public function blockUser(User $user): void
  {
    $user->deactivate();
  }
}