<?php
require_once '../controller/VendasController.php';
require '../controller/ClientesController.php';
require '../controller/funcionarioController.php';
if (!$_GET) header('Location: ./Venda.php');;
$idaluguel = $_GET['id'];
$aluguel = new VendasController();
$funcionarios = new funcionarioController();
$usuarios = new ClientesController();
$aluguel->setidaluguel($idaluguel);
$aluguel->setidusuario($aluguel->findOne($idaluguel)->getidusuario());
$aluguel->setidfuncionario($aluguel->findOne($idaluguel)->getidfuncionario());
$aluguel->setpago($aluguel->findOne($idaluguel)->getpago());
$aluguel->setdiaria($aluguel->findOne($idaluguel)->getdiaria());
$aluguel->settotal($aluguel->findOne($idaluguel)->gettotal());
$aluguel->settroco($aluguel->findOne($idaluguel)->gettroco());
$aluguel->setdesconto($aluguel->findOne($idaluguel)->getdesconto());
$aluguel->setdatalocacao($aluguel->findOne($idaluguel)->getdatalocacao());
$aluguel->setcombustivelatual($aluguel->findOne($idaluguel)->getcombustivelatual());


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

        <h1 class="p-1 title">Atualizar Aluguel</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarVenda.php?id=<?= $aluguel->getidaluguel() ?>" method="POST">
             <div class="mb-3">
                <label for="idusuario" class="form-label">Selecionar o cliente</label>

                <select name="idusuario" class="form-select" id="idusuario" disabled required>
                    <option value="" selected disabled>Selecione o cliente</option>
                    <?php
                    foreach ($usuarios->findAll() as $usuario) {
                        if ($usuario->getidusuario() == $aluguel->getidusuario()) { ?>
                            <option selected value="<?= $usuario->getidusuario() ?>"><?= $usuario->getNome() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $usuario->getidusuario() ?>"><?= $usuario->getNome() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
             <div class="mb-3">
                <label for="idfuncionario" class="form-label">Selecionar o funcionario</label>

                <select name="idfuncionario" class="form-select" id="idfuncionario" disabled required>
                    <option value="" selected disabled>Selecione o funcionario</option>
                    <?php
                    foreach ($funcionarios->findAll() as $funcionario) {
                        if ($funcionario->getidfuncionario() == $aluguel->getidfuncionario()) { ?>
                            <option selected value="<?= $funcionario->getidfuncionario() ?>"><?= $funcionario->getNome() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $funcionario->getidfuncionario() ?>"><?= $funcionario->getNome() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
                                    <div class="mb-3"><br>
                <label for="pago" class="form-label">pago</label>
                <input type="text" value="<?= $aluguel->getpago() ?>" name="pago" class="form-control" id="pago" autocomplete="off" required>
            </div>
                        <div class="mb-3"><br>
                <label for="diaria" class="form-label">diaria</label>
                <input type="text" value="<?= $aluguel->getdiaria() ?>" name="diaria" class="form-control" id="diaria" autocomplete="off" required>
            </div>
                        <div class="mb-3"><br>
                <label for="total" class="form-label">total</label>
                <input type="text" value="<?= $aluguel->gettotal() ?>" name="total" class="form-control" id="total" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="troco" class="form-label">troco</label>
                <input type="text" value="<?= $aluguel->gettroco() ?>" name="troco" class="form-control" id="troco" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="desconto" class="form-label">desconto</label>
                    <input type="text" value="<?= $aluguel->getdesconto() ?>" step="any" name="desconto" class="form-control" id="desconto" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datalocacao" class="form-label">data-aluguel</label>
                    <input type="date" value="<?= $aluguel->getdatalocacao() ?>" step="any" name="datalocacao" class="form-control" id="datalocacao" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="combustivelatual" class="form-label">combustive-latual</label>
                    <input type="text" value="<?= $aluguel->getcombustivelatual() ?>" step="any" name="combustivelatual" class="form-control" id="combustivelatual" required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $aluguel->setidusuario($_POST['idusuario']);
        $aluguel->setidfuncionario($_POST['idfuncionario']);
        $aluguel->setpago($_POST['pago']);
        $aluguel->setdiaria($_POST['diaria']);
        $aluguel->settotal($_POST['total']);
        $aluguel->settroco($_POST['troco']);
        $aluguel->setdesconto($_POST['desconto']);
        $aluguel->setdatalocacao($_POST['datalocacao']);
        $aluguel->setcombustivelatual($_POST['combustivelatual']);


        try {
            $aluguel->update($idaluguel);
            header("Location: ./Venda.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar a devolucao!';
        }

        ?>
    </div>
</body>


</html>