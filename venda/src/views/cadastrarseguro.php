<?php
    require '../controller/seguroController.php';
    $seguro = new seguroController();
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
        <h1 class="p-1 title">Cadastrar seguro</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        </div>
        <form class='form' action="./cadastrarseguro.php" method="POST">
            
        <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" step="any" name="valor" class="form-control" id="valor" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datafinal" class="form-label">Data-final</label>
                    <input type="date" step="any" name="datafinal" class="form-control" id="datafinal" required>
                </div><br>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datainicio" class="form-label">Data-inicio</label>
                    <input type="date" step="any" name="datainicio" class="form-control" id="datainicio" required>
                </div><br>
            </div>


            <div class="button"><br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        <?php

            if(!$_POST) return;
            $seguro->setvalor($_POST['valor']);
            $seguro->setdatafinal($_POST['datafinal']);
            $seguro->setdatainicio($_POST['datainicio']);

            try {
                $seguro->insert($seguro->getvalor(),$seguro->getdatafinal(), $seguro->getdatainicio());
                echo 'seguro cadastrado com Sucesso!';
            } catch (PDOException $err) {
                echo 'Ocorreu um erro ao cadastrar o seguro!';
            }

        ?>
    </div>
</body>


</html>