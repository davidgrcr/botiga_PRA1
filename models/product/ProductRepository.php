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
            $row['price'],
            $row['img']
        );
    }

    public function getProductsByCategoryId($id)
    {
        $db = new Database();
        $sql = "SELECT id, name, description, category_id, price, img FROM products WHERE category_id = ?";
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
        $sql = "SELECT id, name, description, category_id, price, img FROM products WHERE id = ?";
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
}
