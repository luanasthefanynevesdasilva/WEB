<?php
require_once '../controller/devolucaoController.php';
require_once '../controller/VendasController.php';

$devolucaos = new devolucaoController();
$aluguels = new VendasController();

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
        <h1 class="p-1 title">devolucao</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        <a href="./cadastrardevolucao.php" class="btn btn-sm btn-primary">Cadastrar devolucao</a><br>

        </div>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th></th>
                <th>ID-aluguel</th>
                <th>avaria</th>
                <th>extra</th>
                <th>datadevolucao</th>
                <th>combustiveldevolucao</th>
                <th></th>
            </thead>
            <tbody>
                <?php


                foreach ($devolucaos->findAll() as $devolucao) { ?>
                    <tr>
                        <td> <?= $devolucao->getiddevolucao() ?> </td>
                        <td> <?= $aluguels->findOne($devolucao->getidaluguel())->getidaluguel() ?> </td>
                        <td> <?= $devolucao->getavaria() ?> </td>
                        <td> <?= $devolucao->getextra() ?> </td>
                        <td> <?= $devolucao->getdatadevolucao() ?> </td>
                        <td> <?= $devolucao->getcombustiveldevolucao() ?> </td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editardevolucao.php?id=<?= $devolucao->getiddevolucao() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagardevolucao.php?id=<?= $devolucao->getiddevolucao() ?>" class="btn btn-danger">apagar</a>
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