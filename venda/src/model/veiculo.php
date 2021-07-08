<?php

class  veiculo
{

    private $idveiculo;
    private $idseguro;
    private $tipoveiculo;
    private $ano;
    private $cor;
    private $modelo;
    private $placa;
    private $chassin;
    
    public function __construct($idveiculo, $idseguro,$tipoveiculo,$ano,$cor,$modelo,$placa,$chassin)
    {
        $this->idveiculo = $idveiculo;
        $this->idseguro = $idseguro;
        $this->tipoveiculo = $tipoveiculo;
        $this->ano = $ano;
        $this->cor = $cor;   
        $this->modelo = $modelo;
        $this->placa = $placa;
        $this->chassin = $chassin;
    }
    /**
     * @return mixed
     */
    public function getidveiculo()
    {
        return $this->idveiculo;
    }

    /**
     * @return mixed
     */
    public function getidseguro()
    {
        return $this->idseguro;
    }
    /**
     * @return mixed
     */
    public function gettipoveiculo()
    {
        return $this->tipoveiculo;
    }
        /**
     * @return mixed
     */
    public function getano()
    {
        return $this->ano;
    }

    /**
     * @return mixed
     */
    public function getcor()
    {
        return $this->cor;
    }
    /**
     * @return mixed
     */
    public function getmodelo()
    {
        return $this->modelo;
    }
    /**
     * @return mixed
     */
    public function getplaca()
    {
        return $this->placa;
    }
    /**
     * @return mixed
     */
    public function getchassin()
    {
        return $this->chassin;
    }

    /**
     * @param mixed $idveiculo
     */
    public function setidveiculo($idveiculo)
    {
        $this->idveiculo = $idveiculo;
    }

    /**
     * @param mixed $idseguro
     */
    public function setidseguro($idseguro)
    {
        $this->idseguro = $idseguro;
    }
    /**
     * @param mixed $tipoveiculo
     */
    public function settipoveiculo($tipoveiculo)
    {
        $this->tipoveiculo = $tipoveiculo;
    }
     /**
     * @param mixed $ano
     */
    public function setano($ano)
    {
        $this->ano = $ano;
    }
    /**
     * @param mixed $cor
     */
    public function setcor($cor)
    {
        $this->cor = $cor;
    }
        /**
     * @param mixed $modelo
     */
    public function setmodelo($modelo)
    {
        $this->modelo = $modelo;
    }
            /**
     * @param mixed $placa
     */
    public function setplaca($placa)
    {
        $this->placa = $placa;
    }
                /**
     * @param mixed $chassin
     */
    public function setchassin($chassin)
    {
        $this->chassin = $chassin;
    }
}