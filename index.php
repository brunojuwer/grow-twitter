<?php

use Database\AccountDatabase;
use Database\TweetDatabase;
use Models\Admin;
use Models\User;
use Models\Tweet;

require_once './Database/Database.php';
require_once './Database/AccountDatabase.php';
require_once './Database/TweetDatabase.php';
require_once './Models/Roles.php';
require_once './Models/Account.php';
require_once './Models/User.php';
require_once './Models/Admin.php';
require_once './Models/Tweet.php';

$accountDb = new AccountDatabase();
$tweetDb = new TweetDatabase();

$user1 = new User($accountDb, 'brunojuwer', 'bruno@email.com', '123');
$user2 = new User($accountDb, 'carlosjuwer', 'carlos@email.com', '123');

$adm1 = new Admin($accountDb, 'pedrojuwer', 'pedro@email.com', '123');
$adm2 = new Admin($accountDb, 'valentinajuwer', 'valentina@email.com', '123');

$user1->printInfo();
$user2->printInfo();
$adm1->printInfo();
$adm2->printInfo();


$tweet = new Tweet($tweetDb);

$tweet->criarTweet($user1, "Let's go do some metal music!");
