<article>
    <h3>
        <a href="article?id=<?php echo $article->getId(); ?>">
            <?php echo $article->getTitle(); ?>
        </a>
    </h3>
    <p>
        <?php echo $article->getContent(); ?>
    </p>
    <p class="flex">
        <span class="date">
            Créé le <?php echo $article->getCreatedAt(); ?>
        </span>
        <span class="date">
            Modifié le <?php echo $article->getUpdatedAt(); ?>
        </span>    
    </p>
    <p class="flex">
        <?php
            if (isset($user) && $user->getRole() == "admin") {
                echo "<a href='article?action=modifier&id=" . $article->getId() . "'>Modifier</a>";
                echo "<a href='article?action=supprimer&id=" . $article->getId() . "'>Supprimer</a>";
            }
        ?>
    </p>
</article>
