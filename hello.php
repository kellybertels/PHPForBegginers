<?php

$fruit = ['apple', 'banana', 'orange', 'mango'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fruit</title>
    </head>
    <body>

    <h1>Fruit</h1>

    <!-- put your code below this line -->
    <ol>
      <?php foreach($fruit as $f): ?>
          <li><?= $f ?></li>
      <?php endforeach; ?>
  </ol>
    </body>
</html>

<!-- using Var Dump to see the content of a variable and type-->
<?php
$message = "hello Again";
echo $message;
$count = 3;
$price = 1.99;

var_dump($message);
var_dump($count);
var_dump($price);

$is_admin = true;
$data=null;

var_dump($is_admin, $data);

?>
<!-- retrieving data using PHP, at index of array 2-->

<?php
$articles = [ "first", "another", "three"];
var_dump ($articles[2]);
?>





<?php
$count = 3;
$price = 9.99;
$articles = [
"message" => "hello World",
"count" => 150,
"pi" => 3.14,
"status" => false,
"result" => null
];

$values = [$count,$price];



var_dump ($articles);
var_dump($values);

?>
