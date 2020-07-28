<?php

require 'Item.php';
require 'Book.php';

$my_item = new Item();
$my_item->name = "TV";

echo $my_item->getListingDescription();


echo "<br>";


$book = new Book();
$book->name = 'Hamlet';
$book->author = 'Shakespeare';

echo $book->getListingDescription();