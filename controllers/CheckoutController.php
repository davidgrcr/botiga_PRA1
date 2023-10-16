<?php

namespace controllers;

use controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $this->views->getView('checkout', 'checkout', ['title' => 'cart | Shoes Store']);     
    }
}