<?php


require_once 'lib/data_format_utils.php';
require_once 'src/routes/Router.php';

require_once 'src/routes/UserRoutes.php';

require_once 'src/routes/ArticleRoutes.php';
require_once 'src/routes/CategoryRoutes.php';

require_once 'src/routes/api/ArticleApiRoutes.php';
require_once 'src/routes/api/CategoryApiRoutes.php';


$router = Router::getInstance();
$router->add('GET', '/api', function() {
    print "Welcome to the API";
});

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('?', $uri);
if (count($uri) > 2) 
$params = $uri[1];

if (str_contains($uri[0], '/soap')) {
    
    require_once 'src/soap/SoapServer.php';
} else {
    $router->run();
}

