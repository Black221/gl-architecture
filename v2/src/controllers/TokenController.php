<?php

require_once './src/models/Response.php';
require_once './src/services/TokenService.php';
require_once './src/controllers/RequestManager.php';

class TokenController {

    private $tokenService;
    private $requestManager;

    public function __construct() {
        $this->tokenService = new TokenService();
        $this->requestManager = RequestManager::getInstance();
    }

    public function generateToken() {
        $params = $this->requestManager->getParams();
        if (!isset($params['id'])) {
            return new Response(400, "Invalid", null);
        }
        $id = $params['id'];
        return $this->tokenService->generateToken($id);
    }

    public function validateToken() {
        $params = $this->requestManager->getParams();
        if (!isset($params['token'])) {
            return false;
        }
        $token = $params['token'];
        return $this->tokenService->validateToken($token);
    }
}