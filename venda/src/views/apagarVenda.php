<?php

require_once '../controller/VendasController.php';
if (!$_GET) header('Location: ./vendas.php');

$aluguel = new VendasController();
$aluguel->setidaluguel($_GET['id']);

try {
    $aluguel->delete($aluguel->getidaluguel());
    header('Location: ./vendas.php');
} catch (PDOException $err) {
    echo 'Erro';
}
