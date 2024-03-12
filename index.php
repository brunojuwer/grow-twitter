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


// Criação e persistência de Users
$user1 = new User('brunojuwer', 'bruno@email.com', '123');
$user2 = new User('carlosjuwer', 'carlos@email.com', '123');
$user3 = new User('betina.mendes', 'betina@email.com', '123');
$user4 = new User('everton.23', 'everton@email.com', '123');
$user5 = new User('Breno1976', 'breno@email.com', '123');

$adm1 = new Admin('pedrojuwer', 'pedro@email.com', '123');
$adm2 = new Admin('valentinajuwer', 'valentina@email.com', '123');
$adm3 = new Admin('valentinajuwer', 'valentina123@email.com', '123'); // Usuário com username duplicado

$db->persist('accounts', $user1);
$db->persist('accounts', $user2);
$db->persist('accounts', $user3);
$db->persist('accounts', $user4);
$db->persist('accounts', $user5);
$db->persist('accounts', $adm1);
$db->persist('accounts', $adm2);
// $db->persist('accounts', $adm3); // Usuário com username duplicado

// Criação e persistência de Tweets
$tweet = new Tweet($user1, "Let's go do some metal music!");
$tweet2 = new Tweet($user3, "PHP is better than I thought! LMAO");
$tweet3 = new Tweet($user2, "array_filter() method in PHP may troll you as it did to me! kkkkk");

$db->persist('tweets', $tweet);
$db->persist('tweets', $tweet2);
$db->persist('tweets', $tweet3);

//Criação de Likes 
$like1 = new Like($user2->getName(), $user2->getId(), $tweet->getId());
$like2 = new Like($user3->getName(), $user3->getId(), $tweet->getId());
$like3 = new Like($user5->getName(), $user5->getId(), $tweet->getId());
$like4 = new Like($user1->getName(), $user1->getId(), $tweet3->getId());

$tweet->giveLike($like1);
$tweet->giveLike($like2);
$tweet->giveLike($like3);
$tweet3->giveLike($like4);

// Listagem detalhada dos Tweets

echo "<h2>Listagem dos tweets</h2>";
Tweet::show($db->retrive('tweets', $tweet->getId()));
Tweet::show($db->retrive('tweets', $tweet2->getId()));
Tweet::show($db->retrive('tweets', $tweet3->getId()));