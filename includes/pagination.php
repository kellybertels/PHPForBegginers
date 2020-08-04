<!-- 
 strtok is a string tokenizer function to not repeat the pages.
https://www.php.net/manual/en/function.strtok.php
 -->
<?php $base = strtok($_SERVER["REQUEST_URI"], '?'); ?>



<nav>
        <ul>
            <li>
                <?php if ($paginator -> previous): ?>
                <a href="<?= $base; ?> ?page=<?= $paginator->previous; ?>">Previous</a>
                <?php else: ?>
                Previous
                <?php endif;?>
            </li>
            <li>
                <?php if ($paginator-> next): ?>
                <a href="<?= $base; ?>?page=<?= $paginator->next; ?>">Next</a>
                <?php else: ?>
                    Next
                <?php endif; ?>
            </li>
        </ul>
    </nav>