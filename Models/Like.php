<?php

namespace Models;

class Like 
{
  private $comment;
  private User $user;
  private Tweet $tweet;

  public function __construct($comment, User $user, Tweet $tweet)
  {
    $this->comment = $comment;
    $this->user = $user;
    $this->tweet = $tweet;
  }

  
  public function like()
  {
    $this->tweet->giveLike($this);
  }

}