<?php

namespace Core\Models;

use Core\Classes\Database;
use core\Classes\Store;

class Clientes
{
    public function verifica_email($email)
    {
        //Verifica se existe email no banco de dados
        $bd = new Database;
        $params = [
            ':email' => strtolower(trim($email)),
        ];
        $resultados = $bd->select("SELECT email FROM clientes WHERE email = :email", $params);

        if(count($resultados) != 0)
        {
            return true;
        }else{
            return false;
        }
    }

    public function registra_cliente()
    {
        //Regista o cliente no banco de dados
        $bd = new Database;
        $purl = Store::createHash();

        $params = [
            ':email' => strtolower(trim($_POST['email'])),
            ':senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
            ':nome_completo' => trim($_POST['name_complet']),
            ':cidade' => trim($_POST['cidade']),
            ':estado' => trim($_POST['estado']),
            ':telefone' => trim($_POST['telefone']),
            ':purl' => $purl,
            'activo'=> 0
        ];
        $bd->insert("INSERT INTO clientes VALUES(0,:email,:senha,:nome_completo,:cidade,:estado,:telefone,:purl,:activo, NOW(),NOW(),NULL)",$params);

        //Retorna o purl criado
        return $purl;
    }


}