<?php

namespace views;

class AdminViews
{
    public function getView($path, $view, $data = [])
    {
        $title = 'Administration';
        $content = $this->getContent($path, $view, $data); // layout.php espera una variable $content
        require 'views/adminLayout.php';
    }

    private function getContent($path, $view, $data)
    {
        ob_start();
        $viewFile = "views/{$path}/{$view}.php";

        if (file_exists($viewFile)) {
            if (!empty($data)) {
                extract($data); // Converteix l'array associatiu en variables independents amb el nom de la clau
            }
            require $viewFile;
        } else {
            echo "La vista {$viewFile} no se encontró.";
        }

        return ob_get_clean();
    }
}
