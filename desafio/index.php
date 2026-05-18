<?php
require './models/Auth.php';

$pagina = $_GET['pagina'] ?? 'login';

switch ($pagina)
{
    case 'login':
        require './views/login.php';
        break;

    case 'login1':
        $mensagem = "Usuario criado com sucesso";
        require './views/login.php';
        break;
    
    case 'criar':
        require './views/criar_usuario.php';
        break;

    case 'inicio':
        session_start();
        $permissao = new Auth(null);
        $permissao->session();
        require './controllers/processa_tarefas.php';
        require './views/inicio.php';
        break;

    case 'inicio1':
        $mensagem = "Erro ao cadastrar tarefa";
        session_start();
        $permissao = new Auth(null);
        $permissao->session();
        require './controllers/processa_tarefas.php';
        require './views/inicio.php';
        break;
    
    case 'novatarefa':
        session_start();
        $permissao = new Auth(null);
        $permissao->session();
        require './views/nova_tarefa.php';
        break;

    case 'editar_tarefa':
        session_start();
        $permissao = new Auth(null);
        $permissao->session();
        require './controllers/select_tarefa.php';
        require './views/editar_tarefa.php';
        break;

    case 'erro1':
        $mensagem = "Erro ao criar usuário";
        require './views/login.php';
        break;

    case 'erro2':
        $mensagem = "Usuario ou senha incorreto";
        require './views/login.php';
        break;
    
    default:
        echo "Página não localizada";
        break;
}