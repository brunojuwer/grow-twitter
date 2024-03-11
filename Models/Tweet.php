<?php

namespace Models;

use Database\Database;

class Tweet 
{
    private string $id;

    private string $content;

    private User $user;

    private int $likes = 0;

    private $created_at;

    private $updated_at;

    private Database $db;


    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function criarTweet(User $user, string $content): void
    {
        $this->user = $user;
        $this->content = $content;
        $this->created_at = date("D M j G:i:s T Y");

        $this->db->persist([
            'user' => $this->user,
            'content' => $this->content,
            'likes' => $this->likes,
            'created_at' => $this->created_at,
            'updated_at'=> $this->updated_at = null
        ]);
    }

    public function getAllTweetes()
    {
        $this->db->printAll();
    }

}