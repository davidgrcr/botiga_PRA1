<?php
namespace controllers;

use controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }


    public function index()
    {
        $categories = $this->Category->getAllCategories();
        $this->views->getView('home', 'home', ['title' => 'Shoes Store', 'categories' => $categories]);
    }
}