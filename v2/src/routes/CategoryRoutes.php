<?php

require_once 'src/controllers/CategoryController.php';
require_once 'src/routes/Router.php';

$categoryController = new CategoryController();
$router = Router::getInstance();

$router->add('GET', '/category/edit', function() use ($categoryController) {
    $category = $categoryController->display();
    require_once 'src/views/edit-category.php';
});

$router->add('GET', '/nouvelle-categorie', function() use ($categoryController) {
    require_once 'src/views/create-category.php';
});

$router->add('PUT', '/category', function() use ($categoryController) {
    $id = $categoryController->update();
    // redirect to the updated category
    header("Location: /category?id=$id");
});

$router->add('DELETE', '/category', function() use ($categoryController) {
    $categoryController->delete();
    // redirect to the home page
    header("Location: /");
});

