<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Esp Actu</title>
    <link rel="stylesheet" href="global.css">
</head>
<body>
    <main>
    <?php
        $page = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        require_once __DIR__ . '/components/header.php';
    ?>
        <div id="last-articles" class="container">
            <h2>Les derniers articles</h2>
            <section class="article-list flex">
                <?php
                    foreach ($articles as $article) {
                        require __DIR__ . '/components/shortArticle.php';
                    }
                ?>
            </section>
            <div class="btn-list flex">
                <a class="btn btn-secondary" href="accueil?page=<?php echo $page - 1; ?>">
                    Précédent
                </a>
                <a class="btn btn-primary" href="accueil?page=<?php echo $page + 1; ?>">
                    Suivant
                </a>
            </div>
        </div>
    </main>
</body>
</html>

