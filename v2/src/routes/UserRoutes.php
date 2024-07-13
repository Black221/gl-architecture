<?php

require_once 'src/controllers/UserController.php';
require_once 'src/controllers/TokenController.php';
require_once 'src/routes/Router.php';

$userController = new UserController();
$tokenController = new TokenController();

$router = Router::getInstance();

$router->add('GET', '/connexion', function() {
    session_destroy();
    require_once 'src/views/authenticate.php';
});

$router->add('POST', '/connexion', function() use ($userController) {
    $user = $userController->authenticate();
    if ($user) {
        session_start();
        // redirect to the home page
        $_SESSION['user'] = $user->toArray();
        header("Location: /");
    } else {
        // redirect to the login page
        
    }
});

$router->add('GET', '/inscription', function() {
    session_destroy();
    require_once 'src/views/register.php';
});

$router->add('POST', '/inscription', function() use ($userController) {
    $res = $userController->register();
    if ($res) {
        header("Location: /authenticate");
    } else {
        // redirect to the register page
        header("Location: /register");
    }
});


$router->add('GET', '/logout', function() use ($userController) {
    session_destroy();
    // redirect to the home page
    header("Location: /");
});


$router->add('GET', '/utilisateurs', function() use ($userController) {
    $users = $userController->getAllUsers();
    require_once 'src/views/users.php';
});


$router->add('GET', '/utilisateurs/generer-token', function() use ($tokenController) {
    $tokenController->generateToken();
    header("Location: /utilisateurs");
});