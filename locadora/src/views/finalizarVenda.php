<?php
require_once '../controller/ClientesController.php';
require_once '../controller/funcionarioController.php';
require_once '../controller/veiculoController.php';
require_once '../controller/VendasController.php';
require_once '../controller/ItensVendaController.php';



$idusuario = intval($_POST['idusuario']);
$idfuncionario = intval($_POST['idfuncionario']);
$idveiculos = $_POST['idveiculo'];
$pago = $_POST['pago'];
$diaria = $_POST['diaria'];
$total = $_POST['total'];
$troco = $_POST['troco'];
$desconto = $_POST['desconto'];
$datalocacao = $_POST['datalocacao'];
$combustivelatual = $_POST['combustivelatual'];



$veiculo = new veiculoController();
$aluguel = new VendasController();
$itemaluguel = new ItensVendaController();



try {
    $aluguel->insert($idusuario,$idfuncionario,$pago,$diaria,$total,$troco,$desconto,$datalocacao,$combustivelatual,0);
    $aluguel->setidusuario($idusuario);
    $aluguel->setidfuncionario($idfuncionario);
    $aluguel->setpago($pago);
    $aluguel->setdiaria($diaria);
    $aluguel->settotal($total);
    $aluguel->settroco($troco);
    $aluguel->setdesconto($desconto);
    $aluguel->setdatalocacao($datalocacao);
    $aluguel->setcombustivelatual($combustivelatual);
    $aluguel->setidaluguel($aluguel->findidaluguel($idusuario));
    $aluguel->setidaluguel($aluguel->findidaluguel($idfuncionario));
    $aluguel->setidaluguel($aluguel->findidaluguel($pago));
    $aluguel->setidaluguel($aluguel->findidaluguel($diaria));
    $aluguel->setidaluguel($aluguel->findidaluguel($total));
    $aluguel->setidaluguel($aluguel->findidaluguel($troco));
    $aluguel->setidaluguel($aluguel->findidaluguel($desconto));
    $aluguel->setidaluguel($aluguel->findidaluguel($datalocacao));
    $aluguel->setidaluguel($aluguel->findidaluguel($combustivelatual));
    $itemaluguel->setidaluguel($aluguel->getidaluguel());


    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo 'erro';
}

