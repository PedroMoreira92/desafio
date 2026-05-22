<?php

require './models/Tarefas.php';
require './config/Conexao.php';
// require './models/Auth.php';

$conn = new Conexao();
$pdo = $conn->conectar();
// $permissao = new Auth(null);
// $permissao->session();
$tarefas = new Tarefas($_SESSION['usuario']['id'], null, null);
$resultado = $tarefas->exibirTarefa($pdo);