<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/src/soap/SoapService.php";
$class = "SoapService";

$serviceURI = "http://localhost:80/soap";
$wsdlGenerator = new PHP2WSDL\PHPClass2WSDL($class, $serviceURI);


$wsdlGenerator->generateWSDL(true);
// Dump as string
$wsdlXML = $wsdlGenerator->dump();
// Or save as file
$wsdlXML = $wsdlGenerator->save('src/soap/server.wsdl');