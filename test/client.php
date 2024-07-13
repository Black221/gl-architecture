<?php


try {
    $client = new SoapClient('http://localhost/calculator.wsdl');
    $result = $client->addNumbers(3, 5);
    echo "The sum is: " . $result;

    echo "Last SOAP request: ";
    var_dump($client->__getLastRequest());
    echo "Last SOAP response: ";
    var_dump($client->__getLastResponse());
  } catch (SoapFault $e) {
    echo "Error: " . $e->getMessage();
  }
  