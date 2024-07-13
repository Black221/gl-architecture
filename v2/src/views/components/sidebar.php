<nav id="sidebar">
    <h2>Catégories</h2>
    <ul>
        <?php foreach ($categories as $item) : ?>
            <li>
                <a href="articles?category=<?php echo $item->getId(); ?>">
                    <?php echo $item->getLabel(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>