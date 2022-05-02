<?php

namespace Core\Controller;

use Core\Classes\Database;
use Core\Classes\SendEmail;
use Core\Classes\Store;
use Core\Models\Clientes;

class Main
{

    public function index()
    {
       $email = new SendEmail();
       $email->enviar_email_confirm();
       die();
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
        $clientes = new Clientes;
        if($clientes->verifica_email($_POST['email']))
        {
            $_SESSION['erro'] = 'Já existe um email cadastrado!';
            $this->cadastro();
            return;
        }
        
        //Inserir o cliente no banco de dados
        $purl = $clientes->registra_cliente();
        
        //Cria um link purl para enviar ao email do cliente
        $link_purl = "localhost:8000/confirmar_email&purl=$purl";

    }  
}