<?php

class itemaluguel
{

    private $iditemaluguel;
    private $idaluguel;
    private $idveiculo;

    
    public function __construct($iditemaluguel, $idaluguel, $idveiculo)
    {
        $this->iditemaluguel = $iditemaluguel;
        $this->idaluguel = $idaluguel;
        $this->idveiculo = $idveiculo;

    }

    /**
     * @return mixed
     */
    public function getiditemaluguel()
    {
        return $this->iditemaluguel;
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
    public function getidveiculo()
    {
        return $this->idveiculo;
    }



    /**
     * @param mixed $iditemaluguel
     */
    public function setiditemaluguel($iditemaluguel)
    {
        $this->iditemaluguel = $iditemaluguel;
    }

    /**
     * @param mixed $idaluguel
     */
    public function setidaluguel($idaluguel)
    {
        $this->idaluguel = $idaluguel;
    }

    /**
     * @param mixed $idveiculo
     */
    public function setidveiculo($idveiculo)
    {
        $this->idveiculo = $idveiculo;
    }



}