<?php


class Tarefas
{
    private $id;
    private $usuario_id;
    private $descricao;
    private $data_criacao;
    private $data_validade;
    private $situacao = false;

    public function __construct($usuario_id, $descricao, $data_validade, $id = null, $data_criacao = null)
    {
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->descricao = $descricao;
        $this->data_criacao = $data_criacao;
        $this->data_validade = $data_validade;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getData_criacao()
    {
        return $this->data_criacao;
    }

    public function getData_validade()
    {
        return $this->data_validade;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }



    public function salvarTarefa($pdo)
    {
        $sql = "INSERT INTO tarefas (usuario_id, descricao, data_validade)
                VALUES (:usuario_id, :descricao, :data_validade)";

        $stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':id', $id);
        $stmt->bindValue(':usuario_id', $this->usuario_id);
        $stmt->bindValue(':descricao', $this->descricao);
        //$stmt->bindValue(':data_criacao', $data_criacao);
        $stmt->bindValue('data_validade', $this->data_validade);
        return $stmt->execute();
    }

    public function selecionarTarefa($pdo)
    {
        $sql = "SELECT * FROM tarefas
                WHERE id = :id
                AND usuario_id = :usuario_id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':usuario_id', $this->usuario_id);
        $stmt->execute();
        $tarefa = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tarefa;
    }

    public function editarTarefa($pdo)
    {
        $sql = "UPDATE tarefas
                SET descricao = :descricao, data_validade = :data_validade
                WHERE id = :id
                AND usuario_id = :usuario_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':usuario_id', $this->usuario_id);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':data_validade', $this->data_validade);
        return $stmt->execute();
    }

    public function exibirTarefa($pdo)
    {
        $sql = "SELECT
                    tarefas.id,
                    tarefas.situacao,
                    nome,
                    email,
                    descricao,
                    data_validade
                FROM
	                usuarios
                INNER JOIN
                    tarefas
                ON usuarios.id = tarefas.usuario_id
                WHERE usuario_id = :usuario_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('usuario_id', $this->usuario_id);
        $stmt->execute();
        $tarefa = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tarefa;
    }

    public function deletarTarefa($pdo)
    {
        $sql = "DELETE FROM tarefas
                WHERE id = :id
                AND usuario_id = :usuario_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':usuario_id', $this->usuario_id);
        return $stmt->execute();
    }

    public function concluirTarefa($pdo)
    {
        $sql = "UPDATE tarefas
                SET situacao = 1
                WHERE id = :id
                AND usuario_id = :usuario_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':usuario_id', $this->usuario_id);
        return $stmt->execute();
    }


}