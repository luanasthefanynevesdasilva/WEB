<?php
    require '../controller/ClientesController.php';
    $usuario = new ClientesController();
?>
<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
        include_once 'config.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    $erro = false;
    
    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);
    
    if(in_array('',$dados)){
        $erro = true;
        $_SESSION['msg'] = "Necessário preencher todos os campos";
    }elseif((strlen($dados['senha'])) < 6){
        $erro = true;
        $_SESSION['msg'] = "A senha deve ter no minímo 6 caracteres";
    }elseif(stristr($dados['senha'], "'")) {
        $erro = true;
        $_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";
    }else{
        $result_usuario = "SELECT id FROM usuario WHERE usuario='". $dados['usuario'] ."'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msg'] = "Este usuário já está sendo utilizado";
        }
        
        $result_usuario = "SELECT idusuario FROM usuario WHERE email='". $dados['email'] ."'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msg'] = "Este e-mail já está cadastrado";
        }
    }

    
}
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="estilo.css">
    <title>Pagina Inicial</title>

<?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        </div>
        <form class='form' action="./cadastrarCliente.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="email" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="endereco" class="form-label">Endereco</label>
                <input type="text" name="endereco" class="form-control" id="endereco" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="telefone" autocomplete="off" required>
            </div>

            <div class="button"><br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>

        <?php

            if(!$_POST) return;
            $usuario->setNome($_POST['nome']);
            $usuario->setemail($_POST['email']);
            $usuario->setendereco($_POST['endereco']);
            $usuario->settelefone($_POST['telefone']);


            try {
                $usuario->insert($usuario->getNome(), $usuario->getemail(), $usuario->getendereco(), $usuario->gettelefone());
                echo 'Cliente cadastrado com Sucesso!';
            } catch (PDOException $err) {
                echo 'Ocorreu um erro ao cadastrar o cliente!';
            }

        ?>
    </div>
</body>


</html>