<?php 

require_once 'Entity.php';
class Category implements Entity {

    private $id;
    private $label;

    public function __construct($id, $label) {
        $this->id = $id;
        $this->label = $label;
    }

    public function getClassName() {
        return 'Category';
    }

    public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function toArray() {
        return array(
            'id' => $this->id,
            'label' => $this->label
        );
    }

    public static function fromArray($array) {
        return new Category($array['id'], $array['label']);
    }

    public function toJson() {
        return json_encode($this->toArray());
    }

    public static function fromJson($json) {
        $array = json_decode($json, true);
        return Category::fromArray($array);
    }

    public function toXML() {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;
        $data = $xml->createElement('category');
        $xml->appendChild($data);
        $data->appendChild($xml->createElement('id', $this->id));
        $data->appendChild($xml->createElement('label', $this->label));
        return $xml->saveXML();
    }

    public static function fromXML($xml) {
        $xml = new SimpleXMLElement($xml);
        return new Category($xml->id, $xml->label);
    }
}