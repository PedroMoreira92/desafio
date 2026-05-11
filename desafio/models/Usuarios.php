<?php

class Usuarios
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha, $id = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getId() 
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function salvarUsuario($pdo){
        $senhahash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, senha)
                VALUES (:nome, :email, :senha)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $senhahash);
        return $stmt->execute();
    }

    public function atualizarUsuario($pdo) {
        $sql = "UPDATE usuarios
                SET nome = :nome, email = :email
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        return $stmt->execute();
    }

    public function deletarUsuario($pdo) {
        $sql = "DELETE FROM usuarios
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    } 

}