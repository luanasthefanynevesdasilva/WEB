<?php
    require_once '../controller/VendasController.php';
    require '../controller/devolucaoController.php';
    $devolucao = new devolucaoController();
    $alugues = new VendasController();
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
        <h1 class="p-1 title">Realizar Devolucao</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' id="form" action="./finalizardevolucao.php" method="POST">
            <div id="area-produto">
                <div class="mb-3 d-flex justify-content-between" id="produto-specs">
                    <div class="input">
                        <label for="idaluguel" class="form-label">Selecionar um valor-pago</label>
                        <select name="idaluguel" class="form-select" id="idaluguel" required>
                            <option value="" selected disabled>Selecione um valor-pago</option>
                            <?php
                            foreach ($alugues->findAll() as $alugues) { ?>
                                <option value="<?= $alugues->getidaluguel() ?>"><?= $alugues->getpago() ?></option> <?php
                                                                                                            }
                                                                                                                ?>
                        </select>
                    </div><br>
                     <div class="input" style="width: 25% !important;">
                        <label for="avaria" class="form-label">avaria</label>
                        <input type="text" step="any" min="1" name="avaria" class="form-control" id="avaria" required>
                    </div><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="extra" class="form-label">extra</label>
                        <input type="text" step="any" min="1" name="extra" class="form-control" id="extra" required>
                    </div><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="datadevolucao" class="form-label">datadevolucao</label>
                        <input type="date" step="any" min="1" name="datadevolucao" class="form-control" id="datadevolucao" required>
                    </div><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="combustiveldevolucao" class="form-label">combustiveldevolucao</label>
                        <input type="text" step="any" min="1" name="combustiveldevolucao" class="form-control" id="combustiveldevolucao" required>
                    </div><br>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar</button>
            </div>
        </form>
    </div>
</body>


</html>