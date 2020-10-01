<?php

// require 'includes/init.php'; why write multiple lines for same process . Reduce the code.

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn, true));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);

?>
<?php require 'includes/header.php'; ?>

<?php if (empty($articles)) : ?>
    <p>No articles found.</p>
<?php else : ?>

    <ul id= "index">
        <?php foreach ($articles as $article) : ?>
            <li>
                <article>
                    <h2 id=aTitle ><a href="article.php?id=<?php = $article['id']; ?>"><?php = htmlspecialchars($article['title']); ?></a></h2>

                    <time datetime="<?php = $article['published_at'] ?>"><?php
                        $datetime = new DateTime($article['published_at']);
                        echo $datetime->format("j F, Y");
                    ?></time>

                    <?php if ($article['category_names']) : ?>
                        <p id="categories">Categories:
                            <?php foreach ($article['category_names'] as $name) : ?>

                                <?php = htmlspecialchars($name); ?>
                                
                            <?php endforeach; ?>
                        </p>
                        <?php else : ?>
                    <?php endif; ?>

                    <p><?php = htmlspecialchars($article['content']); ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require 'includes/pagination.php'; ?>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>
