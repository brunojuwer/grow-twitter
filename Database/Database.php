<?php

namespace Database;

use Error;

class Database 
{
  
  private $data;
  
  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function persist(string $table, $value)
  {
    if($table === 'accounts') {
        try {
          $this->verifyIfUsernameAlreadyExists($value->getName());
          $this->verifyIfEmailAlreadyExists($value->getEmail());
        } catch (\Throwable $th) {
          echo "<pre>";
            echo $th->getMessage();
          echo "</pre>";
          die();
      }
    }

    array_push($this->data[$table], $value);
  }

  public function retrive(string $table, string $id)
  {
   $value = array_filter($this->data[$table], function($value) use ($id){
      return $value->getId() === $id;
    });
    return [...$value][0];
  }

  public function getAll(string $table): array
  {
      return $this->data[$table];
  }

  private function verifyIfUsernameAlreadyExists($username)
  {
      $value = array_filter($this->data['accounts'], function($value) use ($username){
        return $value->getName() === $username;
      });

      if($value){
        throw new Error("Username $username is already been taken! Please choose another one!");
      }
  }

  private function verifyIfEmailAlreadyExists($email)
  {
    $value = array_filter($this->data['accounts'], function($value) use ($email){
      return $value->getEmail() === $email;
    });

    if($value){
      throw new Error("Email $email is already been taken! Please choose another one!");
    }
  }
}