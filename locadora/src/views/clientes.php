<?php
require '../controller/ClientesController.php';
$usuarios = new ClientesController();
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
        <h1 class="p-1 title">Clientes</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
            <a href="./cadastrarCliente.php" class="btn btn-sm btn-primary">Cadastrar cliente</a><br>
        </div>
        <table class="table table-striped " id="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Endereco</th>
                    <th>Telefone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios->findAll() as $usuario) : ?>
                    <tr>
                        <td> <?= $usuario->getidusuario() ?> </td>
                        <td> <?= $usuario->getNome() ?> </td>
                        <td> <?= $usuario->getemail() ?> </td>
                        <td> <?= $usuario->getendereco() ?> </td>
                        <td> <?= $usuario->gettelefone() ?> </td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarCliente.php?id=<?= $usuario->getidusuario() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarCliente.php?id=<?= $usuario->getidusuario() ?>" class="btn btn-danger">apagar</a><br>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>




</html>