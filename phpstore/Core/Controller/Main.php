<?php

namespace Core\Controller;

use Core\Classes\Store;

class Main
{

    public function index()
    {
        $dados = [
            'title' => APP_NAME . " " . APP_VERSION,
            
        ];

        Store::Layout([
            'Layouts/Html_Header',
            'Layouts/Header',
            'Pages/Inicio',
            'Layouts/Html_Footer',
            'Layouts/Footer',
        ], $dados);
    }

    public function testando()
    {

        echo "deu certo 2";
    }
}
