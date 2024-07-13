<form action="/article<?= $action ?>" method="<?= $method ?>" class="mt-4" style="max-width: 600px; margin: 0 auto;">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $article ? $article->getTitle() : '' ?>" placeholder="Entrez le titre">
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea class="form-control" name="content" id="content" rows="3" placeholder="Entrez le contenu"><?= $article ? $article->getContent() : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="category">Catégorie</label>
        <select class="form-control" name="category" id="category">
            <?php foreach ($categories as $category) : ?>
                <?php
                $selected = ($article && $article->getCategoryId() == $category->getId()) ? 'selected' : '';
                ?>
                <option value="<?= $category->getId() ?>" <?= $selected ?>>
                    <?= $category->getLabel() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
