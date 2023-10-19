<?php

namespace controllers;

use controllers\Controller;
use views\AdminViews;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->views = new AdminViews();
    }

    public function index()
    {
        session_start();

        if (isset($_SESSION['email']) && isset($_SESSION['contrasenya'])) {
            $this->views->getView('admin', 'home', ['title' => 'Admin | Shoes Store']);
        } else {
            $this->views->getView('admin', 'login', ['title' => 'Admin | Shoes Store']);
        }
    }
}