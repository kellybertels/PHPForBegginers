<?php
//the REDIRECT FUNCTION IS HERE IN THE HEADER, TO REDIRECT TO ANOTHER PAGE WHEN A NEW ARTICLE IS ADDED.

require 'includes/init.php';



if (! Auth::isLoggedIn()) {

    die("unauthorised");

}

$article = new Article();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database();
    $conn = $db->getConn();

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    if ($article->create($conn)) {

        Url::redirect("/PHPForBegginers/article.php?id={$article->id}");

    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>
