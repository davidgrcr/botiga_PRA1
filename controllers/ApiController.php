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
    }



    protected function getJsonInput()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    protected function sendJsonResponse($statusCode, $message, $additionalData = [])
    {
        http_response_code($statusCode);
        echo json_encode(array_merge(['message' => $message], $additionalData));
    }
}
