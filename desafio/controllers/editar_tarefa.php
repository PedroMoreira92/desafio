<?php

session_start();
require '../config/Conexao.php';
require '../models/Tarefas.php';

$conn = new Conexao();
$pdo = $conn->conectar();

$id = trim($_POST['id']);
$descricao = trim($_POST['descricao']);
$validade = $_POST['validade'];

$tarefa = new Tarefas($_SESSION['usuario']['id'], $descricao, $validade, $id);

$editar = $tarefa->editarTarefa($pdo);

if($editar)
    {
        header('Location:../index.php?pagina=inicio');
        exit();
    }
else
    {
        header('Location:../index.php?pagina=inicio1');
        exit();
    }