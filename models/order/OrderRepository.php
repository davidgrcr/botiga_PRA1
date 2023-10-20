<?php

namespace models\order;

use db\Database;
use models\order\OrderModel;

class OrderRepository
{

    public function getOrderById($orderId)
    {
        $order = null;
        $db = new Database();
        $sql = "SELECT
                    orders.id as order_id, orders.order_date,
                    order_details.product_id, order_details.quantity,
                    users.user_type, users.id as user_id
                FROM orders
                JOIN order_details ON orders.id = order_details.order_id
                JOIN users ON orders.user_id = users.id
                WHERE orders.id = '" . $orderId . "'";

        $result = $db->select($sql);


        if ($result) {
            while ($row = $result->fetch_assoc()) {
                if ($order === null) {
                    $order = [
                        'order_id' => $row['order_id'],
                        'order_date' => $row['order_date'],
                        'user_type' => $row['user_type'],
                        'user_id' => $row['user_id'],
                        'products' => []
                    ];
                }

                $order['products'][] = [
                    'product_id' => $row['product_id'],
                    'quantity' => $row['quantity']
                ];
            }
        }

        $db->close();
        return $order;
    }

    public function getAllOrders()
    {
        $db = new Database();
        $sql = "SELECT
                    orders.id as order_id, orders.order_date,
                    order_details.product_id, order_details.quantity,
                    users.user_type
                FROM orders
                JOIN order_details ON orders.id = order_details.order_id
                JOIN users ON orders.user_id = users.id
                ORDER BY orders.id";

        $result = $db->select($sql);

        $orders = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $order_id = $row['order_id'];

                if (!isset($orders[$order_id])) {
                    $orders[$order_id] = [
                        'order_date' => $row['order_date'],
                        'user_type' => $row['user_type'],
                        'products' => []
                    ];
                }

                $orders[$order_id]['products'][] = [
                    'product_id' => $row['product_id'],
                    'quantity' => $row['quantity']
                ];
            }
        }

        $db->close();
        return $orders;
    }

    public function addOrder($user_id, $items)
    {
        $db = new Database();
        $sql = "INSERT INTO orders (user_id) VALUES ('" . $user_id . "')";

        $db->insert($sql);
        $order_id = $db->getLastId();

        foreach ($items as $productId => $quantity) {
            $this->addOrderDetail($order_id, $productId, $quantity);
        }

        $db->close();
        return $order_id;
    }

    public function addOrderDetail($order_id, $product_id, $quantity)
    {
        $db = new Database();
        $sql = "INSERT INTO order_details (order_id, product_id, quantity)
                VALUES ('" . $order_id . "', '" . $product_id . "', '" . $quantity . "')";

        return $db->insert($sql);
    }
}
