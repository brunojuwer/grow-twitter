<?php

use Models\Admin;
use Models\User;
use Models\Tweet;
use Database\Database;
use Models\Account;
use Models\Like;

require_once './Utils/functions.php';
require_once './Database/Database.php';
require_once './Models/Roles.php';
require_once './Models/Account.php';
require_once './Models/User.php';
require_once './Models/Admin.php';
require_once './Models/Tweet.php';
require_once './Models/Like.php';

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

echo "<br> <hr> <br>";

// Tweets
$tweet = new Tweet($user1, "Let's go do some metal music!");
$tweet2 = new Tweet($user2, "PHP is better than I thought! LMAO");
$tweet3 = new Tweet($user2, "array_filter in PHP may troll you as it did to me! SOAB kkkkk");

$db->persist('tweets', $tweet, $tweet2, $tweet3);
Tweet::show($db->retrive('tweets', $tweet->getId()));
Tweet::show($db->retrive('tweets', $tweet2->getId()));
Tweet::show($db->retrive('tweets', $tweet3->getId()));

// Likes

$like1 = new Like("That is true", $user2, $tweet);
$like1->like();