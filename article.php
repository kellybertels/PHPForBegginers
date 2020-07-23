<?php
include 'database.php';
//the isset will avoid the attacker to remove the get string
//this code will avoid SQL injection ( a security issue) checking if the id, is numeric
if(isset($_GET['id'])&& is_numeric($_GET['id'])){



$sql = "SELECT *
        FROM article
        WHERE id = " . $_GET['id'];

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $article = mysqli_fetch_assoc($results);
}
//the end of the code to avoid SQL injection, it will set value to null if isnt numeric
} else {
  $article = null;
}
?>
 <?php require 'header.php';?>
        <?php if ($article === null): ?>
            <p>Article not found.</p>
        <?php else: ?>

            <article>
                <h2><?= $article['title']; ?></h2>
                <p><?= $article['content']; ?></p>
            </article>

        <?php endif; ?>
   <?php require 'footer.php';?>
