<?php

namespace models\order;

class OrderModel {
    private $id;
    private $user_id;
    private $date;
    private $total;
    private $items;

    public function __construct($id, $user_id, $date, $items) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->date = $date;
        $this->items = $items;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getItems() {
        return $this->items;
    }
}