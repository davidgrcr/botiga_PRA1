<?php

namespace models\Category;

class CategoryModel {
    private $id;
    private $name;
    private $img;

    public function __construct($id, $name, $img) {
        $this->id = $id;
        $this->name = $name;
        $this->name = $name;
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
}
?>