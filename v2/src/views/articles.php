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
        require_once __DIR__ . './components/header.php';
    ?>
        <div class="flex">
            <?php
                require_once __DIR__ . '/components/sidebar.php';
            ?>
            <div id="last-articles" class="container">
                <h2>
                    <?php 
                    require_once __DIR__ ."/components/category.php"; ?>

                </h2>
                <section class="article-list flex-col">
                    <?php
                        foreach ($articles as $article) {
                            require __DIR__ . '/components/shortArticle.php';
                        }
                    ?>
                </section>
            </div>
        </div>
    </main>
</body>
</html>