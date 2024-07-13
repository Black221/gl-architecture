<?php
require_once "./src/soap/SoapService.php";


$wsdl = null;
$server= new SoapServer($wsdl,[
    'uri'=>"http://localhost/soap/service"
]);

$server->setClass('SoapService');
$server->handle();