<?php
namespace controllers;

use views\Views;
use models\Model;

class Controller
{
    protected $views;
    protected $repositories = [];

    public function __construct()
    {
        $this->views = new Views();
    }

    public function loadModelRepository($modelName)
    {
        $folder = strtolower($modelName);
        $repositoryClass = "models\\" . $folder . "\\" . $modelName . "Repository";

        if (class_exists($repositoryClass)) {
            $this->repositories[$modelName] = new $repositoryClass();
        } else {
            echo "No se encontró la clase {$repositoryClass}";
        }
    }

    public function __get($modelName)
    {
        if (array_key_exists($modelName, $this->repositories)) {
            return $this->repositories[$modelName];
        }
        return null;
    }

    
}
