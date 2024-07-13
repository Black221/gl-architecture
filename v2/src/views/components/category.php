<div class="category-details">
    <h2><?= $category->getLabel() ?></h2>
    <p class="d-flex">
        <?php if (isset($user) && $user->getRole() == "admin") : ?>
            <a href="category/modifier?category=<?= $category->getId() ?>" class="btn btn-sm btn-outline-primary mr-2">
                Modifier
            </a>
            <a href="category/supprimer?id=<?= $category->getId() ?>" class="btn btn-sm btn-outline-danger">
                Supprimer
            </a>
        <?php endif; ?>
    </p>
</div>
