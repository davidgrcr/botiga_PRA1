<?php

namespace controllers;

use controllers\Controller;

class SummaryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModelRepository('Cart');
        $this->loadModelRepository('Product');
    }

    public function index()
    {
        $items = array();
        foreach ($this->Cart->getCart() as $productId => $quantity) {
            $product = $this->Product->getProductById($productId);
            $items[$productId]['product'] = $product;
            $items[$productId]['quantity'] = $quantity;
        }
            
        $this->views->getView('summary', 'summary', ['title' => 'Summary | Shoes Store', 'items' => $items]);
    }
}