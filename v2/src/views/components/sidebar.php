<nav id="sidebar" class="bg-light">
    <div class="sidebar-header">
        <h2 class="text-primary">Catégories</h2>
    </div>
    <ul class="list-unstyled components">
        <?php foreach ($categories as $item) : ?>
            <li>
                <a href="articles?category=<?php echo $item->getId(); ?>" >
                    <?php echo $item->getLabel(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
