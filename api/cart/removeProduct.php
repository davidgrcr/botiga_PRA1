
<?php
// Permitir CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");

// Iniciar la sesión
session_start();

// Comprobar si la matriz del carrito ya existe, si no, crear una
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Obtener los datos del cuerpo de la solicitud POST
$data = json_decode(file_get_contents('php://input'), true);

// Validar los datos (esto es solo un ejemplo básico, deberías tener una validación más rigurosa)
if (isset($data['product_id'])) {
    // remove the product from the cart
    unset($_SESSION['cart'][$data['product_id']]);

    // Responder con un mensaje de éxito
    $response = ['message' => 'Producto borrado del carrito exitosamente.'];
    http_response_code(200);
    echo json_encode($response);
} else {
    // Responder con un mensaje de error
    $response = ['message' => 'Faltan datos del producto'];
    http_response_code(400);
    echo json_encode($response);
}
?>
