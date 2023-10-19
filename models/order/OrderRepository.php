<?php

namespace models\order;

use db\Database;
use models\order\OrderModel;

class OrderRepository
{
    public function getAllOrders()
    {
        $db = new Database();
        $sql = "SELECT
                    orders.id as order_id, orders.order_date, orders.status, 
                    order_details.product_id, order_details.quantity, order_details.price 
                FROM orders
                JOIN order_details ON orders.id = order_details.order_id
                ORDER BY orders.id";

        // Preparar y ejecutar la consulta
        $stmt = $db->prepare($sql);
        $stmt->execute();

        // Inicializar un array para almacenar los resultados
        $orders = [];

        // Iterar a través de los resultados
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $order_id = $row['order_id'];

            // Si el pedido aún no está en el array, añadirlo
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'products' => []
                ];
            }

            $orders[$order_id]['products'][] = [
                'product_id' => $row['product_id'],
                'quantity' => $row['quantity'],
                'price' => $row['price']
            ];
        }
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
