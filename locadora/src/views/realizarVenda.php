<?php

require_once '../controller/funcionarioController.php';
require_once '../controller/veiculoController.php';
require_once '../controller/ClientesController.php';
$funcionarios = new funcionarioController();
$veiculos = new veiculoController();
$usuarios = new ClientesController();

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
        <h1 class="p-1 title">Realizar aluguel</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' id="form" action="./finalizarVenda.php" method="POST">

            <div class="mb-3"><br>
                <label for="idusuario" class="form-label">Selecionar Cliente</label>
                <select name="idusuario" class="form-select" id="idusuario" required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    <?php
                    foreach ($usuarios->findAll() as $usuario) { ?>
                        <option value="<?= $usuario->getidusuario() ?>"><?= $usuario->getNome() ?></option> <?php
                                                                                                        }
                                                                                                            ?>
                </select>
            </div>

            <div class="mb-3"><br>
                <label for="idfuncionario" class="form-label">Selecionar funcionario</label>
                <select name="idfuncionario" class="form-select" id="idfuncionario" required>
                    <option value="" selected disabled>Selecione um funcionario</option>
                    <?php
                    foreach ($funcionarios->findAll() as $funcionario) { ?>
                        <option value="<?= $funcionario->getidfuncionario() ?>"><?= $funcionario->getNome() ?></option> <?php
                                                                                                        }
                                                                                                            ?>
                </select>
            </div><br>
            <div id="area-produto">
                <div class="mb-3 d-flex justify-content-between" id="produto-specs">
                    <div class="input">
                        <label for="idveiculo[]" class="form-label">Selecionar um veiculo</label>
                        <select name="idveiculo[]" class="form-select" id="idveiculo" required>
                            <option value="" selected disabled>Selecione um veiculo</option>
                            <?php
                            foreach ($veiculos->findAll() as $veiculo) { ?>
                                <option value="<?= $veiculo->getidveiculo() ?>"><?= $veiculo->gettipoveiculo() ?></option> <?php
                                                                                                            }
                                                                                                                ?>
                        </select>
                    </div><br>
                     <div class="input" style="width: 25% !important;">
                        <label for="pago" class="form-label">pago</label>
                        <input type="number" step="any"  name="pago" class="form-control" id="pago" required>
                    </div><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="diaria" class="form-label">diaria</label>
                        <input type="number" step="any" min="1" name="diaria" class="form-control" id="diaria" required>
                    </div><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="total" class="form-label">total</label>
                        <input type="number" step="any" min="1" name="total" class="form-control" id="total" required>
                    </div><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="troco" class="form-label">troco</label>
                        <input type="number" step="any"  name="troco" class="form-control" id="troco" required>
                    </div><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="desconto" class="form-label">desconto</label>
                        <input type="number" step="any"  name="desconto" class="form-control" id="desconto" required>
                    </div>
                        <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datalocacao" class="form-label">Data-aluguel</label>
                    <input type="date" step="any" name="datalocacao" class="form-control" id="datalocacao" min = 2021-07-09  required>
                </div><br>
            </div>
                    <div class="input" style="width: 25% !important;">
                        <label for="combustivelatual" class="form-label">combustivelatual</label>
                        <input type="number" step="any" min="1" name="combustivelatual" class="form-control" id="combustivelatual" required>
                    </div>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar aluguel</button>
            </div>
        </form>
    </div>
</body>


</html>