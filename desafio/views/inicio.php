<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Gerenciador de Tarefas</h1>
    </header>
    <nav>
        <div>
            <a href="?pagina=novatarefa">Cadastrar nova tarefa</a><br><br>
            <a href="./controllers/logout.php">Sair</a>
        </div>
    </nav>
    <div>
        <?php echo "Bem vindo, " . $_SESSION['usuario']['nome']; ?>
    </div>

    <div>
        <?php if(isset($mensagem))
                {
                    echo $mensagem;
                }
        ?>
    </div>
    
    <table border="3">
        <thead>
            <tr>
                <th colspan="6">Lista de Tarefas</th>
            </tr>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Descrição</th>
                <th>Validade</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($resultado)
                    {
                        foreach($resultado as $tarefa)
                            {
            ?>
                                <tr>
                                    <td><?php echo $tarefa['nome'] ?></td>
                                    <td><?php echo $tarefa['email'] ?></td>
                                    <td><?php echo $tarefa['descricao'] ?></td>
                                    <td><?php echo $tarefa['data_validade'] ?></td>
                                    <td><?php echo $tarefa['situacao'] ? 'Concluida' : 'Pendente' ?></td>
                                    <td>
                                        <a href="?pagina=editar_tarefa&id=<?php echo $tarefa['id'] ?>">Editar </a>
                                        <a href="./controllers/deletar.php?id=<?php echo $tarefa['id'] ?>" onclick="return confirm('Deseja excluir a tarefa?')">Excluir </a>
                                        <a href="./controllers/concluir_tarefa.php?id=<?php echo $tarefa['id'] ?>">Concluir</a>
                                    </td>
                                </tr>
                            <?php
                            }
                    }
                    else
                        {   ?>
                            <tr>
                                <td colspan="6"><?php echo "Nenhuma tarefa cadastrada."; ?></td>
                            </tr>
                        <?php }
                        ?>
        </tbody>
    </table>

    <!-- <a href="?pagina=novatarefa">Cadastrar nova tarefa</a><br><br>

    <a href="./controllers/logout.php">Sair</a> -->
</body>
</html>