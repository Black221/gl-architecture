<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau article</title>
    <link rel="stylesheet" href="global.css">
</head>
<body>
    <main>
        <?php 
            require_once '/components/header.php';
        ?>
        <h1>Nouveau article</h1>
        <form action="/article" method="POST">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
            <label for="content">Contenu</label>
            <textarea name="content" id="content"></textarea>
            <label for="category">Categorie</label>
            <select name="category" id="category">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category->getId() ?>"><?= $category->getLabel() ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ajouter</button>
        </form>
    </main>
</body>
</html>