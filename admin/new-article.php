<?php
//the REDIRECT FUNCTION IS HERE IN THE HEADER, TO REDIRECT TO ANOTHER PAGE WHEN A NEW ARTICLE IS ADDED.

require '../includes/init.php';

Auth::requireLogin();

$article = new Article();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = require '../includes/db.php';


    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    if ($article->create($conn)) {

        Url::redirect("/PHPForBegginers/admin/article.php?id={$article->id}");

    }
}

?>
<?php require '../includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require '../includes/footer.php'; ?>
