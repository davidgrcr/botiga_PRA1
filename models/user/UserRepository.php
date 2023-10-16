<?php

namespace models\user;

use db\Database;
use models\user\UserModel;

class UserRepository
{

    private function makeUser($row)
    {
        return new UserModel($row['id'],
                            $row['name'],
                            $row['email'],
                            $row['password'],
                            $row['address'],
                            $row['user_type']);
    }

    public function getUserByEmail($email)
    {
        $db = new Database();
        $sql = "SELECT id, name, email, password, address, user_type FROM users WHERE email = '$email'";
        $result = $db->select($sql);
        $user = null;
        if ($result) {
            $row = $result->fetch_assoc();
            $user = $this->makeUser($row);
        }
        $db->close();
        return $user;
    }

    public function getUserById($id)
    {
        $db = new Database();
        $sql = "SELECT id, name, email, password, address, user_type FROM users WHERE id = $id";
        $result = $db->select($sql);
        $user = null;
        if ($result) {
            $row = $result->fetch_assoc();
            $user = $this->makeUser($row);
        }
        $db->close();
        return $user;
    }

    public function createUser($name, $email, $password, $address, $user_type)
    {
        $db = new Database();
        $sql = "INSERT INTO users (name, email, password, address, user_type) 
                VALUES ('$name', '$email', '$password', '$address', '$user_type')";

        try {
            $result = $db->insert($sql);
        } catch (\Exception $e) {
            if ($e->getCode() == 1062) {
                $result = $this->getUserByEmail($email)->getId();
            }
        }
        $db->close();
        return $result;
    }

    public function deleteUser($id)
    {
        $db = new Database();
        $sql = "DELETE FROM users WHERE id = $id";
        $result = $db->delete($sql);
        $db->close();
        return $result;
    }
}
