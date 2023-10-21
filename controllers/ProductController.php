<?php

namespace controllers;

use controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModelRepository('Product');
    }


    public function index($productId)
    {
        $product = $this->Product->getProductById($productId);
        $this->views->getView('product', 'product', [
            'title' => ucfirst($product->getName()) . ' | Shoes Store',
            'product' => $product,
            'activeCategory' => $product->getCategoryId()
        ]);
    }
}
