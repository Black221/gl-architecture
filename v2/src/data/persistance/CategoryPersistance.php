<?php

require_once 'src/data/persistance/Persistance.php';
class CategoryPersistance {

    private $persistance;

    public function __construct() {
        $this->persistance = new Persistance("category");
    }

    public function createCategory($category) {
        return $this->persistance->create($category);
    }

    public function updateCategory($id, $category) {
        return $this->persistance->update($id, $category);
    }

    public function deleteCategory($category) {
        return $this->persistance->delete($category);
    }

    public function getCategory($id) {
        return $this->persistance->get($id);
    }

    public function getAllCategories() {
        return $this->persistance->getAll();
    }
}