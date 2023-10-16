<?php

namespace models\Product;

use db\Database;
use models\Product\ProductModel;

class ProductRepository
{
    public function getProductsByCategoryId($id)
    {
        $db = new Database();
        $sql = "SELECT id, name, description, category_id, price, img FROM products WHERE category_id = $id";
        $result = $db->select($sql);
        $products = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $product = new ProductModel($row['id'], $row['name'], $row['description'], $row['category_id'], $row['price'], $row['img']);
                array_push($products, $product);
            }
        }
        $db->close();
        return $products;
    }

    public function getProductById($id)
    {
        $db = new Database();
        $sql = "SELECT id, name, description, category_id, price, img FROM products WHERE id = $id";
        $result = $db->select($sql);
        $product = null;
        if ($result) {
            $row = $result->fetch_assoc();
            $product = new ProductModel($row['id'], $row['name'], $row['description'], $row['category_id'], $row['price'], $row['img']);            
        }
        $db->close();
        return $product;
    }
}
