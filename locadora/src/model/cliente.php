<?php

class usuario
{

    private $idusuario;
    private $nome;
    private $email;
    private $endereco;
    private $telefone;

    public function __construct($idusuario, $nome, $email,$endereco,$telefone)
    {
        $this->idusuario = $idusuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getemail()
    {
        return $this->email;
    }
        /**
     * @return mixed
     */
    public function getendereco()
    {
        return $this->endereco;
    }
    /**
     * @return mixed
     */
    public function gettelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $idusuario
     */
    public function setidusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $email
     */
    public function setemail($email)
    {
        $this->email = $email;
    }
    /**
     * @param mixed $endereco
     */
    public function setendereco($endereco)
    {
        $this->endereco = $endereco;
    }
    /**
     * @param mixed $telefone
     */
    public function settelefone($telefone)
    {
        $this->telefone = $telefone;
    }

}