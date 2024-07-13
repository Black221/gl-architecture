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
    $action = '';
    $category = null;
    require_once 'src/views/create-category.php';
});

$router->add('POST', '/category', function() use ($categoryController) {
    $message = $categoryController->create();
    // redirect to the home page
    header("Location: /articles");
});

$router->add('GET', '/category/modifier', function() use ($categoryController) {
    $category = $categoryController->display();
    $action = '/modifier?id='. $category->getId();
    require_once 'src/views/edit-category.php';
});
  
$router->add('POST', '/category/modifier', function() use ($categoryController) {
    $id = $categoryController->update();
    // redirect to the updated category
    header("Location: /articles");
});

$router->add('GET', '/category/supprimer', function() use ($categoryController) {
    $category = $categoryController->delete();
    header("Location: /articles");
});
$router->add('POST', '/category/supprimer', function() use ($categoryController) {
    $message = $categoryController->delete();
    // redirect to the home page
    header("Location: /articles");
});

