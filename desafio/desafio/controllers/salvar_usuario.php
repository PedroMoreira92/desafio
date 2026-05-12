<?php

require '../config/Conexao.php';
require '../models/Usuarios.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        $conn = new Conexao();
        $pdo = $conn->conectar();

        $usuario = new Usuarios($nome, $email, $senha);
        $salvar = $usuario->salvarUsuario($pdo);

        if($salvar)
            {
                header('Location:../index.php?pagina=login');
                exit();
            }
        else
            {
                echo "Erro ao cadastar";
            }
    }