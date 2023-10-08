<?php
class Order {
    private $id;
    private $user_id;
    private $status;
    private $date;
    private $total;
    private $items;

    public function __construct($id, $user_id, $status, $date, $total, $items) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->date = $date;
        $this->total = $total;
        $this->items = $items;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getItems() {
        return $this->items;
    }
}