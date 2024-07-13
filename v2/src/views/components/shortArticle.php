<article>
    <h3>
        <a href="article?id=<?php echo $article->getId(); ?>">
            <?php echo $article->getTitle(); ?>
        </a>
    </h3>
    <p>
        <?php echo $article->getContent(); ?>
    </p>
</article>
