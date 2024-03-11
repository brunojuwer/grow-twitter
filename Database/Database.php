<?php

namespace Database;

class Database 
{
  
  private $data;
  
  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function persist(string $table, ...$value)
  {
    array_push($this->data[$table], ...$value);
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
}