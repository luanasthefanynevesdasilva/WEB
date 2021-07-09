<?php

require '../controller/ClientesController.php';
if (!$_GET) header('Location: ./clientes.php');;
$idusuario = $_GET['id'];
$usuario = new ClientesController();
$usuario->setidusuario($idusuario);
$usuario->setNome($usuario->findOne($idusuario)->getNome());
$usuario->setemail($usuario->findOne($idusuario)->getemail());
$usuario->setendereco($usuario->findOne($idusuario)->getendereco());
$usuario->settelefone($usuario->findOne($idusuario)->gettelefone());

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

        <h1 class="p-1 title">Atualizar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarCliente.php?id=<?= $usuario->getidusuario() ?>" method="POST">
            <div class="mb-3"><br>
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10" value="<?= $usuario->getNome() ?>" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between"><br>
                <div class="input">
                    <label for="email" class="form-label">email</label>
                    <input type="email" value="<?= $usuario->getemail() ?>" step="any" name="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between"><br>
                <div class="input">
                    <label for="endereco" class="form-label">Endereco</label>
                    <input type="text" pattern="[a-z\s]+$" / \ title="sem numero"  minlength="10" value="<?= $usuario->getendereco() ?>" step="any" name="endereco" class="form-control" id="endereco" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between"><br>
                <div class="input">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel"  name="telefone"  \ pattern="^(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$"  \ title="Digite um telefone valido " value="<?= $usuario->gettelefone() ?>" step="any" name="telefone" class="form-control" id="telefone" required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
            $usuario->setNome($_POST['nome']);
            $usuario->setemail($_POST['email']);
            $usuario->setendereco($_POST['endereco']);
            $usuario->settelefone($_POST['telefone']);


        try {
            $usuario->update($idusuario);
            header("Location: ./clientes.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o cliente!';
        }

        ?>
    </div>
</body>


</html>