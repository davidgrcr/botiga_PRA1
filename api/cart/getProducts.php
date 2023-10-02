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

// Obtener los productos del carrito
$cartItems = $_SESSION['cart'];

// Preparar la respuesta
$response = [
    'message' => 'Productos obtenidos exitosamente.',
    'products' => $cartItems
];

// Enviar la respuesta
http_response_code(200);
echo json_encode($response);
?>
