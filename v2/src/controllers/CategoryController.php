<?php

require_once "./src/services/CategoryService.php";
require_once "./src/controllers/RequestManager.php";

require_once 'src/models/Response.php';

class CategoryController {

    private $categoryService;
    private $requestManager;

    public function __construct() {
        $this->categoryService = new CategoryService();
        $this->requestManager = RequestManager::getInstance();
    }

    public function display() {
        $params = $this->requestManager->getParams();
        $param = 1;
        if (isset($params["category"])) {
            $param = $params["category"];
        }
        $result = $this->categoryService->getCategory($param);
        return $result;
    }

    public function displayAll() {
        $result = $this->categoryService->getCategories();
        return $result;
    }

    public function create() {
        $data = $this->requestManager->getBody();
        $result = $this->categoryService->createCategory($data);
        return $result;
    }

    public function update() {
        $data = $this->requestManager->getBody();
        $params = $this->requestManager->getParams();
        if (!isset($params['id'])) {
            return new Response(400, "Failed", null);
        }
        $id = $params['id'];
        $result = $this->categoryService->updateCategory($id, $data);
        return $result;
    }

    public function delete() {
        $params = $this->requestManager->getParams();
        if (!isset($params['id'])) {
            return new Response(400, "Failed", null);
        }
        $id = $params['id'];
        $result = $this->categoryService->deleteCategory($id);
        return $result;
    }
}