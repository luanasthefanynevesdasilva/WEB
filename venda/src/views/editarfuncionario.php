<?php

require '../controller/funcionarioController.php';
if (!$_GET) header('Location: ./funcionario.php');;
$idfuncionario = $_GET['id'];
$funcionario = new funcionarioController();
$funcionario->setidfuncionario($idfuncionario);
$funcionario->setNome($funcionario->findOne($idfuncionario)->getNome());
$funcionario->setCpf($funcionario->findOne($idfuncionario)->getCpf());


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

        <h1 class="p-1 title">atualizar funcionario</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarfuncionario.php?id=<?= $funcionario->getidfuncionario() ?>" method="POST">
            <div class="mb-3"><br>
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" value="<?= $funcionario->getNome() ?>" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" value="<?= $funcionario->getCpf() ?>" step="any" name="cpf" class="form-control" id="cpf" required>
                </div>
            </div>

            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $funcionario->setNome($_POST['nome']);
        $funcionario->setcpf($_POST['cpf']);

        try {
            $funcionario->update($idfuncionario);
            header("Location: ./funcionario.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o cliente!';
        }

        ?>
    </div>
</body>


</html>