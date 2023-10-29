<?php

namespace models\Product;

use db\Database;
use models\Product\ProductModel;

class ProductRepository
{

    private function makeProduct($row)
    {
        return new ProductModel(
            $row['id'],
            $row['name'],
            $row['description'],
            $row['category_id'],
            $row['img']
        );
    }

    public function getAllProducts()
    {
        $db = new Database();
        $sql = "SELECT id, name, description, category_id, img FROM products";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $products = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->makeProduct($row);
                array_push($products, $product);
            }
        }

        $stmt->close();
        $db->close();

        return $products;
    }

    public function getProductsByCategoryId($id)
    {
        $db = new Database();
        $sql = "SELECT id, name, description, category_id, img FROM products WHERE category_id = ?";
        $stmt = $db->prepare($sql);

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $products = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->makeProduct($row);
                array_push($products, $product);
            }
        }

        $stmt->close();
        $db->close();

        return $products;
    }

    public function getProductById($id)
    {
        $db = new Database();
        $sql = "SELECT id, name, description, category_id, img FROM products WHERE id = ?";
        $stmt = $db->prepare($sql);

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $product = null;

        if ($row = $result->fetch_assoc()) {
            $product = $this->makeProduct($row);
        }

        $stmt->close();
        $db->close();

        return $product;
    }

    public function createProduct($name, $description, $category_id, $img)
    {
        $db = new Database();
        $sql = "INSERT INTO products (name, description, category_id, img) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);

        $stmt->bind_param("ssis", $name, $description, $category_id, $img);
        $stmt->execute();

        $stmt->close();
        $db->close();
    }

    public function updateProduct($id, $name, $description, $category_id, $img)
    {
        $db = new Database();
        $sql = "UPDATE products SET name = ?, description = ?, category_id = ?, img = ? WHERE id = ?";
        $stmt = $db->prepare($sql);

        $stmt->bind_param("ssisi", $name, $description, $category_id, $img, $id);
        $stmt->execute();

        $stmt->close();
        $db->close();
    }

    public function deleteProduct($id)
    {
        $db = new Database();
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $db->prepare($sql);

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $db->close();
    }
}
