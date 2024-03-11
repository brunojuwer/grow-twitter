<?php

use Models\Admin;
use Models\User;
use Models\Tweet;
use Database\Database;
use Models\Account;

require_once './Utils/functions.php';
require_once './Database/Database.php';
require_once './Models/Roles.php';
require_once './Models/Account.php';
require_once './Models/User.php';
require_once './Models/Admin.php';
require_once './Models/Tweet.php';

// Database inicialization
$db = new Database([
  'tweets' => [],
  'accounts' => [],
]);


// Users
$user1 = new User('brunojuwer', 'bruno@email.com', '123');
$user2 = new User('carlosjuwer', 'carlos@email.com', '123');

$adm1 = new Admin('pedrojuwer', 'pedro@email.com', '123');
$adm2 = new Admin('valentinajuwer', 'valentina@email.com', '123');

$db->persist('accounts', $user1, $user2, $adm1, $adm2);

User::list($db->getAll('accounts'));


// Tweets
$tweet = new Tweet($user1, "Let's go do some metal music!");

$db->persist('tweets', $tweet);

Tweet::list($db->getAll('tweets'));
