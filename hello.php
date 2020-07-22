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
