<?php

session_start();
require '../config/Conexao.php';
require '../models/Tarefas.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $usuario_id = trim($_POST['usuario_id']);
        $descricao = trim($_POST['descricao']);
        $validade = trim($_POST['validade']);

        $conn = new Conexao();
        $pdo = $conn->conectar();

        if($usuario_id <> $_SESSION['usuario']['id'])
            {
                header('Location:../index.php?pagina=inicio1');
                exit();
            }

        $tarefa = new Tarefas($usuario_id, $descricao, $validade);
        $salvar = $tarefa->salvarTarefa($pdo);

        if($salvar)
            {
                header('Location:../index.php?pagina=inicio');
                exit();
            }
        else
            {
                return false;
            }

    }