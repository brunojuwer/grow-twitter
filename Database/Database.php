<?php

namespace Database;

abstract class Database 
{
  
  protected $data = [];
  
  public function persist($value)
  {
    $value['id'] = $this->generateID();
    return array_push($this->data, $value);
  }

  public function retrive(string $id)
  {
    return array_filter($this->data, function($value) use ($id){
      return $value->id === $id;
    })[0];
  }

  public function generateID()
  {
    return uniqid("", true);
  }


  public function printAll(): void
  {
    echo "<pre>";
      print_r($this->data);
    echo "</pre>";
  }
}