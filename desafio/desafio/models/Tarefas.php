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



    public function salvarTarefa($pdo)
    {
        $sql = "INSERT INTO tarefas (usuario_id, descricao, data_validade)
                VALUES (:usuario_id, :descricao, :data_validade)";

        $stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':id', $id);
        $stmt->bindValue(':usuario_id', $usuario_id);
        $stmt->bindValue(':descricao', $descricao);
        //$stmt->bindValue(':data_criacao', $data_criacao);
        $stmt->bindValue('data_validade', $data_validade);
        return $stmt->execute();
    }

    public function editarTarefa($sql)
    {
        $sql = "UPDATE tarefas
                SET descricao = :descricao, data_validade = :data_validade
                WHERE id = :id";
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue('data_validade', $data_validade);
        return $stmt->execute();
    }


}