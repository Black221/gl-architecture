<?php

    if (isset($_SESSION['user'])) {
        $user = User::fromArray($_SESSION['user']);
    }
?>
<header>
    <h1>Accueil Esp Actu</h1>
    <nav>
        <ul>
            <li><a href="accueil">Accueil</a></li>
            <li><a href="articles">Articles par catégorie</a></li>
        <?php 
            if (isset($user)) {
        ?>
            <li><a href="nouveau-article">Créer un article</a></li>
            <li><a href="nouvelle-categorie">Créer une catégorie</a></li>
        <?php
                if (strtolower($user->getRole()) == "admin") {
        ?>
            <li><a href="utilisateurs">Utilisateurs</a></li>
        <?php
                }
        ?>
            <li><a href="logout">Déconnexion</a></li> 
        <?php
            }
        ?>
        </ul>
    </nav>
</header>