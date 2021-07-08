<?php

require_once '../model/Venda.php';
require_once '../model/Database.php';

class VendasController extends aluguel
{
    protected $tabela = 'aluguel';

    public function __construct()
    {
    }

    public function findOne($idaluguel)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();
        $aluguel = new aluguel(null, null, null, null, null, null, null, null,null,null,null,null);

        foreach ($stm->fetchAll() as $ven) {
            $aluguel->setidaluguel($ven->idaluguel);
            $aluguel->setidusuario($ven->idusuario);
            $aluguel->setidfuncionario($ven->idfuncionario);
            $aluguel->setpago($ven->pago);
            $aluguel->setdiaria($ven->diaria);
            $aluguel->settotal($ven->total);
            $aluguel->setdesconto($ven->desconto);
            $aluguel->settroco($ven->troco);
            $aluguel->setdatalocacao($ven->datalocacao);
            $aluguel->setcombustivelatual($ven->combustivelatual);
        }
        return $aluguel;
    }

     public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $aluguels = array();

        foreach ($stm->fetchAll() as $aluguel) {
            array_push(
                $aluguels,
                new aluguel($aluguel->idaluguel,$aluguel->idusuario, $aluguel->idfuncionario, $aluguel->pago,$aluguel->diaria, $aluguel->total, $aluguel->troco, $aluguel->desconto, $aluguel->datalocacao, $aluguel->combustivelatual)
            );
        }
        return $aluguels;
    }


  public function update($idaluguel)
    {
        $combustivelatual = $this->getcombustivelatual();
        $this->setidaluguel($idaluguel);
        $query = "UPDATE $this->tabela SET idusuario = :idusuario, idfuncionario = :idfuncionario, pago = :pago, diaria = :diaria, total = :total, troco = :troco, desconto = :desconto,datalocacao = :datalocacao,combustivelatual=:combustivelatual WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidaluguel(), PDO::PARAM_INT);
        $stm->bindParam(':idusuario', $this->getidusuario());
        $stm->bindParam(':idfuncionario', $this->getidfuncionario());
        $stm->bindParam(':pago', $this->getpago());
        $stm->bindParam(':diaria', $this->getdiaria());
        $stm->bindParam(':total', $this->gettotal());        
        $stm->bindParam(':troco', $this->gettroco());
        $stm->bindParam(':desconto', $this->getdesconto());
        $stm->bindParam(':datalocacao', $this->getdatalocacao());
        $stm->bindParam(':combustivelatual', $combustivelatual);
        return $stm->execute();
    }


     public function insert($idusuario,$idfuncionario,$pago,$total,$diaria,$troco,$desconto,$datalocacao,$combustivelatual)
    {
        $query = "INSERT INTO $this->tabela (idusuario,idfuncionario,pago, total,diaria,troco,desconto,datalocacao,combustivelatual)  VALUES (:idusuario, :idfuncionario,:pago,:total,:diaria,:troco,:desconto,:datalocacao,:combustivelatual)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idusuario', $idusuario);       
        $stm->bindParam(':idfuncionario', $idfuncionario);
        $stm->bindParam(':pago', $pago);
        $stm->bindParam(':diaria', $diaria);
        $stm->bindParam(':total', $total);
        $stm->bindParam(':troco', $troco);      
        $stm->bindParam(':desconto', $desconto);
        $stm->bindParam(':datalocacao', $datalocacao);
        $stm->bindParam(':combustivelatual', $combustivelatual);
        return $stm->execute();
    }


    public function findidusuario($idusuario)
    {
        $idaluguel = null;
        $query = "SELECT idaluguel FROM $this->tabela WHERE idusuario = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idusuario, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $aluguel) {
            $idaluguel = $aluguel->idaluguel;
        }
        return $idaluguel;
    }
    
        public function findidaluguel($idfuncionario)
    {
        $idaluguel = null;
        $query = "SELECT idaluguel FROM $this->tabela WHERE idfuncionario = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idfuncionario, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $aluguel) {
            $idaluguel = $aluguel->idaluguel;
        }
        return $idaluguel;
    }


    public function delete($idaluguel)
    {

        $query = "DELETE FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        return $stm->execute();
    }

}
