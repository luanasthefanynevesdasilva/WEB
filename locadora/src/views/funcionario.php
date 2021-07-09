<?php
require '../controller/funcionarioController.php';
$funcionarios = new funcionarioController();
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
        <h1 class="p-1 title">Funcionario</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
            <a href="./cadastrarfuncionario.php" class="btn btn-sm btn-primary">Cadastrar funcionario</a><br>
        </div>
        <table class="table table-striped " id="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome Completo</th>
                    <th>CPF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($funcionarios->findAll() as $funcionario) : ?>
                    <tr>
                        <td> <?= $funcionario->getidfuncionario() ?> </td>
                        <td> <?= $funcionario->getNome() ?> </td>
                        <td> <?= $funcionario->getCpf() ?> </td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarfuncionario.php?id=<?= $funcionario->getidfuncionario() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarfuncionario.php?id=<?= $funcionario->getidfuncionario() ?>" class="btn btn-danger">apagar</a><br>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>




</html>