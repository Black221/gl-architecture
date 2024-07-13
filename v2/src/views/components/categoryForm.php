<form action="/category<?= $action ?>" method="post" class="mt-4" style="max-width: 400px; margin: 0 auto;">
    <div class="form-group">
        <label for="label">Libellé</label>
        <input type="text" class="form-control" name="label" id="label" value="<?= $category ? $category->getLabel() : '' ?>" placeholder="Entrez le libellé">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
