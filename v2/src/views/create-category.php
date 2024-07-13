<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle categorie</title>
    <link rel="stylesheet" href="global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-group {
            margin-bottom: 1.5rem; /* Espacement entre les groupes de champs */
        }

        .form-control {
            width: 100%; /* Largeur maximale des champs de formulaire */
        }

    </style>
    </head>
<body>
    <main>
        <?php 
            require_once __DIR__ . '/components/header.php';?>
            <h4 style="text-align: center;">Nouvelle categorie</h4>
            <?php require_once __DIR__ . '/components/categoryForm.php';
        ?>
    </main>
</body>
</html>