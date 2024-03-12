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

        $this->verifyUserStatus('tweet');

        $this->content = $content;
        $this->created_at = date("D M j G:i:s T Y");
        $this->likes = [];
    }
    
    public function getId(): string
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }
    
    public function getLikes(): array
    {
        return $this->likes;
    }

    public function giveLike($like): void
    {
        $this->verifyUserStatus('like');
        array_push($this->likes, $like);
    }

    private function verifyUserStatus($action): void
    {
        if(!$this->user->isActive()){
            echo "User {$this->user->getName()} is blocked and cannot $action!";
            die();
        }
    }


    public static function listAll($tweets): void
    {
        foreach($tweets as $tweet)
        {
            self::show($tweet);
        }
    }

    public static function show($data): void
    {
        echo "<pre>";
        echo "================================= <br />";
        echo "{$data->user->getName()}: ";
        echo "$data->content <br />";
        echo self::showLikes($data);
        echo "=================================";
        echo "</pre>";
    }

    private static function showLikes($data): string
    {
        if(count($data->getLikes()) === 0) {
            return  "[" . count($data->getLikes()) . " likes] <br />";
        }

        if(count($data->getLikes()) === 1) {
            return  "[" . $data->getlikes()[0]->getUsername() . " liked this] <br />";
        }

        return "[" . $data->getlikes()[count($data->getlikes()) - 1]->getUsername() . " and other " 
            . count($data->getLikes() ) - 1 . " user liked this] <br />";
    }

    public function generateID()
    {
    return uniqid("", true);
    }

}