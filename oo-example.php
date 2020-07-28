<?php

require 'Item.php';

$my_item = new Item('Huge', 'A big item');

$item2 = new Item('Small', 'A tiny item');

Item::showCount();

$my_item->name = "A new name";

echo $my_item->getName();
