<?php

 require 'includes/init.php';

$conn = require 'includes/db.php';

//using Null coalescing operator to do the pagination PHP 7
$paginator = new Paginator ($_GET['page'] ?? 1, 4);

$articles = Article::getPage($conn, $paginator->limit,$paginator->offset);

?>
<?php require 'includes/header.php'; ?>



<?php if (empty($articles)) : ?>
    <p>No articles found.</p>
<?php else : ?>

    <ul>
        <?php foreach ($articles as $article) : ?>
            <li>
                <article>
                    <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>
                    <p><?= htmlspecialchars($article['content']); ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>