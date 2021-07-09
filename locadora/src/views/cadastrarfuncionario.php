<?php
    require '../controller/funcionarioController.php';
    $funcionario = new funcionarioController();
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
        <h1 class="p-1 title">Cadastrar Funcionario</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>

        </div>
        <form class='form' action="./cadastrarfuncionario.php" method="POST">
            <div class="mb-3"><br>

                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>

                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" step="any" name="cpf"  \
            pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \ title="Digite um CPF no formato: xxx.xxx.xxx-xx" class="form-control" id="cpf"  required>
                </div>
            </div>
            <div class="button"><br>

                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
      
        <?php


            if(!$_POST) return;
            $funcionario->setNome($_POST['nome']);
            $funcionario->setCpf($_POST['cpf']);

            try {
                $funcionario->insert($funcionario->getNome(), $funcionario->getCpf());
                echo 'funcionario cadastrado com Sucesso!';
            } catch (PDOException $err) {
                echo 'Ocorreu um erro ao cadastrar o funcionario!';
            }
   ?>
           
        

     
    </div>
</body>


</html>