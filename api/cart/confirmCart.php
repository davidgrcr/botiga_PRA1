<?php
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

// Preparar la respuesta
$response = [
    'message' => 'Productos obtenidos exitosamente.',
    'products' => $cartItems,
    'data' => $data
];

// Vaciar el carrito
$_SESSION['cart'] = array();


// Enviar la respuesta
http_response_code(200);
echo json_encode($response);
?>
