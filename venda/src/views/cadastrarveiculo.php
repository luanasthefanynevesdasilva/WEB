<?php
require_once '../controller/veiculoController.php';
require_once '../controller/seguroController.php';
$seguros = new seguroController();
$veiculo = new veiculoController();

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
        <h1 class="p-1 title">Veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' id="form" action="./finalizarveiculo.php" method="POST">

  <div id="area-produto"><br>
            <div class="mb-3 d-flex justify-content-between" id="produto-specs">
                    <div class="mb-3">
                <label for="idseguro" class="form-label">Selecionar valor do seguro</label>
                <select name="idseguro" class="form-select" id="idseguro" required>
                    <option value="" selected disabled>Selecione um valor do seguro</option>
                    <?php
                    foreach ($seguros->findAll() as $seguro) { ?>
                        <option value="<?= $seguro->getidseguro() ?>"><?= $seguro->getvalor() ?></option> <?php
                                                                                                        }
                                                                                                            ?>
                </select>
            </div>

            <div class="input" style="width: 25% !important;"><br>
                        <label for="tipoveiculo" class="form-label">Tipo-veiculo</label>
                        <input type="text" step="any" min="1" name="tipoveiculo" class="form-control" id="tipoveiculo" required>
                    </div>
                     <div class="input" style="width: 25% !important;"><br>
                        <label for="ano" class="form-label">ano</label>
                        <input type="text" step="any" min="1" name="ano" class="form-control" id="ano" required>
                    </div>
                    <div class="input" style="width: 25% !important;"><br>
                        <label for="cor" class="form-label">cor</label>
                        <input type="text" step="any" min="1" name="cor" class="form-control" id="cor" required>
                    </div>
                    <div class="input" style="width: 25% !important;"><br>
                        <label for="placa" class="form-label">placa</label>
                        <input type="text" step="any" min="1" name="placa" class="form-control" id="placa" required>
                    </div>
                    <div class="input" style="width: 25% !important;"><br>
                        <label for="chassin" class="form-label">chassin</label>
                        <input type="text" step="any" min="1" name="chassin" class="form-control" id="chassin" required>
                    </div>
                    <div class="input" style="width: 25% !important;"><br>
                        <label for="modelo" class="form-label">modelo</label>
                        <input type="text" step="any" min="1" name="modelo" class="form-control" id="modelo" required>
                    </div>
                        </div>
                </div>

            
            <div class="button"><br>
                <button type="submit" class="btn btn-lg btn-success mt-3">cadastro</button>
            </div>
        </form>
  
       
    </div>
</body>


</html>