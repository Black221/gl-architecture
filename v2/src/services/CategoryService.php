<?php

require_once "./src/models/Category.php";
require_once "./src/models/CategoryRequest.php";
require_once "./src/models/Response.php";
require_once "./src/data/persistance/CategoryPersistance.php";
class CategoryService  {
    
    private $categoryPersistance;

    public function __construct() {
        $this->categoryPersistance = new CategoryPersistance();
    }

    public function getCategories() {
        $result = $this->categoryPersistance->getAllCategories();
        $categories = [];
        foreach ($result as $category) {
            array_push(
                $categories, 
                Category::fromArray($category)
            );
        }
        return $categories;
    }

    public function getCategory($id) {
        $result = $this->categoryPersistance->getCategory($id);
        if ($result == null)
            return Response::fromArray(["message" => "Category not found"]);
        return Category::fromArray($result);
    }

    public function createCategory($category) {
        $obj = CategoryRequest::fromJson($category);
        $res = $this->categoryPersistance->createCategory($obj);
        return Response::fromArray($res);
    }

    public function updateCategory($id, $category) {
        $obj = CategoryRequest::fromJson($category);
        $res = $this->categoryPersistance->updateCategory($id, $obj);
        return Response::fromArray($res);
    }

    public function deleteCategory($id) {
        $res = $this->categoryPersistance->deleteCategory($id);
        return Response::fromArray($res);
    }
}