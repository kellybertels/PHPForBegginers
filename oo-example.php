<?php

require 'Item.php';
require 'Book.php';

$my_item = new Item();


echo $my_item->getListingDescription();

//echo $my_item->code;


$book = new Book();
echo $book->getCode();

echo "<br>";

$book->name = 'Hamlet';
$book->author = 'Shakespeare';

echo $book->getListingDescription();