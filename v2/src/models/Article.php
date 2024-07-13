<?php 

require_once 'Entity.php';

class Article implements Entity {
    private $id;
    private $title;
    private $content;
    private $created_at;
    private $updated_at;
    private $category;

    public function __construct($id, $title, $content, $created_at, $updated_at, $category) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->category = $category;
    }

    public function getClassName() {
        return 'Article';
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function getCategoryId() {
        return $this->category;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function setCategoryId($category) {
        $this->category = $category;
    }

    public function toArray() {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category' => $this->category
        );
    }

    public static function fromArray($array) {
        return new Article(
            $array['id'],
            $array['title'],
            $array['content'],
            $array['created_at'],
            $array['updated_at'],
            $array['category']
        );
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);
        return new Article(
            $data->id,
            $data->title,
            $data->content,
            $data->created_at,
            $data->updated_at,
            $data->category
        );
    }

    public function toJson() {
        return json_encode($this->toArray());
    }

    public function toXml() {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $article = $xml->createElement('article');
        $xml->appendChild($article);
        $article->appendChild($xml->createElement('id', $this->id));
        $article->appendChild($xml->createElement('title', $this->title));
        $article->appendChild($xml->createElement('content', $this->content));
        $article->appendChild($xml->createElement('created_at', $this->created_at));
        $article->appendChild($xml->createElement('updated_at', $this->updated_at));
        $article->appendChild($xml->createElement('category', $this->category));
        return $xml->saveXML();
    }

    public static function fromXml($xml) {
        $xml = simplexml_load_string($xml);
        return new Article(
            (int) $xml->id,
            (string) $xml->title,
            (string) $xml->content,
            (string) $xml->created_at,
            (string) $xml->updated_at,
            (int) $xml->category
        );
    }
    
    public function __toString() {
        return $this->toJson();
    }
}