<?php

namespace controllers;

use controllers\Controller;

class ApiController extends Controller {
    
    public function __construct() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Content-Type: application/json; charset=UTF-8");
        $this->loadModelRepository('Cart');
    }

    public function addToCart() {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['product_id']) && isset($data['quantity'])) {
            $productId = $data['product_id'];
            $quantity = $data['quantity'];
            $this->Cart->addToCart($productId, $quantity);
            $response = ['message' => 'Producto añadido al carrito exitosamente.'];
            http_response_code(201);
            echo json_encode($response);
        } else {
            $response = ['message' => 'Faltan datos del producto o la cantidad.'];
            http_response_code(400);
            echo json_encode($response);
        }
    }

    public function removeItem() {
        $data = json_decode(file_get_contents('php://input'), true);
        $removed = $this->Cart->removeFromCart($data['product_id']);

        if ($removed) {
            $response = ['message' => 'Producto borrado del carrito exitosamente.'];
            http_response_code(200);
            echo json_encode($response);
        } else {
            $response = ['message' => 'El producto no existe en el carrito.'];
            http_response_code(400);
            echo json_encode($response);
        }

    }
    

}
