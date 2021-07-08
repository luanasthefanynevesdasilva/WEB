<?php

require_once '../controller/veiculoController.php';

$idseguro = intval($_POST['idseguro']);
$tipoveiculo = $_POST['tipoveiculo'];
$ano = $_POST['ano'];
$cor = $_POST['cor'];
$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$chassin = $_POST['chassin'];

$veiculo = new veiculoController();




try {
    $veiculo->insert($idseguro,$tipoveiculo,$ano,$cor,$placa,$modelo,$chassin,0);
    $veiculo->setidseguro($idseguro);
    $veiculo->settipoveiculo($tipoveiculo);
    $veiculo->setano($ano);
    $veiculo->setcor($cor);
    $veiculo->setplaca($placa);
    $veiculo->setmodelo($modelo);
    $veiculo->setchassin($chassin);
    $veiculo->setidveiculo($veiculo->findidveiculo($idseguro));
    $veiculo->setidveiculo($veiculo->findidveiculo($tipoveiculo));
    $veiculo->setidveiculo($veiculo->findidveiculo($ano));
    $veiculo->setidveiculo($veiculo->findidveiculo($cor));
    $veiculo->setidveiculo($veiculo->findidveiculo($placa));
    $veiculo->setidveiculo($veiculo->findidveiculo($modelo));
    $veiculo->setidveiculo($veiculo->findidveiculo($chassin));


    

    header('Location: ./veiculo.php');

} catch (PDOException $err) {
    echo ' erro';
}

