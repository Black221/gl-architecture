<?php 

require_once "./src/models/Article.php";
require_once "./src/models/ArticleRequest.php";
require_once "./src/models/Response.php";
require_once "./src/data/persistance/ArticlePersistance.php";

class ArticleService {

    private $articlePersistance;

    public function __construct() {
        $this->articlePersistance = new ArticlePersistance();
    }

    public function getArticles() {
        $result = $this->articlePersistance->getAllArticles();
        $articles = [];
        foreach ($result as $article) {
            array_push(
                $articles, 
                Article::fromArray($article)
            );
        }
        return $articles;
    }

    public function getLastArticles($page) {
        $result = $this->articlePersistance->getLastArticles($page);
        $articles = [];
        foreach ($result as $article) {
            array_push(
                $articles, 
                Article::fromArray($article)
            );
        }
        return $articles;
    }

    public function getArticle($id) {
        $result = $this->articlePersistance->getArticle($id);
        if ($result == null)
            return null;
        return Article::fromArray($result);
    }

    public function createArticle($article) {
        $obj = ArticleRequest::fromJson($article);
        $res = $this->articlePersistance->createArticle($obj);
        return Response::fromArray($res);
    }

    public function updateArticle($id, $article) {
        $obj = ArticleRequest::fromJson($article);
        $res = $this->articlePersistance->updateArticle($id, $obj);
        return Response::fromArray($res);
    }

    public function deleteArticle($id) {
        $res = $this->articlePersistance->deleteArticle($id);
        return Response::fromArray($res);
    }

    public function getArticlesByCategory($categoryId) {
        $result = $this->articlePersistance->getArticlesByCategory($categoryId);
        $articles = [];
        foreach ($result as $article) {
            array_push(
                $articles, 
                Article::fromArray($article)
            );
        }
        return $articles;
    }
}