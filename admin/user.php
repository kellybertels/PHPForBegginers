<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
    $user = User::getAll($conn);
} else {
    $user = null;
}

?>
<?php require '../includes/header.php'; ?>


    <article>
        <!-- //this code makes the article do not repeat when it is in more than one category -->
        <h2><?= htmlspecialchars($user[0]['title']); ?></h2>
        <?php if ($user) : ?>
    <?php if ($user[0]['published_at']) : ?>
                            <time><?= $user[0]['published_at'] ?></time>
                        <?php else : ?>
                            Unpublished
                        <?php endif; ?>
<?php if($user[0]['category_name']) : ?>

<p>Categories: <?php foreach($user as $a) : ?>
    <?= htmlspecialchars($a['category_name']); ?>
<?php endforeach;?>
</p>


    <?php endif ?>
        <?php if ($user[0]['image_file']) : ?>
            <img src="/PHPForBegginers/uploads/<?= $user[0]['image_file']; ?>">
        <?php endif; ?>

        <p><?= htmlspecialchars($user[0]['content']); ?></p>
    </article>

    <a href="edit-article.php?id=<?= $user[0]['id']; ?>">Edit</a>
     <a class="delete" href="delete-user.php?id=<?= $user[0]['id']; ?>">Delete</a>


<?php else : ?>
    <p>Article not found.</p>
<?php endif; ?>

<?php require '../includes/footer.php'; ?>
