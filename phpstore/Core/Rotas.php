<?php

use Core\Controller\Main;

$rotas = array();

$rotas['index'] = [
    'rota' => '/',
    'controller' => "Main",
    'action' => 'index'
];

$rotas['loja'] = [
    'rota' => '/loja',
    'controller' => "Main",
    'action' => 'loja'
];

$rotas['carrinho'] = [
    'rota' => '/carrinho',
    'controller' => "Main",
    'action' => 'carrinho'
];

$rotas['cadastro'] = [
    'rota' => '/cadastro',
    'controller' => "Main",
    'action' => 'cadastro'
];

$rotas['criar_conta'] = [
    'rota' => '/criar_conta',
    'controller' => "Main",
    'action' => 'criar_conta'
];


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
foreach ($rotas as $router) :
    if ($url === $router['rota']) :


        $controlador = 'Core\\Controller\\' . ucfirst($router['controller']);
        $metodo = $router['action'];


        $ctr = new $controlador();

        $ctr->$metodo();
        return;
    endif;
endforeach;


//$ctr = new Main();
//$ctr->index();
return;
