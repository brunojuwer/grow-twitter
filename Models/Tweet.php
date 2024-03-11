<?php

namespace Models;

class Tweet 
{
    private string $id;

    private string $content;

    private User $user;

    private array $likes;

    private $created_at;

    private $updated_at;

    public function __construct(User $user, string $content)
    {
        $this->id = $this->generateID();
        $this->user = $user;
        $this->content = $content;
        $this->created_at = date("D M j G:i:s T Y");
        $this->likes = [];
    }

    public function giveLike($like): void
    {
        array_push($this->likes, $like);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLikes(): array
    {
        return $this->likes;
    }

    public static function list($data): void
    {
        echo "LISTA DE TWEETS";
        foreach($data as $value)
        {
            echo "<pre>";
            echo "================================= <br />";
            echo "{$value->user->getName()}: ";
            echo "$value->content <br />";
            echo " LIKES [$value->likes] <br />";
            echo "=================================";
            echo "<pre>";
        }
    }

    public static function show($data): void
    {
        echo "TWEET DETALHADO";
        echo "<pre>";
        echo "================================= <br />";
        echo "{$data->user->getName()}: ";
        echo "$data->content <br />";
        echo count($data->getLikes()) > 0 ? "LIKES [{$data->getLikes()}] <br />" : "";
        echo "=================================";
        echo "<pre>";
    }

    public function generateID()
    {
    return uniqid("", true);
    }

}