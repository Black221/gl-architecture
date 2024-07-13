<?php

class CategoryRequest implements Entity {

    private $label;

    public function __construct($label) {
        $this->label = $label;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getClassName() {
        return 'Category';
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);
        return new CategoryRequest(
            $data['label']
        );
    }

    public function toJson() {
        return json_encode([
            'label' => $this->label
        ]);
    }

    public function toArray() {
        return [
            'label' => $this->label
        ];
    }

    public static function fromArray($array) {
        return new CategoryRequest(
            $array['label']
        );
    }

    public function toXML() {
        $xml = new DOMDocument("1.0", "UTF-8");
        $category = $xml->createElement('Category');
        $xml->appendChild($category);
        $category->appendChild($xml->createElement('label', $this->label));
        return $xml->saveXML();
    }

    public static function fromXML($xml) {
        $doc = new SimpleXMLElement($xml);
        return new CategoryRequest(
            $doc->label
        );
    }
}