<?php 

function convertData ($data, $format) {
    if ($format == 'json') {
        if (is_array($data)) {
            $newData = [];
            foreach ($data as $entity) {
                array_push($newData, $entity->toArray());
            }
            return json_encode($newData);
        } else {
            return $data->toJson();
        }
    } else if ($format == 'xml') {
        if (is_array($data)) {
            $doc = new DOMDocument("1.0", "UTF-8");
            $doc->formatOutput = true;
            $doc->preserveWhiteSpace = false;
            $newData = $doc->createElement('data');
            $doc->appendChild($newData);
            foreach ($data as $entity) {
                $entityNode = $doc->createElement(strtolower($entity->getClassName()));
                $newData->appendChild($entityNode);
                foreach ($entity->toArray() as $key => $value) {
                    $entityNode->appendChild($doc->createElement($key, $value));
                }
            }
            return $doc->saveXML();
        } else {
            return $data->toXML();
        }
    }
}