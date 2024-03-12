<?php
declare(strict_types = 1);

namespace Models;

class Reply
{

  public function __construct(
    private string $content,
    private string $tweetId,
    private string $username,
  )
  {
    $this->content = $content;    
    $this->tweetId = $tweetId;    
    $this->username = $username;    
  }

  public function getContent(): string
  {
    return $this->content;
  }

  public function getTweetId(): string
  {
    return $this->tweetId;
  }

  public function getUsername(): string
  {
    return $this->username;
  }

}