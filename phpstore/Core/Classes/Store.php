<?php

namespace core\Classes;

use Exception;

class Store
{

    public static function Layout($structures, $dados = null)
    {
        if (!is_array($structures)) {
            throw new Exception("Estruturas inválidas.");
        }

        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }

        foreach ($structures as $structure) {
            include("../core/Views/$structure.php");
        }
    }

    public static function clientLog()
    {
        //Faz a verificação se existe um cliente com sessão
        return isset($_SESSION['client']);
    }

    
}
