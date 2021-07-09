<?php

require '../controller/seguroController.php';
if (!$_GET) header('Location: ./seguro.php');;
$idseguro = $_GET['id'];
$seguro = new seguroController();
$seguro->setidseguro($idseguro);
$seguro->setvalor($seguro->findOne($idseguro)->getvalor());
$seguro->setdatainicio($seguro->findOne($idseguro)->getdatainicio());
$seguro->setdatafinal($seguro->findOne($idseguro)->getdatafinal());


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

        <h1 class="p-1 title">atualizar seguro</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>

        </div>
        <form class='form' action="./editarseguro.php?id=<?= $seguro->getidseguro() ?>" method="POST">
            <div class="mb-3"><br>
                <label for="valor" class="form-label">valor</label>
                <input type="number" value="<?= $seguro->getvalor() ?>" name="valor" class="form-control" id="valor" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datainicio" class="form-label">datainicio</label>
                    <input type="date" min = 2021-07-09  value="<?= $seguro->getdatainicio() ?>" step="any" name="datainicio" class="form-control" id="datainicio" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datafinal" class="form-label">datafinal</label>
                    <input type="date" min = 2021-07-09  value="<?= $seguro->getdatafinal() ?>" step="any" name="datafinal" class="form-control" id="datafinal" required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $seguro->setvalor($_POST['valor']);
        $seguro->setdatainicio($_POST['datainicio']);
        $seguro->setdatafinal($_POST['datafinal']);
        try {
            $seguro->update($idseguro);
            header("Location: ./seguro.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o seguro!';
        }

        ?>
    </div>
</body>


</html>