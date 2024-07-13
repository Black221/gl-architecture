<?php

require_once 'src/controllers/CategoryController.php';
require_once 'src/controllers/TokenController.php';
require_once 'src/routes/Router.php';

$categoryController = new CategoryController();
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


$router->add('GET', '/api/category', function() use ($categoryController, $format) {
    $category = $categoryController->display();
    $result = convertData($category, $format);
    header("Content-Type: application/$format");
    echo $result;
});

$router->add('GET', '/api/categories', function() use ($categoryController, $format) {
    $categories = $categoryController->displayAll();
    $result = convertData($categories, $format);
    header("Content-Type: application/$format");
    echo $result;
});


if ($tokenController->validateToken()) {
    $router->add('POST', '/api/category', function() use ($categoryController, $format) {
        $data = $categoryController->create();
        $result = convertData($data, $format);
        header("Content-Type: application/$format");
        echo $result;
    });
    
    $router->add('PUT', '/api/category', function() use ($categoryController, $format) {
        $data = $categoryController->update();
        $result = convertData($data, $format);
        header("Content-Type: application/$format");
        echo $result;
    });
    
    $router->add('DELETE', '/api/category', function() use ($categoryController, $format) {
        $data = $categoryController->delete();
        $result = convertData($data, $format);
        header("Content-Type: application/$format");
        echo $result;
    });
} else {
    $router->add('POST', '/api/category', function(){
        echo json_encode(array("message" => "Unauthorized"));
    });
    
    $router->add('PUT', '/api/category', function() {
        echo json_encode(array("message" => "Unauthorized"));
    });
    
    $router->add('DELETE', '/api/category', function() {
        echo json_encode(array("message" => "Unauthorized"));
    });
}