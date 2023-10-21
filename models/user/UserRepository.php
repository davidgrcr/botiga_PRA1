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
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $password, $address, $user_type);
        $stmt->execute();
        $result = $db->getLastId();
        $stmt->close();
        $db->close();

        return $result;
    }

    public function updateUser($id, $name, $email, $password, $address, $user_type)
    {
        $db = new Database();
        $sql = "UPDATE users SET name = ?, email = ?, password = ?, address = ?, user_type = ? WHERE id = $id";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $password, $address, $user_type);
        $result = $stmt->execute();
        $stmt->close();
        $db->close();
        return $result;
    }

    public function deleteUser($id)
    {
        $db = new Database();
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $db->prepare($sql);

        $stmt->bind_param("i", $id);

        $result = $stmt->execute();

        $stmt->close();
        $db->close();

        return $result;
    }
}
