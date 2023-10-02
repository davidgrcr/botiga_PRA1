<?php
class Product {
    private $id;
    private $name;
    private $description;
    private $category_id;
    private $price;
    private $img;

    public function __construct($id, $name, $description, $category_id, $price, $img) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category_id = $category_id;
        $this->price = $price;
        $this->img = $img;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getImage() {
        return $this->img;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getPrice() {
        return $this->price;
    }
}
?>