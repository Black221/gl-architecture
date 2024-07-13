<?php


$params = array(
    'location'=>'http://localhost/soap',
    'uri' =>  'http://localhost/soap/service'  ,
    'trace'=>1,'cache_wsdl'=>WSDL_CACHE_NONE
);

$client = new SoapClient(null, $params);

try{
    $result = $client->__soapCall('getAllUsers', ["f1b8e5962d102633"]);
    var_dump ($result);

}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}