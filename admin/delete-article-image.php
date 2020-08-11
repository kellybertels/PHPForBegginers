<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    if ( ! $article) {
        die("article not found");
    }

} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $previous_image = $article->image_file;

    if ($article->setImageFile($conn, null)) {

        if ($previous_image) {
            unlink("../uploads/$previous_image");
            
        }
       
        Url::redirect("/PHPForBegginers/admin/edit-article-image.php?id={$article->id}");
    }
}

?>
<?php require '../includes/header.php'; ?>

<!-- //this is the validation code in case javascript is off -->
<h2>Delete article image</h2>

<?php if ($article->image_file) : ?>
    <img src="/PHPForBegginers/uploads/<?= $article->image_file; ?>">
<?php endif; ?>

<form method="post">

    <p>Are you sure?</p>

    <button>Delete</button>
    <a href="edit-article-image.php?id=<?= $article->id; ?>">Cancel</a>

</form>

<?php require '../includes/footer.php'; ?>
