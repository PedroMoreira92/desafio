<?php

//session_start();
require './config/Conexao.php';
require './models/Tarefas.php';

$conn = new Conexao();
$pdo = $conn->conectar();

if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $tarefa = new Tarefas($_SESSION['usuario']['id'], null, null, $id);

        $resultado = $tarefa->selecionarTarefa($pdo);

        if(!$resultado)
            {
                header('Location:./index.php?pagina=inicio1');
                exit();
            }

    }

// header('Location:../index.php?pagina=editar_tarefa');
// exit();