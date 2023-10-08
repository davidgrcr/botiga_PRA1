<?php
include_once './../../db/Database.php';
include_once './User.php';

class UserDAO {
    public static function getUserByEmail($email) {
        $db = new Database();
        $sql = "SELECT id, name, email, password, address, user_type FROM users WHERE email = '$email'";
        $result = $db->select($sql);
        $user = null;
        if ($result) {
            $row = $result->fetch_assoc();
            $user = new User($row['id'], $row['name'], $row['email'], $row['password'], $row['address'], $row['user_type']);
        }
        $db->close();
        return $user;
    }

    public static function getUserById($id) {
        $db = new Database();
        $sql = "SELECT id, name, email, password, address, user_type FROM users WHERE id = $id";
        $result = $db->select($sql);
        $user = null;
        if ($result) {
            $row = $result->fetch_assoc();
            $user = new User($row['id'], $row['name'], $row['email'], $row['password'], $row['address'], $row['user_type']);
        }
        $db->close();
        return $user;
    }

    public static function createUser($user) {
        $db = new Database();
        $sql = "INSERT INTO users (name, email, password, address, user_type) VALUES ('" . $user->getName() . "', '" . $user->getEmail() . "', '" . $user->getPassword() . "', '" . $user->getAddress() . "', '" . $user->getUserType() . "')";

        try {
            $result = $db->insert($sql);
        } catch (Exception $e) {
            if ($e->getCode() == 1062) {
                $result = self::getUserByEmail($user->getEmail());
            }
        }

        $db->close();
        return $result;
    }

    public static function deleteUser($id) {
        $db = new Database;
        $sql = "DELETE FROM users WHERE id = $id";
        $result = $db->delete($sql);
        $db->close();
        return $result;
    }
}