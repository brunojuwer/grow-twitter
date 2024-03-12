<?php

namespace Models;

class Like 
{

  public function __construct(
    private string $userName,
    private string $userId,
    private string $tweetId,
  )
  {
    $this->userId = $userId;
    $this->userName = $userName;
    $this->tweetId = $tweetId;
  }
  
  public function getUserId()
  {
    return $this->userId;
  }

  public function getUsername()
  {
    return $this->userName;
  }

  public function getTweetId()
  {
    return $this->tweetId;
  }

}