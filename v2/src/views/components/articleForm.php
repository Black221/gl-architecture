
<form action="article" method="<?= $method ?>">
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="<?= $article ? $article->getTitle() : '' ?>">
    <label for="content">Contenu</label>
    <textarea name="content" id="content"></textarea>
    <label for="category">Catégorie</label>
    <select name="category" id="category">
        <?php
            foreach ($categories as $category) {
                echo '<option value="' . $category->getId() . '">' . $category->getLabel() . '</option>';
            }
        ?>
    </select>
    <button type="submit">Envoyer</button>
</form>