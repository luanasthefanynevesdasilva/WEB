<?php

require_once '../model/cliente.php';
require_once '../model/Database.php';

class ClientesController extends usuario
{
    protected $tabela = 'usuario';

    public function __construct()
    {
    }

    public function findOne($idusuario)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE idusuario = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idusuario, PDO::PARAM_INT);
        $stm->execute();
        $usuario = new usuario(null, null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $usuario->setidusuario($cl->idusuario);
            $usuario->setNome($cl->nome);
            $usuario->setemail($cl->email);
            $usuario->setendereco($cl->endereco);
            $usuario->settelefone($cl->telefone);
        }
        return $usuario;
    }

    public function findAll()
    {
        
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $usuarios = array();

        foreach ($stm->fetchAll() as $usuario) {
            $usuarios[] = new usuario($usuario->idusuario, $usuario->nome, $usuario->email, $usuario->endereco, $usuario->telefone);
        }
        return $usuarios;
    }

    public function delete($idusuario)
    {

        $query = "DELETE FROM $this->tabela WHERE idusuario = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idusuario, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idusuario)
    {
        $telefone = $this->gettelefone();
        $this->setidusuario($idusuario);
        $query = "UPDATE $this->tabela SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone WHERE idusuario = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidusuario(), PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->getNome());
        $stm->bindParam(':email', $this->getemail());
        $stm->bindParam(':endereco', $this->getendereco());
        $stm->bindParam(':telefone', $telefone);
        return $stm->execute();
    }

    public function insert($nome, $email,$endereco,$telefone)
    {
        $query = "INSERT INTO $this->tabela (nome, email,endereco,telefone) VALUES (:nome, :email, :endereco, :telefone)";
        $stm = Database::prepare($query);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':endereco', $endereco);
        $stm->bindParam(':telefone', $telefone);
        return $stm->execute();
    }

}
