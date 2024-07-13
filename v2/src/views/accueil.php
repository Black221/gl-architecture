<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Esp Actu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="global.css">
</head>
<body>
    <main>
    <?php
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
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
                <a class="btn btn-outline-secondary <?php echo $page <= 0 ? 'disabled' : ''; ?>" href="accueil?page=<?php echo max(1, $page - 1); ?>">
                    Précédent
                </a>
                <a class="btn btn-outline-primary" href="accueil?page=<?php echo $page + 1; ?>">
                    Suivant
                </a>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
