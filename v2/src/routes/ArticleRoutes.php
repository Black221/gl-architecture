<?php

require_once 'src/controllers/ArticleController.php';
require_once 'src/controllers/CategoryController.php';
require_once 'src/routes/Router.php';

$articleController = new ArticleController();
$categoryController = new CategoryController();


$router = Router::getInstance();

$router->add('GET', '/', function() use ($articleController) {
    $articles = $articleController->displayLast();
    require_once 'src/views/accueil.php';
});

$router->add('GET', '/accueil', function() use ($articleController) {
    $articles = $articleController->displayLast();
    require_once 'src/views/accueil.php';
});

$router->add('GET', '/article', function() use ($articleController) {
    $article = $articleController->display();
    require_once 'src/views/article.php';
});

$router->add('GET', '/nouveau-article', function() use ($categoryController) {
    $method = 'POST';
    $article = null;
    $categories = $categoryController->displayAll();
    require_once 'src/views/create-article.php';
});

$router->add('GET', '/article/modifier', function() use ($articleController) {
    $article = $articleController->display();
    $method = 'PUT';
    require_once 'src/views/edit-article.php';
});

$router->add('GET', '/article/supprimer', function() use ($articleController) {
    $article = $articleController->display();
    $method = 'DELETE';
    require_once 'src/views/edit-article.php';
});

$router->add('POST', '/article', function() use ($articleController) {
    $message = $articleController->create();
    // redirect to the home page
    header("Location: /articles");
});

$router->add('PUT', '/article', function() use ($articleController) {
    $message = $articleController->update();
    // redirect to the updated article
    header("Location: /articles");
});

$router->add('DELETE', '/article', function() use ($articleController) {
    $message = $articleController->delete();
    // redirect to the home page
    header("Location: /articles");
});

$router->add('GET', '/articles', function() use ($articleController, $categoryController) {
    $categories = $categoryController->displayAll();
    $articles = $articleController->displayByCategory();
    $category = $categoryController->display();

    require_once 'src/views/articles.php';
});