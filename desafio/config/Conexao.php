<?php

class Conexao
{
    private $host = 'localhost';
    private $dbname = 'desafio';
    private $user = 'root';
    private $senha = "";

    public function conectar()
    {
        $pdo = new PDO ("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->senha);
    }
}