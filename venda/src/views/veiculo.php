<?php
require_once '../controller/veiculoController.php';
require_once '../controller/seguroController.php';
$veiculos = new veiculoController();
$seguros = new seguroController();
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
        <h1 class="p-1 title">veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        <a href="./cadastrarveiculo.php" class="btn btn-sm btn-primary">Cadastrar Veiculo</a><br>

        </div>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th></th>
                <th>Valor do seguro</th>
                <th>Tipo-Veiculo</th>
                <th>chassin</th>
                <th>modelo</th>
                <th>ano</th>
                <th>cor</th>
                <th>placa</th>
                <th></th>

            </thead>
            <tbody>
                <?php


                foreach ($veiculos->findAll() as $veiculo) { ?>
                    <tr>
                        <td> <?= $veiculo->getidveiculo() ?> </td>
                        <td> <?= $seguros->findOne($veiculo->getidseguro())->getvalor() ?> </td>
                        <td> <?= $veiculo->gettipoveiculo() ?> </td>
                        <td> <?= $veiculo->getano() ?> </td>    
                        <td> <?= $veiculo->getcor() ?> </td>    
                        <td> <?= $veiculo->getmodelo() ?> </td>    
                        <td> <?= $veiculo->getchassin() ?> </td> 
                        <td> <?= $veiculo->getplaca() ?> </td>     
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarveiculo.php?id=<?= $veiculo->getidveiculo() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarveiculo.php?id=<?= $veiculo->getidveiculo() ?>" class="btn btn-danger">apagar</a>
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