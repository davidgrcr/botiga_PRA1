<?php
namespace views;

class Views
{
    public function getView($path, $view, $data = []) {
        $title = $data['title'] ?? 'Home'; // layout.php espera una variable $title
        $content = $this->getContent($path, $view, $data); // layout.php espera una variable $content
        $activeCategory = $data['activeCategory'] ?? null; // layout.php espera una variable $activeCategory
        require 'views/layout.php';
    }

    private function getContent($path, $view, $data) {
        ob_start();
        
        $viewFile = ($path === "home")
            ? "views/{$view}.php"
            : "views/{$path}/{$view}.php";

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
