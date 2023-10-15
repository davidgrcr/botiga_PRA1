<?php

namespace controllers;

use controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
        $this->loadModel('Product');
    }


    public function index($categoryId)
    {
        $category = $this->Category->getCategoryById($categoryId);
        $products = $this->Product->getProductsByCategoryId($categoryId);
        $this->views->getView('category', 'category', ['title' => 'category | Shoes Store', 'category' => $category, 'products' => $products]);
    }
}
