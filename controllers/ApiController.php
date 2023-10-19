<?php

namespace controllers;

use controllers\Controller;

class ApiController extends Controller
{

    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: POST");
        header("Content-Type: application/json; charset=UTF-8");
        $this->loadModelRepository('Cart');
        $this->loadModelRepository('User');
        $this->loadModelRepository('Order');
    }

    public function addToCart()
    {
        $data = $this->getJsonInput();
        if (isset($data['product_id']) && isset($data['quantity'])) {
            $productId = $data['product_id'];
            $quantity = $data['quantity'];
            $this->Cart->addToCart($productId, $quantity);
            $this->sendJsonResponse(201, 'Producto añadido al carrito exitosamente.');
        } else {
            $this->sendJsonResponse(400, 'Faltan datos del producto o la cantidad.');
        }
    }

    public function removeItem()
    {
        $data = $this->getJsonInput();
        $removed = $this->Cart->removeFromCart($data['product_id']);

        if ($removed) {
            $this->sendJsonResponse(200, 'Producto borrado del carrito exitosamente.');
        } else {
            $this->sendJsonResponse(400, 'El producto no existe en el carrito.');
        }
    }

    public function getCart()
    {
        $cartItems = $this->Cart->getCart();
        $this->sendJsonResponse(200, 'Productos obtenidos exitosamente.', ['products' => $cartItems]);
    }

    public function updateQuantity()
    {
        $data = $this->getJsonInput();

        if (isset($data['product_id']) && isset($data['quantity'])) {
            $productId = $data['product_id'];
            $quantity = $data['quantity'];
            $this->Cart->updateQuantity($productId, $quantity);
            $this->sendJsonResponse(200, 'Cantidad actualizada exitosamente.');
        } else {
            $this->sendJsonResponse(400, 'Faltan datos del producto o la cantidad.');
        }
    }


    public function confirmCheckout()
    {
        $data = $this->getJsonInput();
        $cartItems = $this->Cart->getCart();
        try {
            $userID = $this->User->createUser($data['name'],
                                              $data['email'],
                                              $data['password'],
                                              $data['address'],
                                              $data['user_type']);
                                              

            $order_id = $this->Order->addOrder($userID, $cartItems);
        } catch (\Exception $e) {
            $this->sendJsonResponse(500, 'Error al crear el usuario.', ['error' => $e->getMessage()]);
            exit();
        }

        $this->Cart->emptyCart();
        $this->sendJsonResponse(200, 'Productos comprados exitosamente.', ['order_id' => $order_id]);
    }

    private function getJsonInput()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    private function sendJsonResponse($statusCode, $message, $additionalData = [])
    {
        http_response_code($statusCode);
        echo json_encode(array_merge(['message' => $message], $additionalData));
    }
}
