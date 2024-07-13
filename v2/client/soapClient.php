<?php


$params = array(
    'location' => 'http://localhost/soap',
    'uri' => 'http://localhost/soap',
    'trace'=>1,'cache_wsdl'=>WSDL_CACHE_NONE
);

$wsdl = 'http://localhost/soap?wsdl';
$client = new SoapClient($wsdl, $params);

try{
    $result = $client->__soapCall('authenticate', ["admin", "admin"]);
    var_dump ($result);

}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}