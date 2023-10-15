<?php
// Autoloading
spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $file = __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($file)) {
        include $file;
    }
});

$path = !empty($_GET['url']) ? $_GET['url'] : 'home';
$path = explode('/', filter_var(rtrim($path, '/'), FILTER_SANITIZE_URL));
$controller = $path[0];
$controller = ucfirst($controller) . 'Controller';
$controller = "controllers\\$controller";

if (isset($path[1]) && is_numeric($path[1])) {
    $action = 'index';
    $param = $path[1];
} else {
    $action = $path[1] ?? 'index';
    $param = $path[2] ?? null;
}

echo "Controlador: $controller<br>";

if (class_exists($controller)) {
    $controllerInstance = new $controller();
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action($param);
    } else {
        // Manejar como error 404, acción no encontrada
        echo "Página no encontrada";
    }
} else {
    // Manejar como error 404, controlador no encontrado
    echo "Página no encontrada";
}
