<?php

function dd($value)
{
  if(is_array($value)){
    echo '<pre>';
      print_r($value);
    echo '</pre>';
    die();
  }

  echo '<pre>';
    var_dump($value);
  echo '</pre>';
  die();
}