<?php

namespace controllers;

use controllers\Controller;
use views\AdminViews;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->views = new AdminViews();
        $this->loadModelRepository('Order');
        $this->loadModelRepository('User');
        $this->loadModelRepository('Product');
        $this->loadModelRepository('Category');
    }

    private function isCurrentUserAdmin()
    {
        session_start();
        return isset($_SESSION['email']) && isset($_SESSION['contrasenya']);
    }

    public function index()
    {
        session_start();

        if ($this->isCurrentUserAdmin()) {
            $orders = $this->Order->getAllOrders();
            $this->views->getView('admin', 'home', ['title' => 'Admin | Shoes Store', 'orders' => $orders]);
        } else {

            $this->views->getView('admin', 'login', ['title' => 'Admin | Shoes Store']);
        }
    }

    public function order($orderId)
    {
        if ($this->isCurrentUserAdmin()) {
            $order = $this->Order->getOrderById($orderId);
            $products = [];
            foreach ($order['products'] as $product) {
                $productId = $product['product_id'];
                $quantity = $product['quantity'];
                $productDB = $this->Product->getProductById($product['product_id']);
                $products[$productId]['product'] = $productDB;
                $products[$productId]['quantity'] = $quantity;
            }
            $user = $this->User->getUserById($order['user_id']);

            $this->views->getView('admin', 'orderDetail', [
                'title' => 'Admin | Shoes Store', 'order' => $order,
                'products' => $products,
                'user' => $user
            ]);
        } else {
            header('Location: /admin');
            exit;
        }
    }

    public function categories()
    {
        if ($this->isCurrentUserAdmin()) {
            $categories = $this->Category->getAllCategories();
            $this->views->getView('admin', 'categories', [
                'title' => 'Admin | Shoes Store',
                'categories' => $categories
            ]);
        } else {
            header('Location: /admin');
            exit;
        }
    }

    public function createCategory()
    {
        if ($this->isCurrentUserAdmin()) {
            $this->views->getView('admin', 'createCategory', ['title' => 'Admin | Shoes Store']);
        } else {
            header('Location: /admin');
            exit;
        }
    }

    public function editCategory($categoryId)
    {
        if ($this->isCurrentUserAdmin()) {
            $this->views->getView('admin', 'editCategory', [
                'title' => 'Admin | Shoes Store',
                'category' => $this->Category->getCategoryById($categoryId)
            ]);
        } else {
            header('Location: /admin');
            exit;
        }
    }

    public function products()
    {
        if ($this->isCurrentUserAdmin()) {
            $this->views->getView('admin', 'products', ['title' => 'Admin | Shoes Store']);
        } else {
            header('Location: /admin');
            exit;
        }
    }
}
