<?php

namespace controllers;

use controllers\Controller;
use views\AdminViews;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->views = new AdminViews();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $correct_email = "admin@admin.com";
            $correct_contrasenya = "1234";

            $email = $_POST['email'];
            $contrasenya = $_POST['contrasenya'];

            if ($email == $correct_email && $contrasenya == $correct_contrasenya) {
                $_SESSION['email'] = $email;
                $_SESSION['contrasenya'] = $contrasenya;

                $this->views->getView('admin', 'home', ['title' => 'Admin | Shoes Store']);
            } else {
                $this->views->getView('admin', 'login', ['title' => 'Admin | Shoes Store']);
            }
        }
    }
}
