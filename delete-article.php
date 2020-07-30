<?php

require 'includes/init.php';

$db = new Database();
$conn = $db->getConn();

if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    if ( ! $article) {
        die("article not found");
    }

} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($article->delete($conn)){

            Url::redirect("/PHPForBegginers/index.php");

        } 
    }

?>
<?php require 'includes/header.php';?>
<h2> Delete article<h2>
  <form method="post">
<p> Are you sure you want to Delete this article?</p>
      <button>Delete</button>
    <!-- dont ask me about what that " " is doing alone there, after id I just followed the tutorial, it works.  -->
      <a href="/PHPForBegginers/article.php?id=<?= $article->id; ?>">Cancel</a>
  </form>
  <?php require 'includes/footer.php';?>
