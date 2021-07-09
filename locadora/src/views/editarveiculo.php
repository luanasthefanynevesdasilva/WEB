<?php
require_once '../controller/seguroController.php';
require '../controller/veiculoController.php';
if (!$_GET) header('Location: ./veiculo.php');;
$idveiculo = $_GET['id'];
$veiculo = new veiculoController();
$seguros = new seguroController();
$veiculo->setidveiculo($idveiculo);
$veiculo->setidseguro($veiculo->findOne($idveiculo)->getidseguro());
$veiculo->settipoveiculo($veiculo->findOne($idveiculo)->gettipoveiculo());
$veiculo->setano($veiculo->findOne($idveiculo)->getano());
$veiculo->setmodelo($veiculo->findOne($idveiculo)->getmodelo());
$veiculo->setcor($veiculo->findOne($idveiculo)->getcor());
$veiculo->setchassin($veiculo->findOne($idveiculo)->getchassin());
$veiculo->setplaca($veiculo->findOne($idveiculo)->getplaca());

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

        <h1 class="p-1 title">Atualizar Veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarveiculo.php?id=<?= $veiculo->getidveiculo() ?>" method="POST">
             <div class="mb-3">
                <label for="idseguro" class="form-label">Selecionar o valor do seguro</label>

                <select name="idseguro" class="form-select" id="idseguro" disabled required>
                    <option value="" selected disabled>Selecione o valor do seguro</option>
                    <?php
                    foreach ($seguros->findAll() as $seguro) {
                        if ($seguro->getidseguro() == $veiculo->getidseguro()) { ?>
                            <option selected value="<?= $seguro->getidseguro() ?>"><?= $seguro->getvalor() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $seguro->getidseguro() ?>"><?= $seguro->getvalor() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
            <div class="mb-3"><br>
                <label for="tipoveiculo" class="form-label">tipoveiculo</label>
                <input type="text" value="<?= $veiculo->gettipoveiculo() ?>" name="tipoveiculo" class="form-control" id="tipoveiculo" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="ano" class="form-label">ano</label>
                <input type="number" min="2000" max="2021" value="<?= $veiculo->getano() ?>" name="ano" class="form-control" id="ano" autocomplete="off" required>
            </div>
                 <div class="mb-3"><br>
                <label for="modelo" class="form-label">cor</label>
                <input type="text" value="<?= $veiculo->getmodelo() ?>" name="modelo" class="form-control" id="modelo" autocomplete="off" required>
            </div>      
                   <div class="mb-3"><br>
                <label for="cor" class="form-label">placa</label>
                <input type="text" value="<?= $veiculo->getcor() ?>" name="cor" class="form-control" id="cor" autocomplete="off" required>
            </div>    
                       <div class="mb-3"><br>
                <label for="chassin" class="form-label">modelo</label>
                <input type="text" value="<?= $veiculo->getchassin() ?>" name="chassin" class="form-control" id="chassin" autocomplete="off" required>
            </div> 
                       <div class="mb-3"><br>
                <label for="placa" class="form-label">chassin</label>
                <input type="text" value="<?= $veiculo->getplaca() ?>" name="placa" class="form-control" id="placa" autocomplete="off" required>
            </div>      
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
            $veiculo->settipoveiculo($_POST['tipoveiculo']);
            $veiculo->setano($_POST['ano']);
            $veiculo->setmodelo($_POST['modelo']);
            $veiculo->setcor($_POST['cor']);
            $veiculo->setplaca($_POST['placa']);
            $veiculo->setchassin($_POST['chassin']);


        try {
            $veiculo->update($idveiculo);
            header("Location: ./veiculo.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o veiculo!';
        }

        ?>
    </div>
</body>


</html>