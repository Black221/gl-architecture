<?php
ini_set("soap.wsdl_cache_enabled", "0");
require_once "./src/soap/SoapService.php";


$wsdl = "./src/soap/server.wsdl";
$server= new SoapServer($wsdl,[
    'uri'=>"http://localhost/soap"
]);

$server->setClass('SoapService');
$server->handle();