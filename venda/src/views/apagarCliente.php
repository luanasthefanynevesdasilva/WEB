<?php

require_once '../controller/ClientesController.php';
if (!$_GET) header('Location: ./clientes.php');

$usuario = new ClientesController();
$usuario->setidusuario($_GET['id']);

try {
    $usuario->delete($usuario->getidusuario());
    header('Location: ./clientes.php');
} catch (PDOException $err) {
    echo 'Erro';
}
