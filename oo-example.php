<?php

require 'Item.php';

$my_item = new Item('Huge','a Big item');

$my_item->name = 'Example';
$my_item->description = 'Anew desc';

$item2 = new Item('Huge','a Big item');
$item2->name = 'Another name example';

echo $my_item->getName()," ", $item2->getName();
