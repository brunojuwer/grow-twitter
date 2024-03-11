<?php

namespace Models;

class Tweet 
{
    private string $id;

    private string $content;

    private User $user;

    private int $likes = 0;

    private $created_at;

    private $updated_at;

    public function __construct(User $user, string $content)
    {
        $this->id = $this->generateID();
        $this->user = $user;
        $this->content = $content;
        $this->created_at = date("D M j G:i:s T Y");
    }

    public static function list($data): void
    {
        echo "LISTA DE TWEETS";
        foreach($data as $value)
        {
            echo "<pre>";
            echo "================================= <br />";
            echo " USERNAME: {$value->user->name}: ";
            echo "$value->content <br />";
            echo " LIKES [$value->likes] <br />";
            echo "=================================";
            echo "<pre>";
        }
    }

    public function generateID()
    {
    return uniqid("", true);
    }

}