<?php
include_once './../../db/Database.php';
include_once './Order.php';

class OrderDAO {
    public static function getAllOrders() {
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
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $order_id = $row['order_id'];

            // Si el pedido aún no está en el array, añadirlo
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'products' => []
                ];
            }

            // Añadir detalles del producto a la orden
            $orders[$order_id]['products'][] = [
                'product_id' => $row['product_id'],
                'quantity' => $row['quantity'],
                'price' => $row['price']
            ];
        }
    }

    public static function addOrder($user_id, $items) {
        $db = new Database();
        $sql = "INSERT INTO orders (user_id) VALUES ('" . $user_id . "')";
        try {
            $db->insert($sql);
            $order_id = $db->getLastId();
            foreach ($items as $productId => $quantity) {
                self::addOrderDetail($order_id, $productId, $quantity);
            }


        } catch (Exception $e) {
            throw $e;
        }

        $db->close();
        return $order_id;


        
        // Iniciar una transacción
        // $db->beginTransaction();
        
        // try {
        //     $sql = "INSERT INTO orders (user_id) VALUES (?)";
        //     $stmt = $db->prepare($sql);
        //     $stmt->bind_param('i', $user_id);
        //     $result = $stmt->execute();

        //     print_r($result);
            
        //     $order_id = $db->getLastId();
            
        //     // Insertar los detalles del pedido
        //     foreach ($items as $productId => $quantity) {
        //         self::addOrderDetail($order_id, $productId, $quantity);
        //     }
            
        //     // Confirmar la transacción
        //     $db->commit();
            
        // } catch (Exception $e) {
        //     print_r($e);
        //     // Revertir la transacción si algo falla
        //     $db->rollBack();
        //     throw $e;
        // } finally {
        //     $db->close();
        // }
    }
    
    public static function addOrderDetail($order_id, $product_id, $quantity) {
        $db = new Database();
        $sql = "INSERT INTO order_details (order_id, product_id, quantity) VALUES ('" . $order_id . "', '" . $product_id . "', '" . $quantity . "')";
        return $db->insert($sql);
      
        // $sql = "INSERT INTO order_details (order_id, product_id, quantity) VALUES (?, ?, ?)";
        // $stmt = $db->prepare($sql);
        // $stmt->bind_param('iii', $order_id, $product_id, $quantity);
        // $stmt->execute();
        // $db->close();
    }
    
}
?>