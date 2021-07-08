<?php

require_once '../model/veiculo.php';
require_once '../model/Database.php';

class veiculoController extends veiculo
{
    protected $tabela = 'veiculo';

    public function __construct()
    {
    }


    public function findOne($idveiculo)
    {
        $query = "SELECT * FROM $this->tabela WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
        $stm->execute();
        $veiculo = new veiculo(null, null, null,null, null, null,null, null, null,null);

        foreach ($stm->fetchAll() as $ven) {
            $veiculo->setidveiculo($ven->idveiculo);
            $veiculo->setidseguro($ven->idseguro);
            $veiculo->settipoveiculo($ven->tipoveiculo);
            $veiculo->setano($ven->ano);
            $veiculo->setcor($ven->cor);
            $veiculo->setplaca($ven->placa);
            $veiculo->setchassin($ven->chassin);
            $veiculo->setmodelo($ven->modelo);

        }
        return $veiculo;
    }

    public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $veiculos = array();

        foreach ($stm->fetchAll() as $veiculo) {
            array_push(
                $veiculos,
                new veiculo($veiculo->idveiculo, $veiculo->idseguro, $veiculo->tipoveiculo, $veiculo->placa, $veiculo->chassin, $veiculo->ano, $veiculo->cor, $veiculo->modelo)
            );
        }
        return $veiculos;
    }

  public function update($idveiculo)
    {
        $chassin = $this->getchassin();
        $this->setidveiculo($idveiculo);
        $query = "UPDATE $this->tabela SET idseguro = :idseguro, tipoveiculo = :tipoveiculo, placa = :placa, modelo = :modelo, ano = :ano, cor = :cor, chassin = :chassin WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidveiculo(), PDO::PARAM_INT);
        $stm->bindParam(':idseguro', $this->getidseguro());
        $stm->bindParam(':tipoveiculo', $this->gettipoveiculo());
        $stm->bindParam(':placa', $this->getplaca());
        $stm->bindParam(':ano', $this->getano());
        $stm->bindParam(':cor', $this->getcor());        
        $stm->bindParam(':modelo', $this->getmodelo());
        $stm->bindParam(':chassin', $chassin);
        return $stm->execute();
    }

    public function insert($idseguro,$tipoveiculo,$ano,$modelo,$cor,$chassin,$placa)
    {
        $query = "INSERT INTO $this->tabela (idseguro,tipoveiculo,ano,modelo,cor,chassin,placa) VALUES (:idseguro,:tipoveiculo,:ano,:modelo,:cor,:chassin,:placa)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idseguro', $idseguro);
        $stm->bindParam(':tipoveiculo', $tipoveiculo);
        $stm->bindParam(':ano', $ano);
        $stm->bindParam(':modelo', $modelo);
        $stm->bindParam(':cor', $cor);
        $stm->bindParam(':chassin', $chassin);
        $stm->bindParam(':placa', $placa);
        return $stm->execute();
    }

    public function findidveiculo($idseguro)
    {
        $idveiculo = null;
        $query = "SELECT idveiculo FROM $this->tabela WHERE idseguro = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idseguro, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $veiculo) {
            $idveiculo = $veiculo->idveiculo;
        }
        return $idveiculo;
    }
    
    public function delete($idveiculo)
    {
        $query = "DELETE FROM $this->tabela WHERE idveiculo = :id";

        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
        return $stm->execute();
    }

}