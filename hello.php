
<?php

$fruit = ['apple', 'banana', 'orange', 'mango'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fruit</title>
    </head>
    <body>

    <h1>Fruit List</h1>

    <!-- put your code below this line -->
    <ol>
      <?php foreach($fruit as $f): ?>
          <li><?= $f ?></li>
      <?php endforeach; ?>
  </ol>
    </body>

<html>

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

<!--Code that uses vardump to output array , inside another array -->
<?php

$articles = [
["title" =>"First post", "content" => "this is the first post"],
["title" =>"Another post", "content" => "Another Post to read here"],
["title" =>"Third Post", "content" => "you must read this article!"],

];
var_dump($articles);

?>

<!-- Code for the Blog post functionality: For each loop  -->
<?php

$articles = [ "First Post", "second Post", "read This"];
foreach($articles as $article){
  echo $article, ", ";
}

?>

<!-- Mixing HTML and PHP: Exercise from course solution-->
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

<?php if($fruit):?>
  <p>frui exist</p>

<?php endif; ?>

    </body>
</html>
<!--Ordered List using For Each Loop -->
1.	<ol>
2.	    <?php foreach($fruit as $f): ?>
3.	        <li><?= $f ?></li>
4.	    <?php endforeach; ?>
5.	</ol>
<p>lol, I think I got a bug here. :P </p>
=======
<?php

$fruit = ['apple', 'banana', 'orange', 'mango'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fruit</title>
    </head>
    <body>

    <h1>Fruit List</h1>

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



<!-- <h1>Var dump autputing array, Data types </h1> -->

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


<!--Code that uses vardump to output array , inside another array -->
<?php

$articles = [
["title" =>"First post", "content" => "this is the first post"],
["title" =>"Another post", "content" => "Another Post to read here"],
["title" =>"Third Post", "content" => "you must read this article!"],

];
var_dump($articles);

?>

<!-- Code for the Blog post functionality: For each loop  -->
<?php

$articles = [ "First Post", "second Post", "read This"];
foreach($articles as $article){
  echo $article, ", ";
}

?>

<!-- Mixing HTML and PHP: Exercise from course solution-->
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

<?php if($fruit):?>
  <p>frui exist</p>

<?php endif; ?>

    </body>
</html>
<!--Ordered List using For Each Loop -->
1.	<ol>
2.	    <?php foreach($fruit as $f): ?>
3.	        <li><?= $f ?></li>
4.	    <?php endforeach; ?>
5.	</ol>


</html>
