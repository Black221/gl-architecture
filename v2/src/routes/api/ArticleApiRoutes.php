<?php

require_once 'src/controllers/ArticleController.php';
require_once 'src/controllers/TokenController.php';
require_once 'src/routes/Router.php';

$articleController = new ArticleController();
$tokenController = new TokenController();
$router = Router::getInstance();

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$uri = explode('?', $uri)[0];
$requestManager = RequestManager::getInstance();

$params = $requestManager->getParams();
if (!isset($params["format"])) {
    $params["format"] = "json";
} 

$format = $params["format"];


if ($format != 'json' && $format != 'xml') {
    $format = 'json';
}

$router->add('GET', '/api/article', function() use ($articleController, $format) {
    $article = $articleController->display();
    $result = convertData($article, $format);
    header("Content-Type: application/$format");
    echo $result;
});



$router->add('GET', '/api/articles', function() use ($articleController, $format) {
    $articles = $articleController->displayAll();
    $result = convertData($articles, $format);
    header("Content-Type: application/$format");
    echo $result;
});


if ($tokenController->validateToken()) {
    $router->add('POST', '/api/article', function() use ($articleController, $format) {
        $data = $articleController->create();
        $result = convertData($data, $format);
        header("Content-Type: application/$format");
        echo $result;
    });
    
    $router->add('PUT', '/api/article', function() use ($articleController, $format) {
        $data = $articleController->update();
        $result = convertData($data, $format);
        header("Content-Type: application/$format");
        echo $result;
    });
    
    $router->add('DELETE', '/api/article', function() use ($articleController, $format) {
        $data = $articleController->delete();
        $result = convertData($data, $format);
        header("Content-Type: application/$format");
        echo $result;
    });
} else {
    $router->add('POST', '/api/article', function(){
        header("Content-Type: application/json");
        echo json_encode(array("message" => "Unauthorized"));
    });
    
    $router->add('PUT', '/api/article', function() {
        header("Content-Type: application/json");
        echo json_encode(array("message" => "Unauthorized"));
    });
    
    $router->add('DELETE', '/api/article', function() {
        header("Content-Type: application/json");
        echo json_encode(array("message" => "Unauthorized"));
    });
}





