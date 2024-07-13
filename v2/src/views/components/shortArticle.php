<?php
if (!function_exists('truncateText')) {
    function truncateText($text, $maxLength = 100) {
        if (strlen($text) > $maxLength) {
            return substr($text, 0, $maxLength) . '...';
        }
        return $text;
    }
}
?>

<article>
    <h3>
        <a href="article?id=<?php echo $article->getId(); ?>">
            <?php echo $article->getTitle(); ?>
        </a>
    </h3>
    <p>
        <?php echo truncateText($article->getContent(), 150); ?>
    </p>
</article>
