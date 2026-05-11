<?php


$pagina = $_GET['pagina'] ?? 'login';

switch ($pagina)
{
    case 'login':
        require './views/login.php';
        break;
    
    
}