<?php

namespace Core\Controller;

use core\Classes\Store;

class Main
{

    public function index()
    {
        $dados = [
            'title' => APP_NAME . " " . APP_VERSION,
        ];

        Store::Layout([
            'Layouts/Header',
            'pagina_inicial',
            'Layouts/Footer',
        ], $dados);
    }

    public function testando()
    {

        echo "deu certo 2";
    }
}
