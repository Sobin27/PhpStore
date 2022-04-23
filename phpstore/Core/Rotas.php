<?php

use Core\Controller\Main;

$rotas = array();

$rotas['index'] = [
    'rota' => '/',
    'controller' => "Main",
    'action' => 'index'
];

$rotas['testando'] = [
    'rota' => '/testando',
    'controller' => "Main",
    'action' => 'testando'
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
