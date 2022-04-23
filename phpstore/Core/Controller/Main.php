<?php

namespace Core\Controller;

use Core\Classes\Database;
use Core\Classes\Store;

class Main
{

    public function index()
    {

        Store::Layout([
            'Layouts/Html_Header',
            'Layouts/Header',
            'Pages/Inicio',
            'Layouts/Footer',
            'Layouts/Html_Footer',
        ], );
    }

    public function loja()
    {
        Store::Layout([
            'Layouts/Html_Header',
            'Layouts/Header',
            'Pages/Loja',
            'Layouts/Footer',
            'Layouts/Html_Footer',
        ]);
    }

    public function carrinho()
    {
        Store::Layout([
            'Layouts/Html_Header',
            'Layouts/Header',
            'Pages/Carrinho',
            'Layouts/Footer',
            'Layouts/Html_Footer',
        ]);
    }

    public function cadastro()
    {
        //verifica se ja existe uma sessão
        if(Store::clientLog())
        {
            $this->index();
            return;
        }

        Store::Layout([
            'Layouts/Html_Header',
            'Layouts/Header',
            'Pages/Cadastro',
            'Layouts/Footer',
            'Layouts/Html_Footer',
        ]);
    }

    public function criar_conta()
    {
        if(Store::clientLog())
        {
            $this->index();
            return;
        }

        //verifica se houve um submit do formulario
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            $this->index();
            return;
        }

        //Verifica se as senhas estão iguais
        if($_POST['senha'] !== $_POST['confirm_senha'])
        {
            $_SESSION['erro'] = 'As senhas estão diferentes';
            $this->cadastro();
            return;
        }
        //Verifica se existe email no banco de dados
        $bd = new Database();
        $params = [
            ':email' => strtolower(trim($_POST['email'])),
        ];
        $resultados = $bd->select("SELECT email FROM clientes WHERE email = :email", $params);

        if(count($resultados) != 0)
        {
            $_SESSION['erro'] = 'Já existe um email cadastrado!';
            $this->cadastro();
            return;
        }

        


    }  
}

