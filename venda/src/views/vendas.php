<?php
require_once '../controller/VendasController.php';
require_once '../controller/funcionarioController.php';
require_once '../controller/ClientesController.php';
require_once '../controller/veiculoController.php';
require_once '../controller/ItensVendaController.php';

$aluguels = new VendasController();
$funcionarios = new funcionarioController();
$usuarios = new ClientesController();
$veiculos = new veiculoController();
$itemaluguel = new ItensVendaController();

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="estilo.css">
    <title>Pagina Inicial</title>


</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">aluguel</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
            <a href="./realizarVenda.php" class="btn btn-sm btn-primary">Realizar aluguel</a><br>
        </div>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th></th>
                <th>Nome do Funcionario</th>
                <th>Nome do cliente</th>
                <th>pago</th>
                <th>diaria</th>               
                <th>total</th>
                <th>troco</th>
                <th>desconto</th>
                <th>datalocacao</th>
                <th>combustivelatual</th>
                <th></th>
            </thead>
            <tbody>
                <?php


                foreach ($aluguels->findAll() as $aluguel) { ?>
                    <tr>
                        <td> <?= $aluguel->getidaluguel() ?> </td>
                        <td> <?= $funcionarios->findOne($aluguel->getidfuncionario())->getNome() ?> </td>
                        <td> <?= $usuarios->findOne($aluguel->getidusuario())->getNome() ?> </td>
                        <td> <?= $aluguel->getpago() ?> </td>
                        <td> <?= $aluguel->getdiaria() ?> </td>
                        <td> <?= $aluguel->gettotal() ?> </td>
                        <td> <?= $aluguel->gettroco() ?> </td>
                        <td> <?= $aluguel->getdesconto() ?> </td>
                        <td> <?= $aluguel->getdatalocacao() ?> </td>
                        <td> <?= $aluguel->getcombustivelatual() ?> </td>


                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarVenda.php?id=<?= $aluguel->getidaluguel() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarVenda.php?id=<?= $aluguel->getidaluguel() ?>" class="btn btn-danger">apagar</a>
                                <br>
                            </div>
                        </td>
                    </tr> <?php
                        }
                            ?>
            </tbody>
        </table>
    </div>

</body>



</html>