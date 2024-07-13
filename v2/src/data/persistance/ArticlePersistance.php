<?php

require_once 'Persistance.php';

class ArticlePersistance {

    private $persistance;

    public function __construct() {
        $this->persistance = new Persistance("article");
    }

    public function createArticle($article) {
        return $this->persistance->create($article);
    }

    public function updateArticle($id, $article) {
        return $this->persistance->update($id, $article);
    }

    public function deleteArticle($id) {
        return $this->persistance->delete($id);
    }

    public function getArticle($id) {
        return $this->persistance->get($id);
    }

    public function getAllArticles() {
        return $this->persistance->getAll();
    }

    public function getArticlesByCategory($categoryId) {
        return $this->persistance->find(["category"], ["="], [$categoryId], [""]);
    }

    public function getLastArticles($page) {
        return $this->persistance->paginate([], [], $page, 3, []);
    }
}