<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle categorie</title>
    <link rel="stylesheet" href="global.css">
    </head>
<body>
    <main>
        <?php 
            require_once '/components/header.php';
        ?>
        <h1>Nouvelle categorie</h1>
        <form action="/category" method="POST">
            <label for="label">Label</label>
            <input type="text" name="label" id="label">
            <button type="submit">Ajouter</button>
        </form>
    </main>
</body>
</html>