<?php
//the REDIRECT FUNCTION IS HERE IN THE HEADER, TO REDIRECT TO ANOTHER PAGE WHEN A NEW ARTICLE IS ADDED.

require '../includes/init.php';

Auth::requireLogin();

$article = new Article();
$category_ids = [];

$conn = require '../includes/db.php';
$category_ids = array_column($article->getCategories($conn), 'id');
$categories = Category::getAll($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   


    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    $category_ids = $_POST['category'] ?? [];

    if ($article->create($conn)) {
        $article->setCategories($conn,$category_ids);

        Url::redirect("/PHPForBegginers/admin/article.php?id={$article->id}");

    }
}

?>
<?php require '../includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require '../includes/footer.php'; ?>
