<?php

namespace controllers;

use controllers\ApiController;
use models\Category\CategoryFileManager;

class ApiAdminController extends ApiController
{

    public function __construct()
    {
        $this->loadModelRepository('Order');
        $this->loadModelRepository('User');
        $this->loadModelRepository('Product');
        $this->loadModelRepository('Category');
    }

    public function login()
    {
        $data = $this->getJsonInput();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $correct_email = "admin@admin.com";
            $correct_contrasenya = "admin";

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
        $this->sendJsonResponse(200, 'Usuario deslogueado exitosamente.');
    }

    public function createCategory()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];

                // Validar nombre
                if (empty($name)) {
                    $this->sendJsonResponse(400, 'El nombre es obligatorio.');
                    return;
                }

                // Validar archivo
                if (empty($_FILES["categoryImg"]["tmp_name"])) {
                    $this->sendJsonResponse(400, 'La imagen es obligatoria.');
                    return;
                }

                // Validar si el archivo es una imagen
                $check = getimagesize($_FILES["categoryImg"]["tmp_name"]);
                if ($check === false) {
                    $this->sendJsonResponse(400, 'El archivo debe ser una imagen.');
                    return;
                }

                // Escribir el archivo en el disco
                $file_name = basename($_FILES["categoryImg"]["name"]);
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/img/categories/";
                $target_file = $target_dir . $file_name;

                if (file_exists($target_file)) {
                    $this->sendJsonResponse(400, 'El archivo ya existe.');
                    return;
                }

                if (is_dir($target_dir) === false) {
                    mkdir($target_dir);
                }

                if (move_uploaded_file($_FILES["categoryImg"]["tmp_name"], $target_file)) {
                    $this->Category->createCategory($name, $file_name);
                    $this->sendJsonResponse(201, 'Categoría creada exitosamente.');
                } else {
                    var_dump("Error al mover el archivo: " . $_FILES["categoryImg"]["error"]);
                    $this->sendJsonResponse(500, 'Error al guardar la imagen.');
                }
            }
        } catch (\Throwable $th) {
            $this->sendJsonResponse(400, 'Error al crear la categoría: ' . $th->getMessage());
        }
    }

    public function deleteCategory($categoryId)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $category = $this->Category->getCategoryById($categoryId);
                if ($category) {
                    $this->Category->deleteCategory($categoryId);
                    $this->sendJsonResponse(200, 'Categoría eliminada exitosamente.');
                    // eliminar del disco
                    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/img/categories/";
                    $target_file = $target_dir . $category->getImage();
                    unlink($target_file);
                } else {
                    $this->sendJsonResponse(404, 'Categoría no encontrada.');
                }
            }
        } catch (\Throwable $th) {
            $this->sendJsonResponse(400, 'Error al eliminar la categoría: ' . $th->getMessage());
        }
    }

    public function editCategory()
    {
        try {

            $loadingFileImg = false;
            $id = $_POST['id'];
            $name = $_POST['name'];
            $categoryImg = $_POST['categoryImg'];

            if (isset($_FILES["categoryImg"]["tmp_name"])) {
                $loadingFileImg = true;
                $categoryImg = $_FILES["categoryImg"]["name"];
            }

            // Validar nombre
            if (empty($name)) {
                $this->sendJsonResponse(400, 'El nombre es obligatorio.');
                return;
            }

            // Validar archivo
            if (empty($_FILES["categoryImg"]["tmp_name"]) && empty($categoryImg)) {
                $this->sendJsonResponse(400, 'La imagen es obligatoria.');
                return;
            }

            if (empty($categoryImg)) {
                $this->sendJsonResponse(400, 'La imagen es obligatoria.');
                return;
            }

            if ($loadingFileImg) {
                // Escribir el archivo en el disco
                $file_name = basename($categoryImg);
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/img/categories/";
                $target_file = $target_dir . $file_name;

                if (file_exists($target_file)) {
                    $this->sendJsonResponse(400, 'La imagen ya existe.');
                    return;
                }

                if (move_uploaded_file($_FILES["categoryImg"]["tmp_name"], $target_file)) {
                    $category = $this->Category->getCategoryById($id);
                    $target_file = $target_dir . $category->getImage();
                    unlink($target_file);
                    $this->Category->updateCategory($id, $name, $file_name);
                    $this->sendJsonResponse(201, 'Categoría editada exitosamente.');
                } else {
                    var_dump("Error al mover el archivo: " . $_FILES["categoryImg"]["error"]);
                    $this->sendJsonResponse(500, 'Error al guardar la imagen.');
                }
            } else {
                $this->Category->updateCategory($id, $name, $categoryImg);
                $this->sendJsonResponse(201, 'Categoría editada exitosamente.');
            }
        } catch (\Throwable $th) {
            $this->sendJsonResponse(400, 'Error al editar la categoría: ' . $th->getMessage());
        }
    }
}
