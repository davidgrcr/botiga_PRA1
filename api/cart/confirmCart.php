<?php
include_once './../../model/user/User.php';
include_once './../../model/user/UserDAO.php';
include_once './../../model/order/Order.php';
include_once './../../model/order/OrderDAO.php';

// Permitir CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

// Iniciar la sesión
session_start();

// Comprobar si el carrito existe, si no, crear uno vacío
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


// Obtener los datos del cuerpo de la solicitud POST
$data = json_decode(file_get_contents('php://input'), true);

// Obtener los productos del carrito
$cartItems = $_SESSION['cart'];

// 1 - Crear el usuario a partir de la data
// 2 - Crear la orden a partir del usuario y los productos
// 3 - Crear los items de orden a partir de la orden y los productos
// 4 - Vaciar el carrito


// Crear el usuario a partir de la data
try {
    $user = new User(null, $data['name'], $data['email'], $data['password'], $data['address'], $data['user_type']);
    $userDB = UserDAO::createUser($user);
    $order_id = OrderDAO::addOrder($userDB->getId(), $cartItems);
    // Vaciar el carrito
    unset($_SESSION['cart']);
} catch (Exception $e) {
    $response = [
        'message' => 'Error al crear el usuario.',
        'error' => $e->getMessage()
    ];
    http_response_code(500);
    echo json_encode($response);
    exit();
}

// Preparar la respuesta
$response = [
    'message' => 'Productos comprados exitosamente.',
    'order_id' => $order_id
];


// Enviar la respuesta
http_response_code(200);
echo json_encode($response);
