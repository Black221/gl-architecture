<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="global.css">
    <style>
        .form-group {
    margin-bottom: 1rem; /* Espacement entre les groupes de champs */
}

.form-control {
    width: 100%; /* Largeur maximale des champs de formulaire */
}

.btn-primary {
    background-color: #007bff; /* Couleur bleue pour le bouton Envoyer */
    border-color: #007bff; /* Couleur de bordure bleue */
}

.btn-primary:hover {
    background-color: #0056b3; /* Couleur bleue plus foncée au survol */
    border-color: #0056b3;
}


    </style>
</head>
<body>
    <main>
        <?php 
            require_once __DIR__ . '/components/header.php';
            require_once __DIR__ .'/components/articleForm.php';
        ?>
    </main>
</body>
</html>