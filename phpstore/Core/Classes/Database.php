<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database
{

    private $ligacao;

    private function ligar()
    {

        //liga o Banco de dados

        $this->ligacao = new PDO(
            'mysql:' .
                'host=' . MYSQL_SERVER . ";" .
                'dbname=' . MYSQL_DATABASE . ";" .
                'charset=' . MYSQL_CHARTSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        //debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    private function desligar()
    {

        //desliga o  banco de dados

        $this->ligacao = null;
    }

    public function select($sql, $parametros = null)
    {

        //verifica se é uma instrução SELECT
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception('Banco de dadso - Não é uma instrução SELECT.');
        }

        //executa uma função de pesquisa sql

        $this->ligar();

        $resultados = null;

        try {
            //comunicar com o bd
            if (!empty($parametros)) {
                $executar = $this->ligcao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desligar();

        //devolve os resultados obtidos
        return $resultados;
    }

    public function insert($sql, $parametros = null)
    {

        //verifica se é uma instrução SELECT
        if (!preg_match("/^INSERT/i", $sql)) {
            throw new Exception('Banco de dadso - Não é uma instrução INSERT.');
        }

        $this->ligar();

        try {
            //comunicar com o bd
            if (!empty($parametros)) {
                $executar = $this->ligcao->prepare($sql);
                $executar->execute($parametros);;
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desligar();
    }

    public function update($sql, $parametros = null)
    {

        //verifica se é uma instrução SELECT
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception('Banco de dadso - Não é uma instrução UPDATE.');
        }

        $this->ligar();

        try {
            //comunicar com o bd
            if (!empty($parametros)) {
                $executar = $this->ligcao->prepare($sql);
                $executar->execute($parametros);;
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desligar();
    }

    public function delete($sql, $parametros = null)
    {

        //verifica se é uma instrução SELECT
        if (!preg_match("/^INSERT/i", $sql)) {
            throw new Exception('Banco de dadso - Não é uma instrução DELETE.');
        }

        $this->ligar();

        try {
            //comunicar com o bd
            if (!empty($parametros)) {
                $executar = $this->ligcao->prepare($sql);
                $executar->execute($parametros);;
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desligar();
    }

    //função genérica
    public function statement($sql, $parametros = null)
    {

        //verifica se é uma instrução diferente das anteriores
        if (preg_match("/^SELECT|INSERT|UPDATE|DELETE/i", $sql)) {
            throw new Exception('Banco de dado - INSTRUÇÃO INVÁLIDA.');
        }

        $this->ligar();

        try {
            //comunicar com o bd
            if (!empty($parametros)) {
                $executar = $this->ligcao->prepare($sql);
                $executar->execute($parametros);;
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desligar();
    }
}
