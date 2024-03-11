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

$db = new Database([
  'tweets' => [],
  'accounts' => [],
]);

$user1 = new User('brunojuwer', 'bruno@email.com', '123');
$user2 = new User('carlosjuwer', 'carlos@email.com', '123');

$adm1 = new Admin('pedrojuwer', 'pedro@email.com', '123');
$adm2 = new Admin('valentinajuwer', 'valentina@email.com', '123');

$db->persist('accounts', $user1, $user2, $adm1, $adm2);

User::list($db->getAll('accounts'));


// $user1->printInfo();
// $user2->printInfo();
// $adm1->printInfo();
// $adm2->printInfo();


$tweet = new Tweet($tweetDb);

$tweet->criarTweet($user1, "Let's go do some metal music!");

$tweet->getAllTweetes();
