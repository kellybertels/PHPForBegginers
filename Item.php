<?php
//parent of book 
//any change in the parent will affect child class. 
class Item
{
    public $name;
    protected $code = 1234;

    public function getListingDescription()
    {
        return "Item:" . $this->name;
    }
}
