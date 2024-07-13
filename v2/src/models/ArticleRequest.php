<?php

class ArticleRequest implements Entity {

    private $title;
    private $content;
    private $category;

    public function __construct($title, $content, $category) {
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCategoryId() {
        return $this->category;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setCategoryId($category) {
        $this->category = $category;
    }

    public function getClassName() {
        return 'Article';
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);
        return new ArticleRequest(
            $data['title'],
            $data['content'],
            $data['category']
        );
    }

    public function toJson() {
        return json_encode([
            'title' => $this->title,
            'content' => $this->content,
            'category' => $this->category
        ]);
    }

    public function toArray() {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'category' => $this->category
        ];
    }

    public static function fromArray($array) {
        return new ArticleRequest(
            $array['title'],
            $array['content'],
            $array['category']
        );
    }

    public function toXML() {
        $doc = new DOMDocument("1.0", "UTF-8");
        $doc->formatOutput = true;
        $data = $doc->createElement('data');
        $doc->appendChild($data);
        $entityNode = $doc->createElement($this->getClassName());
        $data->appendChild($entityNode);
        foreach ($this->toArray() as $key => $value) {
            $entityNode->appendChild($doc->createElement($key, $value));
        }
        return $doc->saveXML();
    }

    public static function fromXML($xml) {
        $doc = new SimpleXMLElement($xml);
        return new ArticleRequest(
            $doc->title,
            $doc->content,
            $doc->category
        );
    }
}