<?php 

// Abre a sessão
session_start();

require_once('../config.php');

//Carrega todas as classes do projetos
require_once('../vendor/autoload.php');

//carrega o sistema de rotas  
require_once('../Core/Rotas.php');
