<?php

if(!$_GET || !$_POST) header('Location: ./vendas.php');

require_once '../controller/veiculoController.php';
require_once '../controller/ItensVendaController.php';
require_once '../controller/VendasController.php';

$veiculo = new veiculoController();
$aluguel = new VendasController();
$itemaluguels = new ItensVendaController();

$idusuario = intval($_POST['idusuario']);
$idfuncionarios = intval($_POST['idfuncionario']);
$idveiculos = $_POST['idveiculo'];
$pagoArray = $_POST['pago'];
$diariaArray = $_POST['diaria'];
$totalArray = $_POST['total'];
$trocoArray = $_POST['troco'];
$descontoArray = $_POST['desconto'];
$datalocacaoArray = $_POST['datalocacao'];
$combustivelatualArray = $_POST['combustivelatual'];
$idaluguel = $_GET['id'];

foreach ($idveiculos as $idveiculo) {
     array_push($valores, $veiculo->findOne($idveiculo)->gettipoveiculo());
}




$itemaluguels->setidaluguel($idaluguel);
$itemaluguels->setidveiculo($idveiculoArray);
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


try {

    $itemaluguels->delete($itemaluguels->getidaluguel());

    for ($i = 0; $i < count($idveiculoArray); $i++) { 
        $itemaluguels->insert(
            $itemaluguels->getIdaluguel(), 
            $itemaluguels->getidveiculo()[$i], 

        );
    }

    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo 'Erro';
}

