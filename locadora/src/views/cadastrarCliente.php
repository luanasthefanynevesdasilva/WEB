<?php
    require '../controller/ClientesController.php';
    $usuario = new ClientesController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="estilo.css">
    <title>Pagina Inicial</title>
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        </div>
        <form class='form' action="./cadastrarCliente.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10"  name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="endereco" class="form-label">Endereco</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10" name="endereco" class="form-control" id="endereco" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" name="telefone"  \ pattern="^(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$"  \ title="Digite um telefone valido " 
                 class="form-control" id="telefone" autocomplete="off" required>
            </div>

            <div class="button"><br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>

        <?php

            if(!$_POST) return;
            $usuario->setNome($_POST['nome']);
            $usuario->setemail($_POST['email']);
            $usuario->setendereco($_POST['endereco']);
            $usuario->settelefone($_POST['telefone']);


            try {
                $usuario->insert($usuario->getNome(), $usuario->getemail(), $usuario->getendereco(), $usuario->gettelefone());
                echo 'Cliente cadastrado com Sucesso!';
            } catch (PDOException $err) {
                echo 'Ocorreu um erro ao cadastrar o cliente!';
            }

        ?>
    </div>
</body>


</html>