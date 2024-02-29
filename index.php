<?php
use Database\Database;
use Models\User;

require './Models/Account.php';
require './Models/User.php';

Database::setDatabaseSingleton();

$user1 = new User('brunojuwer', 'bruno@email.com', '123');
$user2 = new User('carlosjuwer', 'carlos@email.com', '123');

$user1->printInfo();
$user2->printInfo();

var_dump(Database::$users);