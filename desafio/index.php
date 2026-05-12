<?php


$pagina = $_GET['pagina'] ?? 'login';

switch ($pagina)
{
    case 'login':
        require './views/login.php';
        break;
    
    case 'criar':
        require './views/criar_usuario.php';
        break;

    case 'inicio':
        require './views/icicio.php';
        break;
}