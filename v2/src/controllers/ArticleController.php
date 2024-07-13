<?php 

require_once "./src/services/ArticleService.php";
require_once "./src/controllers/RequestManager.php";

require_once 'src/models/Response.php';

class ArticleController {

    private $articleService;
    private $requestManager;

    public function __construct() {
        $this->articleService = new ArticleService();
        $this->requestManager = RequestManager::getInstance();
    }

    public function display() {
        $params = $this->requestManager->getParams();
        if (!isset($params["id"])) {
            $params['id'] = 1;
        }
        $result = $this->articleService->getArticle($params["id"]);
        return $result;
    }

    public function displayAll() {
        $result = $this->articleService->getArticles();
        return $result;
    }

    public function displayLast() {
        $params = $this->requestManager->getParams();
        if (!isset($params["page"])) {
            $params['page'] = 1;
        }
        $result = $this->articleService->getLastArticles($params["page"]);
        return $result;
    }

    public function displayByCategory() {
        $params = $this->requestManager->getParams();
        if (!isset($params["category"])) {
            $params['category'] = 1;
        }
        $result = $this->articleService->getArticlesByCategory($params["category"]);
        return $result;
    }

    public function create() {
        $data = $this->requestManager->getBody();
        $res = $this->articleService->createArticle($data);
        return $res;
    }

    public function update() {
        $data = $this->requestManager->getBody();
        $params = $this->requestManager->getParams();
        if (!isset($params['id'])) {
            return new Response(400, "Failed", null);
        }
        $id = $params['id'];
        $result = $this->articleService->updateArticle($id, $data);
        return $result;
    }

    public function delete() {
        $params = $this->requestManager->getParams();
        if (!isset($params['id'])) {
            return new Response(400, "Failed", null);
        }
        $id = $params['id'];
        $result = $this->articleService->deleteArticle($id);
        return $result;
    }
}