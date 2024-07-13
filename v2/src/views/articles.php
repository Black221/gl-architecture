<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Esp Actu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="global.css">
    <style>
        /* Styles spécifiques */
        .article-list {
            margin-top: 20px;
        }
        .article-list .article {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .article-list .article h3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <main>
        <?php require_once __DIR__ . '/components/header.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once __DIR__ . '/components/sidebar.php'; ?>
                </div>
                <div class="col-md-9">
                    <div id="last-articles">
                        <h2 class="mb-4">
                            <?php require_once __DIR__ . '/components/category.php'; ?>
                        </h2>
                        <section class="article-list">
                            <?php foreach ($articles as $article) : ?>
                                <div class="article">
                                    <?php require __DIR__ . '/components/shortArticle.php'; ?>
                                </div>
                            <?php endforeach; ?>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
