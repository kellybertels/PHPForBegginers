<?php

class Item
{
    public CONST MAX_LENGHT =24;
    public $name;

    public $description;




  public function getName(){
      return $this->name;
  }

    public function setName($name)
    {
        $this->name = $name;
    }
}
