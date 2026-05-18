<?php
session_start();
require '../config/conexao.php';
require '../models/Tarefas.php';

$conn = new Conexao();
$pdo = $conn->conectar();

if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    
        $tarefa = new Tarefas($_SESSION['usuario']['id'], null, null, $id);
        $deletar = $tarefa->deletarTarefa($pdo);

        if($deletar)
            {
                header('Location:../index.php?pagina=inicio');
                exit();
            }
        else
            {
                return false;
            }
    
    }
