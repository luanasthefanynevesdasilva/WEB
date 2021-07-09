<?php
require '../controller/funcionarioController.php';
require '../controller/ClientesController.php';
require '../controller/veiculoController.php';
require_once '../controller/VendasController.php';
require_once '../controller/ItensVendaController.php';


$idaluguel = $_GET['id'];
$funcionarios = new funcionarioController();
$usuarios = new ClientesController();
$veiculos = new veiculoController();
$aluguel = new VendasController();
$itemaluguel = new ItensVendaController();

$aluguel = $aluguel->findOne($idaluguel);
$itemaluguel = $itemaluguel->findAllidaluguel($idaluguel);

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
        <form class='form' action="./atualizarVenda.php?id=<?= $aluguel->getidaluguel() ?>" method="POST">
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
                <input type="number" value="<?= $aluguel->getpago() ?>" name="pago" class="form-control" id="pago" autocomplete="off" required>
            </div>
                        <div class="mb-3"><br>
                <label for="diaria" class="form-label">diaria</label>
                <input type="number" value="<?= $aluguel->getdiaria() ?>" name="diaria" class="form-control" id="diaria" autocomplete="off" required>
            </div>
                        <div class="mb-3"><br>
                <label for="total" class="form-label">total</label>
                <input type="number" value="<?= $aluguel->gettotal() ?>" name="total" class="form-control" id="total" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="troco" class="form-label">troco</label>
                <input type="number" value="<?= $aluguel->gettroco() ?>" name="troco" class="form-control" id="troco" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="desconto" class="form-label">desconto</label>
                    <input type="number" value="<?= $aluguel->getdesconto() ?>" step="any" name="desconto" class="form-control" id="desconto" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datalocacao" class="form-label">Data-locacao</label>
                    <input type="date" min = 2021-07-09  value="<?= $aluguel->getdatalocacao() ?>" step="any" name="desconto" class="form-control" id="desconto" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="combustivelatual" class="form-label">combustivel-atual</label>
                    <input type="number" value="<?= $aluguel->getcombustivelatual() ?>" step="any" name="combustivelatual" class="form-control" id="combustivelatual" required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php
 

        ?>
    </div>
</body>


</html>