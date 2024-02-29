<?php
use Database\Database;
use Models\Admin;
use Models\User;

require_once './Database/Database.php';
require_once './Models/Roles.php';
require_once './Models/Account.php';
require_once './Models/User.php';
require_once './Models/Admin.php';

Database::setDatabaseSingleton();

$user1 = new User('brunojuwer', 'bruno@email.com', '123');
$user2 = new User('carlosjuwer', 'carlos@email.com', '123');

$adm1 = new Admin('pedrojuwer', 'pedro@email.com', '123');

$user1->printInfo();
$user2->printInfo();
$adm1->printInfo();

Database::printAllAccounts(); 