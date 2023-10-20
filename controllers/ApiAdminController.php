<?php

namespace controllers;

use controllers\ApiController;

class ApiAdminController extends ApiController
{
    public function login()
    {
        $data = $this->getJsonInput();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $correct_email = "admin@admin.com";
            $correct_contrasenya = "1234";

            $email = $data['email'];
            $contrasenya = $data['contrasenya'];

            if ($email == $correct_email && $contrasenya == $correct_contrasenya) {
                $_SESSION['email'] = $email;
                $_SESSION['contrasenya'] = $contrasenya;

                $this->sendJsonResponse(201, 'Usuario logueado exitosamente.');
            } else {
                $this->sendJsonResponse(400, 'Usuario o contraseña incorrectos.');
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        $this->views->getView('admin', 'login', ['title' => 'Admin | Shoes Store']);
    }
}
