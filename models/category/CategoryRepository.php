<?php

namespace models\Category;

use db\Database;
use models\Category\CategoryModel;


class CategoryRepository
{
    public function getAllCategories()
    {
        $db = new Database();
        $sql = "SELECT id, name, img FROM categories";
        $result = $db->select($sql);
        $categories = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $category = new CategoryModel($row['id'], $row['name'], $row['img']);
                array_push($categories, $category);
            }
        }
        $db->close();
        return $categories;
    }

    public function getCategoryById($id)
    {
        $db = new Database();
        $sql = "SELECT id, name, img FROM categories WHERE id = ?";
        $stmt = $db->prepare($sql);

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        $category = null;

        if ($result) {
            $row = $result->fetch_assoc();
            $category = new CategoryModel($row['id'], $row['name'], $row['img']);
        }

        $stmt->close();
        $db->close();
        return $category;
    }
}
