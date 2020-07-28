<?php

class Item
{

public $name;
public $description='This is a Default Value';

function __construct($name, $description){
$this->name = $name;
$this->description = $description;

}
  function sayHello(){
  echo "Hello";
  }

  	 function getName(){
      return $this->name;
    }


}
