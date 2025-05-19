<?php
require_once(__DIR__ . '/controllers/CarroController.php');

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

$controller = new CarroController();

switch ($action) {
    case 'cadastrar':
        $controller->cadastrar();
        break;
    case 'listar':
    default:
        $controller->listar();
        break;
}
?>