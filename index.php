<?php

// Iniciar sesión y gestionar datos de la sesión
require_once "config/SessionManager.php";
SessionManager::login();

// Se obtiene la ruta solicitada 
$request = $_GET['url'] ?? 'crypto/index';

// Se separa la ruta en segmentos para ser manejada
$segments = explode('/', trim($request, '/'));
$controller = $segments[0] ?? 'crypto';  // Controlador por defecto
$action = $segments[1] ?? 'index';       // Acción por defecto

// Construir la ruta del archivo del controlador
$controllerFile = "app/controllers/" . ucfirst($controller) . "Controller.php";

// Verificacion de la existencia del controlador
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    $className = ucfirst($controller) . "Controller";

    if (class_exists($className)) {
        $controllerObject = new $className();

        // Verificar si el método (acción) existe
        if (method_exists($controllerObject, $action)) {
            $controllerObject->$action();
        } else {
            echo "Error 404: Acción '$action' no encontrada.";
        }
    } else {
        echo "Error 404: Clase '$className' no encontrada.";
    }
} else {
    echo "Error 404: Controlador '$controller' no encontrado.";
}
