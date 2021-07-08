<?php

class aluguel
{

    private $idaluguel;
    private $idusuario;
    private $idfuncionario;
    private $diaria;
    private $pago;
    private $desconto;
    private $troco;
    private $total;
    private $datalocacao;
    private $combustivelatual;


    public function __construct($idaluguel, $idusuario,$idfuncionario,$diaria,$pago,$desconto,$troco,$total,$datalocacao,$combustivelatual)
    {
        $this->idaluguel = $idaluguel;
        $this->idusuario = $idusuario;
        $this->idfuncionario = $idfuncionario;
        $this->diaria = $diaria;  
        $this->pago = $pago;
        $this->desconto = $desconto;
        $this->troco = $troco;
        $this->total = $total;
        $this->datalocacao = $datalocacao;                
        $this->combustivelatual = $combustivelatual;   
    }
    /**
     * @return mixed
     */
    public function getidaluguel()
    {
        return $this->idaluguel;
    }

    /**
     * @return mixed
     */
    public function getidusuario()
    {
        return $this->idusuario;
    }
    /**
     * @return mixed
     */
    public function getidfuncionario()
    {
        return $this->idfuncionario;
    }
    /**
     * @return mixed
     */
    public function getdiaria()
    {
        return $this->diaria;
    }
    /**
     * @return mixed
     */
    public function getpago()
    {
        return $this->pago;
    }
    /**
     * @return mixed
     */
    public function getdesconto()
    {
        return $this->desconto;
    }
        /**
     * @return mixed
     */
    public function gettroco()
    {
        return $this->troco;
    }
        /**
     * @return mixed
     */
    public function gettotal()
    {
        return $this->total;
    }
        /**
     * @return mixed
     */
    public function getdatalocacao()
    {
        return $this->datalocacao;
    }
            /**
     * @return mixed
     */
    public function getcombustivelatual()
    {
        return $this->combustivelatual;
    }

    /**
     * @param mixed $idaluguel
     */
    public function setidaluguel($idaluguel)
    {
        $this->idaluguel = $idaluguel;
    }

    /**
     * @param mixed $idusuario
     */
    public function setidusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    /**
     * @param mixed $idfuncionario
     */
    public function setidfuncionario($idfuncionario)
    {
        $this->idfuncionario = $idfuncionario;
    }
        /**
     * @param mixed $diaria
     */
    public function setdiaria($diaria)
    {
        $this->diaria = $diaria;
    }
        /**
     * @param mixed $pago
     */
    public function setpago($pago)
    {
        $this->pago = $pago;
    }
            /**
     * @param mixed $total
     */
    public function settotal($total)
    {
        $this->total = $total;
    }
                /**
     * @param mixed $desconto
     */
    public function setdesconto($desconto)
    {
        $this->desconto = $desconto;
    }
                    /**
     * @param mixed $desconto
     */
    public function settroco($troco)
    {
        $this->troco = $troco;
    }
                        /**
     * @param mixed $desconto
     */
    public function setdatalocacao($datalocacao)
    {
        $this->datalocacao = $datalocacao;
    }
                        /**
     * @param mixed $desconto
     */
    public function setcombustivelatual($combustivelatual)
    {
        $this->combustivelatual = $combustivelatual;
    }
}