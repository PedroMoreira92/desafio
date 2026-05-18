<?php

class Auth
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) 
            {
                if (password_verify($senha, $usuario['senha']))
                    {
                        return $usuario;
                    }
            }
        return false;
    }

    public function logout()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
    }

    public function session()
    {
        //session_start();
        if(!isset($_SESSION['usuario']))
            {
                header('Location:./index.php?pagina=login');
                exit();
            }
    }
}