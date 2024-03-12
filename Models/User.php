<?php

namespace Models;

use Models\Account;

require_once './Models/Account.php';

class User extends Account
{
  private $following = [];

  public function getFollowing(): array
  {
    return $this->following;
  }

  public function follow(User $user): void
  {
    if($user->getId() === $this->id){
      echo "You cannot follow yoursef!";
      die();
    }

    if(!$this->isActive()){
      echo "User {$this->getName()} is blocked and cannot like!";
      die();
    }

    array_push($this->following, [
      'id' => $user->getId(),
      'username' => $user->getName()
    ]);
  }

  public static function showFeed($userId, $following, $tweets): void
  {
    $myTweets = self::getOwnTweets($userId, $tweets);
    $followwingTweets = self::getTweetsOfFollowUsers($tweets, $following);
    
    $tweetsToShow = array_merge($myTweets, $followwingTweets);

    foreach ($tweetsToShow as $tweet) {
      $tweet::show($tweet);
    }
  }

  private static function getOwnTweets($userId, $tweets): array
  {
    return array_filter($tweets, function($tweet) use ($userId) {
      return $tweet->getuser()->getId() === $userId;
    });
  }

  private static function getTweetsOfFollowUsers($tweets, $following): array
  {
    return array_reduce($following, function($carry, $follow) use ($tweets) {
        $filtered = array_filter($tweets, function($tweet) use ($follow) {
          return $tweet->getUser()->getId() === $follow['id'];
        });

        array_push($carry, ...$filtered);
        return $carry;
    }, []);
  }
}