<div>
    <h2>
        <?= $category->getLabel() ?>
    </h2>
    <p class="flex">
    <?php
        if (isset($user) && $user->getRole() == "admin") {
            echo "<a href='category?action=modifier&id=" . $category->getId() . "'>Modifier</a>";
            echo "<a href='category?action=spprimer&id=" . $category->getId() . "'>Supprimer</a>";
        }
    ?>
    </p>
</div>