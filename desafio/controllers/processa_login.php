<?php
session_start();
require '../config/Conexao.php';
require '../models/Auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        $conn = new Conexao();
        $pdo = $conn->conectar();

        $autenticar = new Auth($pdo);
        $usuario = $autenticar->login($email, $senha);

        if ($usuario)
            {
                $_SESSION['usuario'] = $usuario;
                header('Location:../index.php?pagina=inicio');
                exit();
            }
        else 
            {
                header('Location:../index.php?pagina=erro2');
                exit();
            }

    }
