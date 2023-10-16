<?php

namespace models\user;

class UserModel {
    private $id;
    private $name;
    private $email;
    private $password;
    private $address;
    private $user_type;

    public function __construct($id, $name, $email, $password, $address, $user_type) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password= $password;
        $this->address = $address;
        $this->user_type = $user_type;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getUserType() {
        return $this->user_type;
    }
}